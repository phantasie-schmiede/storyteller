<?php
declare(strict_types=1);

/*
 * This file is part of PSB Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbStorybook\Domain\Repository;

use PSB\PsbStorybook\Domain\Model\Entry;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class EntryRepository
 *
 * @package PSB\PsbStorybook\Domain\Repository
 */
class EntryRepository extends Repository
{
    protected $defaultOrderings = [
        'displayDate' => QueryInterface::ORDER_ASCENDING,
    ];

    public function findLast(): ?Entry
    {
        $query = $this->createQuery();
        $query->setLimit(1)
            ->setOrderings([
                'displayDate' => QueryInterface::ORDER_DESCENDING,
            ]);

        return $query->execute()
            ->getFirst();
    }

    /**
     * @throws InvalidQueryException
     */
    public function findNext(Entry $entry): ?Entry
    {
        $query = $this->createQuery();
        $query->matching(
            $query->greaterThan(
                'displayDate',
                $entry->getDisplayDate()
                    ->format('Y-m-d H:i:s')
            )
        );
        $query->setLimit(1);

        return $query->execute()
            ->getFirst();
    }

    /**
     * @throws InvalidQueryException
     */
    public function findPrevious(Entry $entry): ?Entry
    {
        $query = $this->createQuery();
        $query->matching(
            $query->lessThan(
                'displayDate',
                $entry->getDisplayDate()
                    ->format('Y-m-d H:i:s')
            )
        );
        $query->setLimit(1)
            ->setOrderings([
                'displayDate' => QueryInterface::ORDER_DESCENDING,
            ]);

        return $query->execute()
            ->getFirst();
    }

}
