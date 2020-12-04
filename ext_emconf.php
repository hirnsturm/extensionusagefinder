<?php

/** @var string $_EXTKEY */
$EM_CONF[$_EXTKEY] = array(
    'title'            => 'Extension Usage Finder',
    'description'      => 'Backend module that helps to find extension usages in your TYPO3 project.',
    'category'         => 'module',
    'author'           => 'Steve Lenz',
    'author_email'     => 'kontakt@steve-lenz.de',
    'state'            => 'stable',
    'internal'         => '',
    'uploadfolder'     => '0',
    'createDirs'       => '',
    'clearCacheOnLoad' => 0,
    'version'          => '1.5.0',
    'constraints'      => array(
        'depends'   => array(
            'typo3'   => '8.7.0-8.7.99',
            'extbase' => '8.7.0-8.7.99',
            'fluid'   => '8.7.0-8.7.99',
        ),
        'conflicts' => array(
        ),
        'suggests'  => array(
        ),
    ),
);
