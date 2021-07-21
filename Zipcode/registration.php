<?php
/**
 * registration.php
 *
 * A magento 2 module to have Zipcodes for product Availability
 */
use \Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Codilar_Zipcode',
    __DIR__
);
