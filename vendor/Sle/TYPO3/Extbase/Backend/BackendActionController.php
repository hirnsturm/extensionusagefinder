<?php

namespace Sle\TYPO3\Extbase\Backend;

use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Backend Action Controller
 * 
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @version 1.0.0
 */
class BackendActionController extends ActionController
{

    /**
     * Returns a instance of a given class
     * 
     * @param string $className Class name with namespace like 'Foo\\Bar\\Class'
     * @return instannce
     */
    public function makeInstance($className)
    {
        $extbaseObjectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        return $extbaseObjectManager->get($className);
    }

    /**
     * Returns an array of available and installed extensions
     *
     * @return array
     */
    protected function getAvailableAndInstalledExtensions()
    {
        $extbaseObjectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $listUtility          = $extbaseObjectManager->get('TYPO3\\CMS\\Extensionmanager\\Utility\\ListUtility');

        return $listUtility->getAvailableAndInstalledExtensionsWithAdditionalInformation();
    }

}