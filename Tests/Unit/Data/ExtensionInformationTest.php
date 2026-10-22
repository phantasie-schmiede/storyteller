<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Storyteller.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Storyteller\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use PSBits\Storyteller\Controller\StoryController;
use PSBits\Storyteller\Data\ExtensionInformation;

final class ExtensionInformationTest extends TestCase
{
    public function testRegistersTheStorytellerPluginWithTheStoryController(): void
    {
        $plugins = (new ExtensionInformation())->getPlugins();

        self::assertCount(1, $plugins);
        self::assertSame('Storyteller', $plugins[0]->getName());
        self::assertSame([StoryController::class], $plugins[0]->getControllers());
    }
}
