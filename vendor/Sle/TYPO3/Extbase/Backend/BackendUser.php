<?php

namespace Sle\TYPO3\Extbase\Backend;

/**
 * TYPO3 Backend User
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2015, Steve Lenz
 * @version 1.0.0
 * @package TYPO3 6.x
 */
class BackendUser
{

    public static function get()
    {
        return $GLOBALS['BE_USER']->user;
    }

}