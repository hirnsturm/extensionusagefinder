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
    'version'          => '3.0.0-dev',
    'constraints'      => array(
        'depends'   => array(
            'typo3'   => '9.5.0-9.5.99',
            'extbase' => '9.5.0-9.5.99',
            'fluid'   => '9.5.0-9.5.99',
        ),
        'conflicts' => array(
        ),
        'suggests'  => array(
        ),
    ),
);
