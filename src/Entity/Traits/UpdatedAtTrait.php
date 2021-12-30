<?php


namespace App\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping;

/**
 * Class UpdatedAtTrait
 * @package App\Entity\Traits
 *
 * @Mapping\HasLifecycleCallbacks()
 */
trait UpdatedAtTrait
{
    /**
     * @var DateTime
     *
     * @Mapping\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @Mapping\PreUpdate()
     * @Mapping\PrePersist()
     */
    public function updateUpdatedAt(): void
    {
        $this->updatedAt = new DateTime();
    }
}