<?php

namespace Sle\Extensionusagefinder\Controller;

use Sle\Extensionusagefinder\Configuration;
use Sle\Extensionusagefinder\TYPO3\Extbase\Backend\BackendSession;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Sle\Extensionusagefinder\TYPO3\Extbase\Extensionmanager\ExtensionsUtility;
use Sle\Extensionusagefinder\Domain\Model\FinderQuery;
use Sle\Extensionusagefinder\Domain\Repository\TtContentRepository;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

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
 * Class FinderController
 * @package Sle\Extensionusagefinder\Controller
 * @author Steve Lenz <kontakt@steve-lenz.de>
 */
class FinderController extends ActionController
{

    const SESSION_KEY = 'FinderQuery';

    /**
     * @var BackendSession
     */
    private $session = null;

    /**
     * Initialization
     */
    public function initializeAction()
    {
        $this->session = GeneralUtility::makeInstance(BackendSession::class, Configuration::EXT_KEY);
    }

    /**
     * action index
     *
     * @throws InvalidQueryException
     */
    public function indexAction()
    {
        $newFinder = null;
        /** @var ExtensionsUtility $extUtility */
        $extUtility = GeneralUtility::makeInstance(ExtensionsUtility::class);
        /** @var TtContentRepository $ttContentRepo */
        $ttContentRepo = $this->objectManager->get(TtContentRepository::class);

        if (null === $newFinder) {
            /** @var FinderQuery $newFinder */
            $newFinder = ($this->session->has(self::SESSION_KEY))
                ? $this->session->get(self::SESSION_KEY)
                : GeneralUtility::makeInstance(FinderQuery::class);
        }

        /**
         * @todo remove
         */
        $newFinder->setExtensionKey('xm_tools');

        $this->session->set(self::SESSION_KEY, $newFinder);
        $this->view->assignMultiple([
            'extensions'      => $extUtility->getAllExtensions(true),
            'extInfo'         => $extUtility->getExtensionInfo($newFinder->getExtensionKey()),
            'extDependencies' => $extUtility->getDependencies($newFinder->getExtensionKey()),
            'newFinder'       => $newFinder,
            'entities'        => (null !== $newFinder->getExtensionKey())
                ? $ttContentRepo->findByListType($newFinder)
                : null,
        ]);
    }

}
