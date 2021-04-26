<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostRepository $postRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll(['tags', 'user']);

        return view('admin.posts.index', compact('posts'));
    }
    

    public function create()
    {
        $tags = $this->tagRepository->getAll();

        return view('admin.posts.create', compact('tags'));
    }

    public function store(PostFormRequest $postFormRequest)
    {
        $validatedData = $postFormRequest->validated();
        $tagIds = $validatedData['tags'];

        $post = $this->postRepository->getInstance();
        $post->fill($validatedData);

        auth()->user()->posts()->save($post);
        $post->tags()->attach($tagIds);

        return redirect('/admin/posts')->withSuccess('Tạo bài viết thành công.');
    }
}
