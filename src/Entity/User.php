<?php


namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Class User
 * @package App\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="users", options={"comment":"Таблица пользователей"})
 * @UniqueEntity("username", message="Введенное имя пользователя уже используется.")
 */
class User implements UserInterface
{
    /**
     * @var int Идентификатор пользователя
     *
     * @ORM\Id
     * @ORM\Column(name="id_user", type="integer", unique=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string имя пользователя портала
     *
     * @ORM\Column(name="username", type="string", length=50, unique=true, options={"comment":"Имя пользователя"})

     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, options={"comment":"Пароль пользователя"})
     * @Assert\Regex(
     * pattern="/^[0-9A-Za-z-]+$/",
     * message="Пароль может содержать только латинские буквы A-z, цифры 0-9 и тире"
     * )
     * @Assert\Length(
     *     min=8,
     *     max=50,
     *     minMessage="Длина пароля не соответствует минимальным требованиям. Min: 8, Мах: 50",
     *     maxMessage="Длина пароля не соответствует минимальным требованиям. Min: 8, Мах: 50")
     */
    private $password;

    /**
     * @var string
     *
     *
     * @ORM\Column(name="salt", type="string", options={"comment":"Соль пароля"})
     */
    private $salt;
    /**
       * @ORM\Column(type="string", unique=true, nullable=true)
     */
    private $apiToken;

    /**
     * @return mixed
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * @param mixed $apiToken
     */
    public function setApiToken($apiToken): void
    {
        $this->apiToken = $apiToken;
    }

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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }


    /**
     * @return string[]
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * @return mixed
     */
    public function eraseCredentials()
    {
        return $this;
    }
}