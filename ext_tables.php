<?php

defined('TYPO3') || die();

(static function() {

        if (TYPO3_MODE === 'BE') {

            /**
             * Registers a Backend Module
             */
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Sle.extensionusagefinder',
                'web',
                'extensionfinder',
                '',
                [
                    'Finder' => 'index',
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:extensionusagefinder/Resources/Public/Icons/Extension.svg',
                    'labels' => 'LLL:EXT:extensionusagefinder/Resources/Private/Language/locallang_extensionfinder.xlf',
                ]
            );
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_extensionusagefinder_domain_model_finder',
            'EXT:extensionusagefinder/Resources/Private/Language/locallang_csh_tx_extensionusagefinder_domain_model_finder.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_extensionusagefinder_domain_model_finder');
        $GLOBALS['TCA']['tx_extensionusagefinder_domain_model_finder'] = [
            'ctrl' => [
                'title'                    => 'LLL:EXT:extensionusagefinder/Resources/Private/Language/locallang_db.xlf:tx_extensionusagefinder_domain_model_finder',
                'label'                    => 'uid',
                'tstamp'                   => 'tstamp',
                'crdate'                   => 'crdate',
                'cruser_id'                => 'cruser_id',
                'dividers2tabs'            => true,
                'versioningWS'             => 2,
                'versioning_followPages'   => true,
                'languageField'            => 'sys_language_uid',
                'transOrigPointerField'    => 'l10n_parent',
                'transOrigDiffSourceField' => 'l10n_diffsource',
                'delete'                   => 'deleted',
                'enablecolumns'            => [
                    'disabled'  => 'hidden',
                    'starttime' => 'starttime',
                    'endtime'   => 'endtime',
                ],
                'searchFields'             => '',
                'dynamicConfigFile'        => 'EXT:extensionusagefinder/Configuration/TCA/Finder.php',
                'iconfile'                 => 'EXT:extensionusagefinder/Resources/Public/Icons/tx_extensionusagefinder_domain_model_finder.gif',
            ],
        ];
})();
