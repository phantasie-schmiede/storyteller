<?php
namespace PS\PsDiary\Domain\Repository;

use PS\PsDiary\Domain\Model\Entry;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

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
class EntryRepository extends Repository
{
    protected $defaultOrderings = array(
        'displayDate' => QueryInterface::ORDER_ASCENDING,
    );

    /**
     * @return QueryResultInterface
     */
    public function findLast()
    {
        $query = $this->createQuery();
        $query->setOrderings(array(
            'displayDate' => QueryInterface::ORDER_DESCENDING,
        ));
        $query->setLimit(1);

        return $query->execute();
    }

    /**
     * @param Entry $entry
     *
     * @return QueryResultInterface
     */
    public function findNext($entry)
    {
        $query = $this->createQuery();
        $query->matching(
            $query->greaterThan('displayDate', $entry->getDisplayDate())
        );
        $query->setLimit(1);

        return $query->execute();
    }

    /**
     * @param Entry $entry
     *
     * @return QueryResultInterface
     */
    public function findPrevious($entry)
    {
        $query = $this->createQuery();
        $query->setOrderings(array(
            'displayDate' => QueryInterface::ORDER_DESCENDING,
        ));
        $query->matching(
            $query->lessThan('displayDate', $entry->getDisplayDate())
        );
        $query->setLimit(1);

        return $query->execute();
    }

}