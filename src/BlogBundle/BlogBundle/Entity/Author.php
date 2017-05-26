<?php
// src/BlogBundle/BlogBundle/Entity/Author.php
namespace BlogBundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Author
{
    /**
     * @ORM\Column(type = "string")
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}