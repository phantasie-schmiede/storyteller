<?php
declare(strict_types=1);

/*
 * This file is part of PSB Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbStorybook\Domain\Model;

use PSB\PsbFoundation\Attribute\TCA\Column;
use PSB\PsbFoundation\Attribute\TCA\ColumnType\Inline;
use PSB\PsbFoundation\Attribute\TCA\ColumnType\Input;
use PSB\PsbFoundation\Attribute\TCA\Ctrl;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Story
 *
 * @package PSB\PsbStorybook\Domain\Model
 */
#[Ctrl(label: 'title', searchFields: ['title'])]
class Story extends AbstractEntity
{
    /**
     * @var ObjectStorage<Chapter>
     */
    #[Inline(linkedModel: Chapter::class, mm: 'tx_psbstorybook_story_chapter_mm')]
    protected ObjectStorage $chapters;

    #[Column(position: 'before:chapters')]
    #[Input]
    protected string $title = '';

    public function __construct()
    {
        $this->initializeObject();
    }

    public function getChapters(): ObjectStorage
    {
        return $this->chapters;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function initializeObject(): void
    {
        $this->chapters = new ObjectStorage();
    }

    public function setChapters(ObjectStorage $chapters): void
    {
        $this->chapters = $chapters;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
