<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

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

        $post = $this->postRepository->getInstance();
        $post->fill($validatedData);

        auth()->user()->posts()->save($post);
        
        if (array_key_exists('tags', $validatedData)) {
            $tagIds = $validatedData['tags'];
            $post->tags()->attach($tagIds);
        }

        return redirect('/admin/posts')->withSuccess('Tạo bài viết thành công.');
    }

    public function edit($id)
    {
        $post = $this->postRepository->findWith($id, ['tags']);
        $this->authorize('view', $post);

        $tags = $this->tagRepository->getAll();

        return view('admin.posts.edit', compact('post', 'tags'));
    }

    public function update(PostFormRequest $postFormRequest)
    {
        // $this->authorize('update', Post::class);
        
        $validatedData = $postFormRequest->validated();
    }
}
