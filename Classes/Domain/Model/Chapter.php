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
 * Class Chapter
 *
 * @package PSB\PsbStorybook\Domain\Model
 */
#[Ctrl(label: 'title', searchFields: ['title'])]
class Chapter extends AbstractEntity
{
    /**
     * @var ObjectStorage<TtContent>
     */
    #[Inline(linkedModel: TtContent::class, mm: 'tx_psbstorybook_chapter_content_mm')]
    protected ObjectStorage $contentElements;

    #[Column(position: 'before:contentElements')]
    #[Input]
    protected string $title = '';

    public function __construct()
    {
        $this->initializeObject();
    }

    /**
     * @return ObjectStorage<TtContent>
     */
    public function getContentElements(): ObjectStorage
    {
        return $this->contentElements;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function initializeObject(): void
    {
        $this->contentElements = new ObjectStorage();
    }

    /**
     * @param ObjectStorage<TtContent> $contentElements
     */
    public function setContentElements(ObjectStorage $contentElements): void
    {
        $this->contentElements = $contentElements;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
