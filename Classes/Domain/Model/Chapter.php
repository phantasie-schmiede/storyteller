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
 * Class Chapter
 *
 * @package PSBits\Storybook\Domain\Model
 */
#[Ctrl(label: 'title', searchFields: ['title'])]
class Chapter extends AbstractEntity
{
    public const SLUG_GENEREATOR_OPTIONS = [
        'fields'               => [
            'title',
            'nav_title',
        ],
        'fieldSeparator'       => '/',
        'prefixParentPageSlug' => true,
        'replacements'         => [
            '/' => '',
            '.' => '-',
        ],
    ];

    /**
     * @var ObjectStorage<TtContent>
     */
    #[Column(position: 'after:slug')]
    #[Inline(linkedModel: TtContent::class, mm: 'tx_storybook_chapter_content_mm')]
    protected ObjectStorage $contentElements;

    #[Column(position: 'after:title')]
    #[Slug(eval: '', generatorOptions: self::SLUG_GENEREATOR_OPTIONS)]
    protected string $slug = '';

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
}
