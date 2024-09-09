<?php
declare(strict_types=1);

/*
 * This file is part of PSB Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbStorybook\Service;

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
        // Position starts with 1 and offset with 0. Therefore, this is already the index for the next chapter.
        $nextIndex = $story->getChapters()
            ->getPosition($chapter);

        return $this->getChapterByIndex($story, $nextIndex);
    }

    public function getPreviousChapter(Story $story, Chapter $chapter): ?Chapter
    {
        $currentIndex = $story->getChapters()
            ->getPosition($chapter);

        /*
         * Position starts with 1 and offset with 0. Therefore, you have to subtract 2 to get the index of the previous
         * chapter.
         */
        $previousIndex = $currentIndex - 2;

        return $this->getChapterByIndex($story, $previousIndex);
    }

    private function getChapterByIndex(Story $story, int $index): ?Chapter
    {
        return $story->getChapters()
            ->offsetExists($index) ? $story->getChapters()
            ->offsetGet($index) : null;
    }
}
