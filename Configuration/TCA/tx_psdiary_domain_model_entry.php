<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$fieldList = 'title, display_date, content_elements';
$ll = 'LLL:EXT:ps_diary/Resources/Private/Language/locallang_be.xml:tx_psdiary_domain_model_entry';

return array(
    'ctrl'      => array(
        'title'                    => $ll,
        'label'                    => 'title',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'sortby'                   => 'sorting',
        'dividers2tabs'            => true,
        'versioningWS'             => 2,
        'versioning_followPages'   => true,
        'origUid'                  => 't3_origuid',
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => array(
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime',
        ),
        'searchFields'             => 'title',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('ps_diary') . 'Resources/Public/Icons/tx_psdiary_domain_model_entry.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, ' . $fieldList,
    ),
    'types'     => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden, ' . $fieldList . ';;1,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
    ),
    'palettes'  => array(
        '1' => array('showitem' => ''),
    ),
    'columns'   => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
            'config'  => array(
                'type'                => 'select',
                'foreign_table'       => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items'               => array(
                    array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent'      => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => 1,
            'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
            'config'      => array(
                'type'                => 'select',
                'items'               => array(
                    array('', 0),
                ),
                'foreign_table'       => 'tx_psdiary_domain_model_entry',
                'foreign_table_where' => 'AND tx_psdiary_domain_model_entry.pid=###CURRENT_PID### AND tx_psdiary_domain_model_entry.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource'  => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label'      => array(
            'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max'  => 255,
            )
        ),
        'hidden'           => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array(
                'type' => 'check',
            ),
        ),
        'starttime'        => array(
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
            'config'    => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'endtime'          => array(
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
            'config'    => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'title'            => array(
            'exclude' => 0,
            'label'   => $ll . '.title',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'display_date'     => array(
            'exclude' => 0,
            'label'   => $ll . '.display_date',
            'config'  => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime,required',
                'checkbox' => 0,
                'default'  => 0,
            ),
        ),
        'content_elements' => array(
            'exclude' => 0,
            'label'   => $ll . '.content_elements',
            'config'  => array(
                'type'          => 'inline',
                'foreign_table' => 'tt_content',
                'foreign_field' => 'psdiary_uid',
                'maxitems'      => 9999,
                'appearance'    => array(
                    'collapseAll'                     => 1,
                    'expandSingle'                    => 1,
                    'levelLinksPosition'              => 'bottom',
                    'useSortable'                     => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showRemovedLocalizationRecords'  => 1,
                    'showAllLocalizationLink'         => 1,
                    'showSynchronizationLink'         => 1,
                    'enabledControls'                 => array(
                        'info' => false,
                    ),
                ),
            ),
        ),
    ),
);
