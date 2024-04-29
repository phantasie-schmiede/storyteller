<?php
declare(strict_types=1);

/*
 * This file is part of PSB Diary.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbDiary\Domain\Repository;

use PSB\PsbDiary\Domain\Model\Entry;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class EntryRepository
 *
 * @package PSB\PsbDiary\Domain\Repository
 */
class EntryRepository extends Repository
{
    protected $defaultOrderings = [
        'displayDate' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * @return QueryResultInterface
     */
    public function findLast()
    {
        $query = $this->createQuery();
        $query->setOrderings([
            'displayDate' => QueryInterface::ORDER_DESCENDING,
        ]);
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
        $query->setOrderings([
            'displayDate' => QueryInterface::ORDER_DESCENDING,
        ]);
        $query->matching(
            $query->lessThan('displayDate', $entry->getDisplayDate())
        );
        $query->setLimit(1);

        return $query->execute();
    }

}
