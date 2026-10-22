<?php

$EM_CONF[$_EXTKEY] = [
    'author'           => 'Daniel Ablass',
    'author_email'     => 'dn@phantasie-schmiede.de',
    'category'         => 'plugin',
    'clearCacheOnLoad' => true,
    'constraints'      => [
        'conflicts' => [],
        'depends'   => [
            'foundation' => '4.1',
            'php'        => '8.3.0-8.5.99',
            'typo3'      => '13.4.0-14.99.99',
        ],
        'suggests'  => [],
    ],
    'description'      => 'Blog-like way of publishing content with page browser',
    'state'            => 'alpha',
    'title'            => 'PSBits | Storyteller',
    'version'          => '0.1.0',
];
