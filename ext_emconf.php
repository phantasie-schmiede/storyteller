<?php
declare(strict_types=1);

$EM_CONF['storybook'] = [
    'author'           => 'Daniel Ablass',
    'author_email'     => 'dn@phantasie-schmiede.de',
    'category'         => 'plugin',
    'clearCacheOnLoad' => true,
    'constraints'      => [
        'conflicts' => [],
        'depends'   => [
            'foundation' => '3.0',
        ],
        'suggests'  => [],
    ],
    'description'      => 'Blog-like way of publishing content with page browser',
    'state'            => 'beta',
    'title'            => 'PSBits | Storybook',
    'version'          => '0.0.0',
];
