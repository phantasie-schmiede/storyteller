<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Storyteller.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Storyteller\Tests\Unit\Domain\Model;

use PHPUnit\Framework\TestCase;
use PSBits\Storyteller\Domain\Model\Chapter;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

final class ChapterTest extends TestCase
{
    public function testConstructorInitializesAnEmptyContentElementCollection(): void
    {
        $chapter = new Chapter();

        self::assertInstanceOf(ObjectStorage::class, $chapter->getContentElements());
        self::assertCount(0, $chapter->getContentElements());
    }
}
