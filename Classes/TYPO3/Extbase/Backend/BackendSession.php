<?php

namespace Sle\Extensionusagefinder\TYPO3\Extbase\Backend;

/**
 * TYPO3 Backend Session
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2015, Steve Lenz
 * @version 1.0.0
 * @package TYPO3 6.x
 */
class BackendSession
{

    /**
     * Storage key of current session
     * 
     * @var string 
     */
    private $storageKey = null;

    /**
     * Constructor
     * 
     * @param string $storageKey Name of session storrage
     */
    public function __construct($storageKey)
    {
        if (!is_string($storageKey)) {
            throw new \Exception('The given Session $storageKey is not a string!');
        }

        $this->storageKey = $storageKey;
    }

    /**
     * Stores data by key into the session
     * 
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $session       = $this->loadSessionData();
        $session[$key] = $value;
        $GLOBALS['BE_USER']->setAndSaveSessionData($this->storageKey, $session);
    }

    /**
     * Get session data by key
     * 
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        $session = $this->loadSessionData();

        return (isset($session[$key])) ? $session[$key] : null;
    }

    /**
     * Checks wehter a key in session exists
     * 
     * @param string $key
     * @return boolean
     */
    public function has($key)
    {
        $session = $this->loadSessionData();

        return (isset($session[$key])) ? true : false;
    }

    /**
     * Removes data from session by given key
     * 
     * @param string $key
     */
    public function remove($key)
    {
        $session = $this->loadSessionData();
        unset($session[$key]);
        $GLOBALS['BE_USER']->setAndSaveSessionData($this->storageKey, $session);
    }

    /**
     * Returns the data of the current session
     *  
     * @return array
     */
    private function loadSessionData()
    {
        if ($GLOBALS['BE_USER']->getSessionData($this->storageKey)) {
            $session = $GLOBALS['BE_USER']->getSessionData($this->storageKey);
        } else {
            $session = array();
        }

        return $session;
    }

}
