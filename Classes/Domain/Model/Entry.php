<?php
namespace PS\PsDiary\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Daniel Ablass <dn@phantasie-schmiede.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
class Entry extends AbstractEntity
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PS\PsDiary\Domain\Model\TtContent>
     */
    protected $contentElements;

    /**
     * @var int
     */
    protected $displayDate;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PS\PsDiary\Domain\Model\TtContent> $contentElements
     */
    public function setContentElements($contentElements)
    {
        $this->contentElements = $contentElements;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PS\PsDiary\Domain\Model\TtContent>
     */
    public function getContentElements()
    {
        return $this->contentElements;
    }

    public function getSortedContentElements()
    {
        static $sortedContentElements = array();
        if (!isset($sortedContentElements[$this->getUid()])) {
            $contentElements = $this->getContentElements();
            $tmpContentElements = array();
            foreach ($contentElements as $contentElement) {
                $tmpContentElements[$contentElement->getSorting()] = $contentElement;
            }
            ksort($tmpContentElements);
            $sortedContentElements[$this->getUid()] = $tmpContentElements;
        }

        return $sortedContentElements[$this->getUid()];
    }

    /**
     * @param int $displayDate
     */
    public function setDisplayDate($displayDate)
    {
        $this->displayDate = $displayDate;
    }

    /**
     * @return int
     */
    public function getDisplayDate()
    {
        return $this->displayDate;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

}