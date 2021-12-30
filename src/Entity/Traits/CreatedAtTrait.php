<?php


namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as Mapping;
use DateTime;

/**
 * Trait CreatedAtTrait
 * @package App\Entity\Traits
 *
 * @Mapping\HasLifecycleCallbacks()
 */
trait CreatedAtTrait
{
    /**
     * @Mapping\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @Mapping\PrePersist()
     */
    public function setCreatedAt(): void
    {
        $this->createdAt = new DateTime();
    }
}