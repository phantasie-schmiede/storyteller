<?php
declare(strict_types=1);

/*
 * This file is part of PSB Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbStorybook\Data;

use PSB\PsbStorybook\Controller\StoryController;
use PSB\PsbFoundation\Data\AbstractExtensionInformation;
use PSB\PsbFoundation\Data\PluginConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class ExtensionInformation
 *
 * @package PSB\PsbStorybook\Data
 */
class ExtensionInformation extends AbstractExtensionInformation
{
    public function __construct()
    {
        parent::__construct();
        $this->addPlugin(
            GeneralUtility::makeInstance(
                PluginConfiguration::class,
                controllers: [StoryController::class],
                name       : 'Storybook'
            )
        );
    }
}
