<?php
declare(strict_types=1);

/*
 * This file is part of PSB Diary.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace PSB\PsbDiary\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class TtContent
 *
 * @package PSB\PsbDiary\Domain\Model
 */
class TtContent extends AbstractEntity
{
    /**
     * @var string
     */
    protected $CType;
    /**
     * @var string
     */
    protected $altText;
    /**
     * @var string
     */
    protected $bodytext;
    /**
     * @var integer
     */
    protected $cols;
    /**
     * @var \DateTime
     */
    protected $crdate;
    /**
     * @var string
     */
    protected $header;
    /**
     * @var string
     */
    protected $headerLayout;
    /**
     * @var string
     */
    protected $headerLink;
    /**
     * @var string
     */
    protected $headerPosition;
    /**
     * @var string
     */
    protected $image;
    /**
     * @var string
     */
    protected $imageLink;
    /**
     * @var string
     */
    protected $imageZoom;
    /**
     * @var integer
     */
    protected $imageborder;
    /**
     * @var string
     */
    protected $imagecaption;
    /**
     * @var integer
     */
    protected $imagecols;
    /**
     * @var integer
     */
    protected $imageorient;
    /**
     * @var integer
     */
    protected $imagewidth;
    /**
     * @var string
     */
    protected $layout;
    /**
     * @var string
     */
    protected $listType;
    /**
     * @var string
     */
    protected $media;
    /**
     * @var integer
     */
    protected $sorting;
    /**
     * @var string
     */
    protected $subheader;
    /**
     * @var string
     */
    protected $titleText;
    /**
     * @var \DateTime
     */
    protected $tstamp;

    public function getAltText()
    {
        return $this->altText;
    }

    public function getBodytext()
    {
        return $this->bodytext;
    }

    public function getCType()
    {
        return $this->CType;
    }

    public function getCols()
    {
        return $this->cols;
    }

    public function getCrdate()
    {
        return $this->crdate;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getHeaderLayout()
    {
        return $this->headerLayout;
    }

    public function getHeaderLink()
    {
        return $this->headerLink;
    }

    public function getHeaderPosition()
    {
        return $this->headerPosition;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getImageLink()
    {
        return $this->imageLink;
    }

    public function getImageZoom()
    {
        return $this->imageZoom;
    }

    public function getImageborder()
    {
        return $this->imageborder;
    }

    public function getImagecaption()
    {
        return $this->imagecaption;
    }

    public function getImagecols()
    {
        return $this->imagecols;
    }

    public function getImageorient()
    {
        return $this->imageorient;
    }

    public function getImagewidth()
    {
        return $this->imagewidth;
    }

    public function getLayout()
    {
        return $this->layout;
    }

    public function getListType()
    {
        return $this->listType;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getSorting()
    {
        return $this->sorting;
    }

    public function getSubheader()
    {
        return $this->subheader;
    }

    public function getTitleText()
    {
        return $this->titleText;
    }

    public function getTstamp()
    {
        return $this->tstamp;
    }

    public function setAltText($altText)
    {
        $this->altText = $altText;
    }

    public function setBodytext($bodytext)
    {
        $this->bodytext = $bodytext;
    }

    public function setCType($CType)
    {
        $this->CType = $CType;
    }

    public function setCols($cols)
    {
        $this->cols = $cols;
    }

    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }

    public function setHeader($header)
    {
        $this->header = $header;
    }

    public function setHeaderLayout($headerLayout)
    {
        $this->headerLayout = $headerLayout;
    }

    public function setHeaderLink($headerLink)
    {
        $this->headerLink = $headerLink;
    }

    public function setHeaderPosition($headerPosition)
    {
        $this->headerPosition = $headerPosition;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;
    }

    public function setImageZoom($imageZoom)
    {
        $this->imageZoom = $imageZoom;
    }

    public function setImageborder($imageborder)
    {
        $this->imageborder = $imageborder;
    }

    public function setImagecaption($imagecaption)
    {
        $this->imagecaption = $imagecaption;
    }

    public function setImagecols($imagecols)
    {
        $this->imagecols = $imagecols;
    }

    public function setImageorient($imageorient)
    {
        $this->imageorient = $imageorient;
    }

    public function setImagewidth($imagewidth)
    {
        $this->imagewidth = $imagewidth;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function setListType($listType)
    {
        $this->listType = $listType;
    }

    public function setMedia($media)
    {
        $this->media = $media;
    }

    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    public function setSubheader($subheader)
    {
        $this->subheader = $subheader;
    }

    public function setTitleText($titleText)
    {
        $this->titleText = $titleText;
    }

    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

}
