async function getCoordinates(address) {
    const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`);
    const data = await response.json();
    if (Array.isArray(data) && data.length) {
        return { lat: data[0].lat, lon: data[0].lon };
    }
    throw new Error('Address not found');
}

async function calculateRoute(event) {

  event.preventDefault();

  // Nur das FORMULAR nehmen, das tatsächlich abgesendet wurde
  const form = event.currentTarget;

  // Felder nur innerhalb dieses Formulars suchen (egal ob IDs mehrfach existieren)
  const startInput = form.querySelector('input[name="start"]');
  const destInput  = form.querySelector('input[name="destination"]');

  const startAddress = (startInput?.value || '').trim();
  let destinationRaw = (destInput?.value || '').trim();

  if (!startAddress || !destinationRaw) {
    alert('Bitte Startadresse eingeben.');
    return;
  }

  // Ziel normalisieren: "lat, lon" -> "lat,lon"
  destinationRaw = destinationRaw.replace(/\s*,\s*/g, ',');

  try {
    const start = await getCoordinates(startAddress);

    // OpenStreetMap Directions (OSRM)
    const url =
      `https://www.openstreetmap.org/directions?engine=fossgis_osrm_car` +
      `&route=${encodeURIComponent(`${start.lat},${start.lon}`)};${encodeURIComponent(destinationRaw)}`;

    window.open(url, '_blank', 'noopener,noreferrer');
  } catch (err) {
    alert('Es gab ein Problem bei der Berechnung der Route: ' + err.message);
  }
}
