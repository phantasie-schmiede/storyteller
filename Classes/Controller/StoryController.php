<?php
declare(strict_types=1);

/*
 * This file is part of PSB Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbStorybook\Controller;

use PSB\PsbFoundation\Attribute\PluginAction;
use PSB\PsbStorybook\Domain\Model\Chapter;
use PSB\PsbStorybook\Domain\Model\Story;
use PSB\PsbStorybook\Domain\Repository\StoryRepository;
use PSB\PsbStorybook\Service\ChapterService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class StoryController
 *
 * @package PSB\PsbStorybook\Controller
 */
class StoryController extends ActionController
{
    public function __construct(
        protected readonly ChapterService  $chapterService,
        protected readonly StoryRepository $storyRepository,
    ) {
    }

    #[PluginAction(default: true)]
    public function listAction(): ResponseInterface
    {
        $stories = $this->storyRepository->findAll();

        if (1 === $stories->count()) {
            $story = $stories->getFirst();

            return $this->redirect(
                'show', null, null, [
                    'currentChapter' => $this->chapterService->getFirstChapter($story),
                    'story'          => $story,
                ]
            );
        }

        $this->view->assign('stories', $this->storyRepository->findAll());

        return $this->htmlResponse();
    }

    #[PluginAction]
    public function showAction(Story $story, Chapter $currentChapter = null): ResponseInterface
    {
        $currentChapter ??= $this->chapterService->getFirstChapter($story);

        $this->view->assignMultiple([
            'story'           => $story,
            'currentChapter'  => $currentChapter,
            'nextChapter'     => $this->chapterService->getNextChapter($story, $currentChapter),
            'previousChapter' => $this->chapterService->getPreviousChapter($story, $currentChapter),
        ]);

        return $this->htmlResponse();
    }
}
