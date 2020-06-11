<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    private $author;
    private $title;
    private $media;
    private $description;
    private $category;
    protected $fillable = ['title', 'author', 'description', 'media', 'categorie'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setAuthor($attributes['author'] ?? "empty");
        $this->setDescription($attributes['html'] ?? "empty");
        $this->setMedia($attributes['media'] ?? "empty");
        $this->setTitle($attributes['title'] ?? "empty");
        $this->setCategory($attributes['categorie'] ?? "empty");
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param mixed $media
     */
    public function setMedia($media): void
    {
        $this->media = $media;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }


}
