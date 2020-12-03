<?php


namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="article", options={"comment":"Статьи"})
 * @ORM\HasLifecycleCallbacks()
 */
class Article
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
     * @var string URL изображения
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true, options={"comment":"Ссылка на изображение"})
     */
    private $image;

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->short_description;
    }

    /**
     * @param string $short_description
     */
    public function setShortDescription(string $short_description): void
    {
        $this->short_description = $short_description;
    }




    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="text",   options={"comment":"Описание коротное"})
     * @Assert\NotBlank
     */
    private $short_description;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",   options={"comment":"Описание"})
     * @Assert\NotBlank
     */
    private $description;



    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, options={"comment":"Название оронизации"})
     * @Assert\NotBlank()
     */
    private $name;


    /**
     * @var ArticleCategory
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ArticleCategory")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;


    public function getCategory(): ?ArticleCategory
    {
        return $this->category;
    }

    public function setCategory(?ArticleCategory $category): self
    {
        $this->category = $category;

        return $this;
    }


    /**
     * @var DateTime
     * @ORM\Column(name="data_create", type="datetime", nullable=false, options={"comment":"Дата создания"})
     */
    private $data_create;

    public function __construct()
    {
        $this->data_create = new \DateTime('now');
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
     * @return DateTime
     */
    public function getDataCreate(): DateTime
    {
        return $this->data_create;
    }

    /**
     * @param DateTime $data_create
     */
    public function setDataCreate(DateTime $data_create): void
    {
        $this->data_create = $data_create;
    }



}