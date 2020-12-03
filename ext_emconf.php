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
    'version'          => '1.4.1',
    'constraints'      => array(
        'depends'   => array(
            'typo3'   => '7.6.0-7.6.99',
            'extbase' => '7.6.0-7.6.99',
            'fluid'   => '7.6.0-7.6.99',
        ),
        'conflicts' => array(
        ),
        'suggests'  => array(
        ),
    ),
);
