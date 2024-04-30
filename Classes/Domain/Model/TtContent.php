<?php
declare(strict_types=1);

/*
 * This file is part of PSB Diary.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbDiary\Domain\Model;

use PSB\PsbFoundation\Attribute\TCA\Mapping\Table;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class TtContent
 *
 * @package PSB\PsbDiary\Domain\Model
 */
#[Table(name: 'tt_content')]
class TtContent extends AbstractEntity
{
}
