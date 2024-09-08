<?php
declare(strict_types=1);

/*
 * This file is part of PSB Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbStorybook\Controller;

use PSB\PsbStorybook\Domain\Model\Chapter;
use PSB\PsbStorybook\Domain\Repository\ChapterRepository;
use PSB\PsbFoundation\Attribute\PluginAction;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

/**
 * Class ChapterController
 *
 * @package PSB\PsbStorybook\Controller
 */
class ChapterController extends ActionController
{
    public function __construct(
        protected readonly ChapterRepository $chapterRepository,
    ) {
    }

    /**
     * @throws InvalidQueryException
     */
    #[PluginAction(default: true)]
    public function showAction(Chapter $chapter = null): ResponseInterface
    {
        $chapters = $this->chapterRepository->findAll();

        if (!$chapter) {
            $chapter = $chapters->getFirst();
        }

        $firstChapter = $chapters->getFirst();
        $lastChapter = $this->chapterRepository->findLast();

        if (!$previousChapter = $this->chapterRepository->findPrevious($chapter)) {
            $previousChapter = $firstChapter;
        }

        if (!$nextChapter = $this->chapterRepository->findNext($chapter)) {
            $nextChapter = $lastChapter;
        }

        $this->view->assignMultiple([
            'chapters'        => $chapters,
            'currentChapter'  => $chapter,
            'firstChapter'    => $firstChapter,
            'lastChapter'     => $lastChapter,
            'previousChapter' => $previousChapter,
            'nextChapter'     => $nextChapter,
        ]);

        return $this->htmlResponse();
    }
}
