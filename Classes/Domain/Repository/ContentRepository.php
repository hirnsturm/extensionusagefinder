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
        $fields        = '*';
        $table         = 'tt_content LEFT JOIN pages ON tt_content.pid = pages.uid';
        $where         = 'list_type LIKE "%'.$type.'%"';
        $groupBy       = '';
        $orderBy       = '';
        $limit         = '';
        $uidIndexField = '';

        return $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($fields, $table, $where,
                $groupBy, $orderBy, $limit, $uidIndexField);
    }

}