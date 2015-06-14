<?php

namespace Sle\Extensionusagefinder\Domain\Repository;

/**
 * ContentRepository of tt_content
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2014, Steve Lenz
 * @version 1.0.0
 * @package TYPO3 6.x
 * @subpackage extensionusagefinder
 */
class ContentRepository
{

    /**
     * Find tt_content entries by list_type
     * 
     * @param string $type
     * @return mixed
     */
    public function findByListType($type)
    {
        $select        = 'tt_content.uid contentUid, pages.uid AS pagesUid, '
            .'pages.title AS pageTitle , list_type, colPos, pages.deleted AS pagesDeleted, '
            .'tt_content.deleted AS contentDeleted';
        $table         = 'tt_content LEFT JOIN pages ON tt_content.pid = pages.uid';
        $where         = 'list_type LIKE "%'.str_replace('_', '', $type).'%"';
        $groupBy       = '';
        $orderBy       = '';
        $limit         = '';
        $uidIndexField = '';
        
        return $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select, $table, $where,
                $groupBy, $orderBy, $limit, $uidIndexField);
    }

}