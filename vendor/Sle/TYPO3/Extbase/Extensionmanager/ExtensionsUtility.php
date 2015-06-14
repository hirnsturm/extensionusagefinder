<?php

namespace Sle\TYPO3\Extbase\Extensionmanager;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use Sle\Helper\ArrayHelper;

/**
 * TYPO3 ExtensionsUtility
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2015, Steve Lenz
 * @version 1.0.0
 * @package TYPO3 6.x
 */
class ExtensionsUtility
{
    /**
     * Array of available and installed extensions
     * 
     * @var array
     */
    private $extensions;

    /**
     * Array of available and installed extensions as objects
     *
     * @var array
     */
    private $extensionObjects;

    /**
     * Constructor
     */
    public function __construct()
    {
        $extbaseObjectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $listUtility          = $extbaseObjectManager->get('TYPO3\\CMS\\Extensionmanager\\Utility\\ListUtility');

        $this->extensions = $listUtility->getAvailableAndInstalledExtensionsWithAdditionalInformation();
        $this->transformToObjects();
    }

    /**
     * Returns an array of available and installed extensions
     *
     * @return array
     */
    public function getAllExtensions($asArrayOfObjects = true)
    {
        if (true === $asArrayOfObjects) {
            return $this->extensionObjects;
        } else {
            return $this->extensions;
        }
    }

    /**
     * 
     * @param string $extKey
     * @return mixed
     */
    public function getExtensionInfo($extKey)
    {
        return (isset($this->extensions[$extKey])) ? $this->extensions[$extKey] : null;
    }

    /**
     * Returns an array of depended extensions
     * @param string $extKey
     * @return array
     */
    public function getDependencies($extKey)
    {
        $debendencies = array();

        foreach ($this->extensions as $key => $val) {
            if (isset($val['constraints']['depends'][$extKey])) {
                $debendencies[$key] = $val;
            }
        }

        return $debendencies;
    }

    /**
     * 
     */
    private function transformToObjects()
    {
        $arrayHelper = new ArrayHelper();
        $this->extensionObjects = array();

        foreach ($this->extensions as $key => $val) {
            $this->extensionObjects[$key] = $arrayHelper->arrayAndSubArrays2Object((array) $val);
        }
    }

}