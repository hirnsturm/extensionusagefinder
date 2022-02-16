<?php declare(strict_types=1);

namespace Sle\Extensionusagefinder\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Model of tt_content
 */
class TtContent extends AbstractEntity
{

    /**
     * uid
     *
     * @var int
     */
    protected $uid = 0;

    /**
     * pid
     *
     * @var int
     */
    protected $pid = 0;

    /**
     * list_type
     *
     * @var string
     */
    protected $listType = '';

    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * Gets the uid
     *
     * @return int $uid
     */
    public function getUid(): int
    {
        return $this->uid;
    }

    /**
     * Gets the pid
     *
     * @return int $pid
     */
    public function getPid(): int
    {
        return $this->pid;
    }

    /**
     * @return string
     */
    public function getListType(): string
    {
        return $this->listType;
    }

    /**
     * @param string $listType
     */
    public function setListType(string $listType): void
    {
        $this->listType = $listType;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

}
