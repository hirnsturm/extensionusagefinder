<?php

namespace Sle\Extensionusagefinder\Controller;

use Sle\TYPO3\Extbase\Backend\BackendActionController;
use Sle\TYPO3\Extbase\Backend\BackendSession;
use Sle\TYPO3\Extbase\Backend\BackendUser;
use Sle\Helper\ArrayHelper;
use Sle\Extensionusagefinder\Domain\Model\Finder;
use Sle\Extensionusagefinder\Domain\Repository\ContentRepository;

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
 * FinderController
 *
 * @package TYPO3
 * @subpackage extensionusagefinder
 * @author Steve Lenz <kontakt@steve-lenz.de>
 */
class FinderController extends BackendActionController
{
    /**
     * The session
     * 
     * @var \Sle\TYPO3\Extbase\Backend\BackendSession
     */
    private $session = null;

    /**
     * 
     */
    public function initializeAction()
    {
        $this->session = new BackendSession('extensionusagefinder');
    }

    /**
     * action index
     *
     * @return void
     */
    public function indexAction()
    {
        $entities = null;
        $newFinder = new Finder();

        if ($this->request->hasArgument('extensionKey')) {
            $newFinder->setExtensionKey($this->request->getArgument('extensionKey'));
            $contentRepo = new ContentRepository();
            $entities = $contentRepo->findByListType($newFinder->getExtensionKey());
        }

        $extensionsArray = $this->getAvailableAndInstalledExtensions();
        $extensions      = array();
        $arrayHelper     = new ArrayHelper();

        foreach ($extensionsArray as $key => $val) {
            $extensions[$key] = $arrayHelper->arrayAndSubArrays2Object((array) $val);
        }

        $this->view
            ->assign('user', BackendUser::get())
            ->assign('extensions', $extensions)
            ->assign('newFinder', $newFinder)
            ->assign('entities', $entities);
    }

}