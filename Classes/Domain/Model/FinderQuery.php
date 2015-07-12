<?php

namespace Sle\Extensionusagefinder\Domain\Model;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Steve Lenz <kontakt@steve-lenz.de>
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
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * Finder
 *
 * @entity
 */
class FinderQuery extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{
    /**
     * extensionKey
     *
     * @var string
     * @validate Text
     */
    protected $extensionKey;

    /**
     * deleted
     *
     * @var string
     * @validate Boolean
     */
    protected $deleted = true;

    /**
     * Returns the extensionKey
     *
     * @return string $extensionKey
     */
    public function getExtensionKey()
    {
        return $this->extensionKey;
    }

    /**
     * Sets the extensionKey
     *
     * @param string $extensionKey
     * @return void
     */
    public function setExtensionKey($extensionKey)
    {
        $this->extensionKey = $extensionKey;
    }

    /**
     * Returns the deleted
     *
     * @return boolean $deleted
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Sets the deleted
     *
     * @param boolean $deleted
     * @return void
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

}