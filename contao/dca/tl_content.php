<?php

declare(strict_types=1);

$GLOBALS['TL_DCA']['tl_content']['palettes']['route_element'] =
    '{type_legend},type,headline;'
  . '{route_legend_content},route_lat,route_long,route_start,route_send,route_info;class_start_input,class_start_label,class_button;'
  . '{template_legend:hide},customTpl;'
  . '{protected_legend:hide},protected;'
  . '{expert_legend:hide},cssID;'
  . '{invisible_legend:hide},invisible,start,stop'
;

$GLOBALS['TL_DCA']['tl_content']['fields']['route_lat'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['route_lat'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => [
        'mandatory' => true, 
        'tl_class' => 'w50'
    ],
    'sql'       => "char(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['route_long'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['route_long'],
    'exclude'   => true,    
    'inputType' => 'text',
    'eval'      => [
        'mandatory' => true, 
        'tl_class' => 'w50'
    ],
    'sql'       => "char(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['route_start'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['route_start'],
    'exclude'   => true,    
    'inputType' => 'text',
    'eval'      => [
        'tl_class' => 'w33'
    ],
    'sql'       => "char(255) NOT NULL default 'Meine Startadresse:'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['route_send'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['route_send'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => [
        'mandatory' => true, 
        'tl_class' => 'w33'
    ],
    'sql'       => "char(255) NOT NULL default 'Route berechnen'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['route_info'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['route_info'],
    'exclude'   => true,    
    'inputType' => 'text',
    'eval'      => [
        'tl_class' => 'w33'
    ],
    'sql'       => "char(255) NOT NULL default 'Sie werden zu OpenStreetMap weitergeleitet.'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['class_start_input'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['class_start_input'],
    'exclude'   => true,    
    'inputType' => 'text',
    'eval'      => [
        'tl_class' => 'w33 clr'
    ],
    'sql'       => "char(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['class_start_label'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['class_start_label'],
    'exclude'   => true,    
    'inputType' => 'text',
    'eval'      => [ 
        'tl_class' => 'w33'
    ],
    'sql'       => "char(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['class_button'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['class_button'],
    'exclude'   => true,    
    'inputType' => 'text',
    'eval'      => [ 
        'tl_class' => 'w33'
    ],
    'sql'       => "char(255) NOT NULL default ''"
];