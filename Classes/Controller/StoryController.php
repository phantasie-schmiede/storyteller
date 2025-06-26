<?php
declare(strict_types=1);

/*
 * This file is part of PSBits Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Storybook\Controller;

use PSBits\Foundation\Attribute\PluginAction;
use PSBits\Storybook\Domain\Model\Chapter;
use PSBits\Storybook\Domain\Model\Story;
use PSBits\Storybook\Domain\Repository\StoryRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class StoryController
 *
 * @package PSBits\Storybook\Controller
 */
class StoryController extends ActionController
{
    public function __construct(
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
                actionName: 'show', arguments: [
                'story' => $story,
            ]
            );
        }

        $this->view->assign('stories', $this->storyRepository->findAll());

        return $this->htmlResponse();
    }

    #[PluginAction]
    public function showAction(Story $story, Chapter $currentChapter = null): ResponseInterface
    {
        $currentChapter ??= $story->getFirstChapter();

        $this->view->assignMultiple([
            'story'           => $story,
            'currentChapter'  => $currentChapter,
            'nextChapter'     => $story->getNextChapter($currentChapter),
            'previousChapter' => $story->getPreviousChapter($currentChapter),
        ]);

        return $this->htmlResponse();
    }
}
