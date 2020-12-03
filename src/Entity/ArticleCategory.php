<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="articlecategory")
 * @ORM\HasLifecycleCallbacks()
 */
class ArticleCategory implements \JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", unique=true, options={"comment":"Идентификатор"})
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, options={"comment":"Название категории"})
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",  options={"comment":"Описание оронизации"})
     */
    private $description;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return  [
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=> $this->description,
        ];
    }
}