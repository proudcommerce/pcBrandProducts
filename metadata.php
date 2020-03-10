<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @package pcBrandProducts
 * @copyright ProudCommerce
 * @link www.proudcommerce.com
 **/

use OxidEsales\Eshop\Core\DatabaseProvider;

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = [
    'id'          => 'pcbrandproducts',
    'title'       => 'pcBrandProducts',
    'description' => [
        'de' => 'Artikel der gleichen Marken (Crossselling) auf der Artikeldetailseite.',
        'en' => 'Products of the same brand (crossselling) on article details page.',
    ],
    'thumbnail'   => '',
    'version'     => '1.0.0',
    'author'      => 'ProudCommerce',
    'url'         => 'https://www.proudcommerce.com',
    'email'       => 'module@proudcommerce.com',
    'extend'      => [
        \OxidEsales\Eshop\Application\Model\Article::class => \ProudCommerce\BrandProducts\Application\Model\Article::class,
    ],
    'controllers' => [],
    'templates'   => [],
    'blocks'      => [
        [
            'template' => 'page/details/inc/related_products.tpl',
            'block'    => 'details_relatedproducts_crossselling',
            'file'     => '/Application/views/blocks/details_relatedproducts_crossselling.tpl',
            'position' => 100
        ],
    ],
    'settings'    => [],
    'events'      => [],
];
