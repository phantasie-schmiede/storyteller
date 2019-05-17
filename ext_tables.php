<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

ExtensionUtility::registerPlugin(
    $_EXTKEY,
    'Diary',
    'PS | Diary'
);

// add typoscript
ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'PS | Diary');

// activate flex form in backend
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_diary';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Diary.xml');

// adding table meta information
ExtensionManagementUtility::addLLrefForTCAdescr('tx_psdiary_domain_model_entry', 'EXT:ps_diary/Resources/Private/Language/locallang_csh_tx_psdiary_domain_model_entry.xml');
ExtensionManagementUtility::allowTableOnStandardPages('tx_psdiary_domain_model_entry');