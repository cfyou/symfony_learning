<?php


namespace App\Entity;


use App\Entity\Traits\CreatedAtTrait;
use App\Entity\Traits\UpdatedAtTrait;
use Doctrine\ORM\Mapping;

/**
 * @Mapping\Table(name="`user`")
 * @Mapping\Entity(repositoryClass="App\Repository\UserRepository")
 *
 * @package App\Entity
 */
class User
{
    use CreatedAtTrait, UpdatedAtTrait;

    /**
     * @var int
     *
     * @Mapping\Column(name="id", type="integer", unique=true)
     * @Mapping\Id()
     * @Mapping\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Mapping\Column(type="string", length=32, nullable=false)
     */
    private $login;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }
}