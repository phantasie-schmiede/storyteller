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
use PSB\PsbFoundation\Attribute\TCA\ColumnType\Slug;
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
    #[Inline(linkedModel: Chapter::class, mm: 'tx_psbstorybook_story_chapter_mm')]
    protected ObjectStorage $chapters;

    #[Column(position: 'after:title')]
    #[Slug(eval: '', generatorOptions: self::SLUG_GENEREATOR_OPTIONS)]
    protected string $slug = '';

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
}
