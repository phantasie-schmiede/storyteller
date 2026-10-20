<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Storybook\Domain\Model;

use PSBits\Foundation\Attribute\TCA\Column;
use PSBits\Foundation\Attribute\TCA\ColumnType\Inline;
use PSBits\Foundation\Attribute\TCA\ColumnType\Input;
use PSBits\Foundation\Attribute\TCA\ColumnType\Slug;
use PSBits\Foundation\Attribute\TCA\Ctrl;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Story
 *
 * @package PSBits\Storybook\Domain\Model
 */
#[Ctrl(label: 'title', searchFields: [
    'subtitle',
    'title',
])]
class Story extends AbstractEntity
{
    public const SLUG_GENEREATOR_OPTIONS = [
        'fields'               => [
            'title',
        ],
        'prefixParentPageSlug' => true,
        'replacements'         => [
            '/' => '',
            '.' => '-',
        ],
    ];

    /**
     * @var ObjectStorage<Chapter>
     */
    #[Column(position: 'after:slug')]
    #[Inline(linkedModel: Chapter::class, mm: 'tx_storybook_story_chapter_mm')]
    protected ObjectStorage $chapters;

    #[Column(position: 'after:title')]
    #[Slug(eval: '', generatorOptions: self::SLUG_GENEREATOR_OPTIONS)]
    protected string $slug = '';

    #[Input]
    protected string $subtitle = '';

    #[Input]
    protected string $title = '';

    public function __construct()
    {
        $this->initializeObject();
    }

    /**
     * @return ObjectStorage<Chapter>
     */
    public function getChapters(): ObjectStorage
    {
        return $this->chapters;
    }

    public function getFirstChapter(): Chapter
    {
        return $this->getChapters()
            ->offsetGet(0);
    }

    public function getNextChapter(Chapter $chapter): ?Chapter
    {
        // Position starts with 1 and offset with 0. Therefore, this is already the index for the next chapter.
        $nextIndex = $this->getChapters()
            ->getPosition($chapter);

        return $this->getChapterByIndex($nextIndex);
    }

    public function getPreviousChapter(Chapter $chapter): ?Chapter
    {
        $currentIndex = $this->getChapters()
            ->getPosition($chapter);

        /*
         * Position starts with 1 and offset with 0. Therefore, you have to subtract 2 to get the index of the previous
         * chapter.
         */
        $previousIndex = $currentIndex - 2;

        return $this->getChapterByIndex($previousIndex);
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function initializeObject(): void
    {
        $this->chapters = new ObjectStorage();
    }

    private function getChapterByIndex(int $index): ?Chapter
    {
        $chapters = $this->getChapters();
        $key      = (string)$index;

        if (false === $chapters->offsetExists($key)) {
            return null;
        }

        /** @var Chapter $chapter */
        $chapter = $chapters->offsetGet($key);

        return $chapter;
    }
}
