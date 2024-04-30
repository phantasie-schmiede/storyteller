<?php
declare(strict_types=1);

/*
 * This file is part of PSB Diary.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbDiary\Controller;

use PSB\PsbDiary\Domain\Model\Entry;
use PSB\PsbDiary\Domain\Repository\EntryRepository;
use PSB\PsbFoundation\Attribute\PluginAction;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class EntryController
 *
 * @package PSB\PsbDiary\Controller
 */
class EntryController extends ActionController
{
    public function __construct(
        protected readonly EntryRepository $entryRepository,
    ) {
    }

    #[PluginAction(default: true)]
    public function showAction(Entry $entry = null): ResponseInterface
    {
        $entries = $this->entryRepository->findAll();

        if (!$entry) {
            $entry = $entries->getFirst();
        }

        $firstEntry = $entries->getFirst();
        $lastEntry = $this->entryRepository->findLast()
            ->getFirst();

        if (!$previousEntry = $this->entryRepository->findPrevious($entry)
            ->getFirst()) {
            $previousEntry = $firstEntry;
        }

        if (!$nextEntry = $this->entryRepository->findNext($entry)
            ->getFirst()) {
            $nextEntry = $lastEntry;
        }

        $this->view->assignMultiple([
            'entries'       => $entries,
            'currentEntry'  => $entry,
            'firstEntry'    => $firstEntry,
            'lastEntry'     => $lastEntry,
            'previousEntry' => $previousEntry,
            'nextEntry'     => $nextEntry,
        ]);

        return $this->htmlResponse();
    }
}
