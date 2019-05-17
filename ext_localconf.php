<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'PS.' . $_EXTKEY,
    'Diary',
    array(
        'Entry' => 'list',
    ),
    // non-cacheable actions
    array()
);