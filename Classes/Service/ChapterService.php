<?php
declare(strict_types=1);

/*
 * This file is part of PSB Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbStorybook\Controller;

use PSB\PsbStorybook\Domain\Model\Chapter;
use PSB\PsbStorybook\Domain\Model\Story;

/**
 * Class ChapterService
 *
 * @package PSB\PsbStorybook\Controller
 */
class ChapterService
{
    public function getFirstChapter(Story $story): Chapter
    {
        return $story->getChapters()
            ->offsetGet(0);
    }

    public function getNextChapter(Story $story, Chapter $chapter): ?Chapter
    {
        $currentIndex = $story->getChapters()
            ->getPosition($chapter);
        $nextIndex = $currentIndex + 1;

        return $this->getChapterByIndex($story, $nextIndex);
    }

    public function getPreviousChapter(Story $story, Chapter $chapter): ?Chapter
    {
        $currentIndex = $story->getChapters()
            ->getPosition($chapter);
        $previousIndex = $currentIndex - 1;

        return $this->getChapterByIndex($story, $previousIndex);
    }

    private function getChapterByIndex(Story $story, int $index): ?Chapter
    {
        return $story->getChapters()
            ->offsetExists($index) ? $story->getChapters()
            ->offsetGet($index) : null;
    }
}
