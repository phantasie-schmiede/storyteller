<?php

$EM_CONF[$_EXTKEY] = [
    'author'           => 'Daniel Ablass',
    'author_email'     => 'dn@phantasie-schmiede.de',
    'category'         => 'plugin',
    'clearCacheOnLoad' => true,
    'constraints'      => [
        'conflicts' => [],
        'depends'   => [
            'foundation' => '3.0',
            'php'        => '8.3',
            'typo3'      => '13.4.0-13.4.99',
        ],
        'suggests'  => [],
    ],
    'description'      => 'Blog-like way of publishing content with page browser',
    'state'            => 'alpha',
    'title'            => 'PSBits | Storybook',
    'version'          => '0.1.0',
];
