<?php
namespace PS\PsDiary\Controller;

use PS\PsDiary\Domain\Model\Entry;
use PS\PsDiary\Domain\Repository\EntryRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
class EntryController extends ActionController
{
    /**
     * @var \PS\PsDiary\Domain\Repository\EntryRepository
     * @inject
     */
    protected $entryRepository;

    /**
     * @param \PS\PsDiary\Domain\Model\Entry $entry
     * @dontvalidate $entry
     */
    public function listAction(Entry $entry = null)
    {
        $entries = $this->entryRepository->findAll();
        if (!$entry) {
            $entry = $entries->getFirst();
        }
        $firstEntry = $entries->getFirst();
        $lastEntry = $this->entryRepository->findLast()->getFirst();
        if (!$previousEntry = $this->entryRepository->findPrevious($entry)->getFirst()) {
            $previousEntry = $firstEntry;
        }
        if (!$nextEntry = $this->entryRepository->findNext($entry)->getFirst()) {
            $nextEntry = $lastEntry;
        }

        $this->view->assignMultiple(array(
            'entries'       => $entries,
            'currentEntry'  => $entry,
            'firstEntry'    => $firstEntry,
            'lastEntry'     => $lastEntry,
            'previousEntry' => $previousEntry,
            'nextEntry'     => $nextEntry
        ));
    }

}