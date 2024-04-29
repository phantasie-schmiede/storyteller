<?php
declare(strict_types=1);

$EM_CONF['psb_diary'] = [
    'author'           => 'Daniel Ablass',
    'author_email'     => 'dn@phantasie-schmiede.de',
    'category'         => 'plugin',
    'clearCacheOnLoad' => true,
    'constraints'      => [
        'conflicts' => [],
        'depends'   => [
            'psb_foundation' => '2.2.1',
        ],
        'suggests'  => [],
    ],
    'description'      => 'Blog-like way of publishing content with page browser',
    'state'            => 'beta',
    'title'            => 'PSbits | Diary',
    'version'          => '0.0.0',
];
