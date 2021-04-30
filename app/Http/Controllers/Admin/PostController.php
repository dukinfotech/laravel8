<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Repositories\CategoryRepository;

class PostController extends Controller
{
    public function __construct(PostRepository $postRepository, TagRepository $tagRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll(['tags', 'user']);

        return view('admin.posts.index', compact('posts'));
    }
    

    public function create()
    {
        $tags = $this->tagRepository->getAll();
        $categories = $this->categoryRepository->getAll();

        return view('admin.posts.create', compact('tags', 'categories'));
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

        $categoryIds = $validatedData['categories'];
        $post->categories()->attach($categoryIds);

        return redirect('/admin/posts')->withSuccess('Tạo bài viết thành công.');
    }

    public function edit($id)
    {
        $post = $this->postRepository->findWith($id, ['tags', 'categories']);
        $this->authorize('view', $post);

        $tags = $this->tagRepository->getAll();
        $categories = $this->categoryRepository->getAll();

        return view('admin.posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update($id, PostFormRequest $postFormRequest)
    {
        $post = $this->postRepository->find($id);
        $this->authorize('update', $post);
        
        $validatedData = $postFormRequest->validated();
        $post->fill($validatedData);

        $post->save();
        
        if (array_key_exists('tags', $validatedData)) {
            $tagIds = $validatedData['tags'];
            $post->tags()->sync($tagIds);
        }

        $categoryIds = $validatedData['categories'];
        $post->categories()->attach($categoryIds);

        return redirect('/admin/posts')->withSuccess('Cập nhật bài viết thành công.');
    }

    public function updateStatus($id)
    {
        if (! auth()->user()->hasRole('Super Admin')) {
            abort(403);
        }
        $post = $this->postRepository->find($id);
        $post->isPublic = !$post->isPublic;
        $post->save();
    }

    public function destroy($id)
    {
        $post = $this->postRepository->find($id);
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/admin/posts')->withSuccess('Xóa bài viết thành công.');;
    }
}
