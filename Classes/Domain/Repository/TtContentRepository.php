<?php declare(strict_types=1);

namespace Sle\Extensionusagefinder\Domain\Repository;

use Sle\Extensionusagefinder\Domain\Model\FinderQuery;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * ContentRepository of tt_content
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2014, Steve Lenz
 * @version 1.0.0
 * @package TYPO3 6.x
 * @subpackage extensionusagefinder
 */
class TtContentRepository extends Repository
{

    /**
     * Find tt_content entries by list_type
     *
     * @param FinderQuery $finderQuery
     * @return array|QueryResultInterface
     * @throws InvalidQueryException
     */
    public function findByListType(FinderQuery $finderQuery)
    {
        $query = $this->createQuery();
        $query->like('listType', $finderQuery->getExtensionKey());

        if ($finderQuery->isDeleted()) {
            $query->logicalOr([
                $query->equals('deleted', false),
                $query->equals('deleted', true),
            ]);
        }

        return $query->execute();

//        $select        = 'tt_content.uid contentUid, pages.uid AS pagesUid, '
//            .'pages.title AS pageTitle , list_type, colPos, pages.deleted AS pagesDeleted, '
//            .'tt_content.deleted AS contentDeleted';
//        $table         = 'tt_content LEFT JOIN pages ON tt_content.pid = pages.uid';
//        $where         = 'list_type LIKE "%'.str_replace('_', '', $type).'%"';
//
//        $where .= (true == $deleted) ? ' AND tt_content.deleted IN (0,1)' : ' AND tt_content.deleted = 0' ;
//
//        $groupBy       = '';
//        $orderBy       = '';
//        $limit         = '';
//        $uidIndexField = '';
//
//        return $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select, $table, $where,
//                $groupBy, $orderBy, $limit, $uidIndexField);
    }

}
