<?php
declare(strict_types=1);

$EM_CONF['psb_diary'] = [
    'author'           => 'Daniel Ablass',
    'author_email'     => 'dn@phantasie-schmiede.de',
    'category'         => 'plugin',
    'clearCacheOnLoad' => true,
    'constraints'      => [
        'conflicts' => [
        ],
        'depends'   => [
            'psb_foundation' => '1.0.0',
        ],
        'suggests'  => [
        ],
    ],
    'description'      => 'Blog-like way of publishing content with page browser',
    'state'            => 'beta',
    'title'            => 'PSbits | Diary',
    'version'          => '3.0.0',
];
