<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    private $name;
    protected $fillable = ['name'];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setName($attributes['name'] ?? "empty");
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}
