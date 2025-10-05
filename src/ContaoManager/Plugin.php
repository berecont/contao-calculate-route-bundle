<?php

declare(strict_types=1);

/*
 * This file is part of the Contao calculation extension.
 *
 * (c) Bernhard Renner beRecont
 *
 * @license MIT
 */

namespace Berecont\ContaoCalcrouteBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Berecont\ContaoCalcrouteBundle\BerecontContaoCalcrouteBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(BerecontContaoCalcrouteBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}