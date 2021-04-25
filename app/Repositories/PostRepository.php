<?php
namespace App\Repositories;

use App\Models\Post;
use App\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Post::class;
    }
}