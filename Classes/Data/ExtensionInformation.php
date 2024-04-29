<?php
declare(strict_types=1);

/*
 * This file is part of PSB Diary.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbDiary\Data;

use PSB\PsbDiary\Controller\EntryController;
use PSB\PsbFoundation\Data\AbstractExtensionInformation;
use PSB\PsbFoundation\Data\PluginConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class ExtensionInformation
 *
 * @package PSB\PsbDiary\Data
 */
class ExtensionInformation extends AbstractExtensionInformation
{
    public function __construct()
    {
        parent::__construct();
        $this->addPlugin(
            GeneralUtility::makeInstance(
                PluginConfiguration::class,
                controllers: [EntryController::class],
                name       : 'Diary'
            )
        );
    }
}
