<?php
$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('extensionusagefinder');
return array(
    'Sle\TYPO3\Extbase\Backend\BackendActionController' => $extPath.'vendor/Sle/TYPO3/Extbase/Backend/BackendActionController.php',
    'Sle\TYPO3\Extbase\Backend\BackendSession'          => $extPath.'vendor/Sle/TYPO3/Extbase/Backend/BackendSession.php',
    'Sle\TYPO3\Extbase\Backend\BackendUser'             => $extPath.'vendor/Sle/TYPO3/Extbase/Backend/BackendUser.php',
    'Sle\TYPO3\Extbase\Repository\BaseReposiory'        => $extPath.'vendor/Sle/TYPO3/Extbase/Repository/BaseRepository.php',
    'Sle\Helper\ArrayHelper'                            => $extPath.'vendor/Sle/Helper/ArrayHelper.php',
);
