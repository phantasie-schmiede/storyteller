<?php
declare(strict_types=1);

/*
 * This file is part of PSB Diary.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbDiary\Domain\Model;

use DateTime;
use PSB\PsbFoundation\Attribute\TCA\ColumnType\Datetime as TcaDatetime;
use PSB\PsbFoundation\Attribute\TCA\ColumnType\Inline;
use PSB\PsbFoundation\Attribute\TCA\ColumnType\Input;
use PSB\PsbFoundation\Attribute\TCA\Ctrl;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Entry
 *
 * @package PSB\PsbDiary\Domain\Model
 */
#[Ctrl(label: 'title', searchFields: ['title'])]
class Entry extends AbstractEntity
{
    /**
     * @var ObjectStorage<TtContent>
     */
    #[Inline(linkedModel: TtContent::class, mm: 'tx_psbdiary_entry_content_mm')]
    protected ObjectStorage $contentElements;

    #[TcaDatetime]
    protected DateTime $displayDate;

    #[Input]
    protected string $title = '';

    /**
     * @return ObjectStorage<TtContent>
     */
    public function getContentElements(): ObjectStorage
    {
        return $this->contentElements;
    }

    public function getDisplayDate(): DateTime
    {
        return $this->displayDate;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param ObjectStorage<TtContent> $contentElements
     */
    public function setContentElements($contentElements): void
    {
        $this->contentElements = $contentElements;
    }

    public function setDisplayDate(DateTime $displayDate): void
    {
        $this->displayDate = $displayDate;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
