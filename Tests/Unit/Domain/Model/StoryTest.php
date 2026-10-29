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
use PSBits\Storyteller\Domain\Model\Story;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

final class StoryTest extends TestCase
{
    private Story $story;

    protected function setUp(): void
    {
        parent::setUp();

        $this->story = new Story();
    }

    public function testConstructorInitializesAnEmptyChapterCollection(): void
    {
        self::assertInstanceOf(ObjectStorage::class, $this->story->getChapters());
        self::assertCount(0, $this->story->getChapters());
    }

    public function testGetFirstChapterReturnsTheFirstChapter(): void
    {
        [$first, $second] = $this->chapters(2);

        self::assertSame($first, $this->story->getFirstChapter());
    }

    public function testGetNextChapterReturnsTheFollowingChapter(): void
    {
        [$first, $second, $third] = $this->chapters(3);

        self::assertSame($second, $this->story->getNextChapter($first));
        self::assertSame($third, $this->story->getNextChapter($second));
    }

    public function testGetNextChapterOfTheLastChapterReturnsNull(): void
    {
        [, , $third] = $this->chapters(3);

        self::assertNull($this->story->getNextChapter($third));
    }

    public function testGetPreviousChapterReturnsThePrecedingChapter(): void
    {
        [$first, $second, $third] = $this->chapters(3);

        self::assertSame($first, $this->story->getPreviousChapter($second));
        self::assertSame($second, $this->story->getPreviousChapter($third));
    }

    public function testGetPreviousChapterOfTheFirstChapterReturnsNull(): void
    {
        [$first] = $this->chapters(3);

        self::assertNull($this->story->getPreviousChapter($first));
    }

    public function testGetFirstChapterOfAStoryWithoutChaptersReturnsNull(): void
    {
        self::assertNull($this->story->getFirstChapter());
    }

    public function testGetNextChapterOfAForeignChapterReturnsNull(): void
    {
        $foreign = new Chapter();

        self::assertNull($this->story->getNextChapter($foreign));
        self::assertNull($this->story->getPreviousChapter($foreign));
    }

    /**
     * @return Chapter[]
     */
    private function chapters(int $count): array
    {
        $chapters = [];

        for ($i = 0; $i < $count; ++$i) {
            $chapter = new Chapter();
            $this->story->getChapters()->attach($chapter);
            $chapters[] = $chapter;
        }

        return $chapters;
    }
}
