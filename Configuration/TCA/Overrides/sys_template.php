<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function ($extKey) {
        /**
         * Add static files
         */
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            $extKey,
            'Configuration/TypoScript',
            'Extension Usage Finder'
        );
    },
    \Sle\Extensionusagefinder\Configuration::EXT_KEY
);
