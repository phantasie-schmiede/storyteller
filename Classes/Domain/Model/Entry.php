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
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Entry
 *
 * @package PSB\PsbDiary\Domain\Model
 */
class Entry extends AbstractEntity
{
    /**
     * @var ObjectStorage<TtContent>
     */
    protected ObjectStorage $contentElements;

    protected DateTime $displayDate;

    protected string $title = '';

    /**
     * @return ObjectStorage<TtContent>
     */
    public function getContentElements()
    {
        return $this->contentElements;
    }

    /**
     * @return int
     */
    public function getDisplayDate()
    {
        return $this->displayDate;
    }

    public function getSortedContentElements()
    {
        static $sortedContentElements = [];
        if (!isset($sortedContentElements[$this->getUid()])) {
            $contentElements = $this->getContentElements();
            $tmpContentElements = [];
            foreach ($contentElements as $contentElement) {
                $tmpContentElements[$contentElement->getSorting()] = $contentElement;
            }
            ksort($tmpContentElements);
            $sortedContentElements[$this->getUid()] = $tmpContentElements;
        }

        return $sortedContentElements[$this->getUid()];
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param ObjectStorage<TtContent> $contentElements
     */
    public function setContentElements($contentElements)
    {
        $this->contentElements = $contentElements;
    }

    /**
     * @param int $displayDate
     */
    public function setDisplayDate($displayDate)
    {
        $this->displayDate = $displayDate;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}
