<?php

namespace Sle\TYPO3\Extbase\Repository;

use \TYPO3\CMS\Extbase\Persistence\Repository;
use \TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * BaseRepository
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2014, Steve Lenz
 * @version 1.0.0
 * @package TYPO3 6.x
 */
class BaseRepository extends Repository
{

    /**
     *
     * @return QueryObject
     */
    public function createQuery()
    {
        $query = parent::createQuery();
        // Verhindet, dass die Daten nur unterhalb der Seite mit der Standard-PID gesucht werden
        $query->getQuerySettings()->setRespectStoragePage(FALSE);

        return $query;
    }

    /**
     * Set the storagePids to respect
     *
     * @param array $storagePageIds
     */
    public function setStoragePageIds(array $storagePageIds)
    {
        $query = parent::createQuery();
        // Verhindet, dass die Daten nur unterhalb der Seite mit der Standard-PID gesucht werden
        $query->getQuerySettings()->setStoragePageIds($storagePageIds);

        return $query;
    }

    /**
     * Set order by
     *
     * @param string $property - Property name
     * @param sttring $order - Options: asc|desc
     */
    public function setOrderBy($property, $order = 'asc')
    {
        if ('desc' == $order) {
            $this->setDefaultOrderings(array(
                $property => QueryInterface::ORDER_DESCENDING,
            ));
        } else {
            $this->setDefaultOrderings(array(
                $property => QueryInterface::ORDER_ASCENDING,
            ));
        }
    }

}