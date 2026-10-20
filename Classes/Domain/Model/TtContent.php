<?php

declare(strict_types=1);

/*
 * This file is part of PSBits Storybook.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSBits\Storybook\Domain\Model;

use PSBits\Foundation\Attribute\TCA\Mapping\Table;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class TtContent
 *
 * @package PSBits\Storybook\Domain\Model
 */
#[Table(name: 'tt_content')]
class TtContent extends AbstractEntity
{
}
