<?php
/* * *************************************************************
 * Extension Manager/Repository config file for ext: "extensionusagefinder"
 *
 * Auto generated by Extension Builder 2015-06-03
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 * ************************************************************* */

$EM_CONF[$_EXTKEY] = array(
    'title'            => 'Extension Usage Finder',
    'description'      => 'This Backend module helps you to find the usage of an extension in your TYPO3 project.',
    'category'         => 'module',
    'author'           => 'Steve Lenz',
    'author_email'     => 'kontakt@steve-lenz.de',
    'state'            => 'stable',
    'internal'         => '',
    'uploadfolder'     => '0',
    'createDirs'       => '',
    'clearCacheOnLoad' => 0,
    'version'          => '1.3.0',
    'constraints'      => array(
        'depends'   => array(
            'typo3'   => '6.2.0-7.4.99',
            'extbase' => '6.2.0-7.4.99',
            'fluid'   => '6.2.0-7.4.99',
        ),
        'conflicts' => array(
        ),
        'suggests'  => array(
        ),
    ),
);
