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
 * Class Chapter
 *
 * @package PSB\PsbStorybook\Domain\Model
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
    #[Inline(linkedModel: TtContent::class, mm: 'tx_psbstorybook_chapter_content_mm')]
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
