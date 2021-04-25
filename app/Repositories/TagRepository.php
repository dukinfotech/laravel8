<?php
namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\EloquentRepository;

class TagRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Tag::class;
    }
}