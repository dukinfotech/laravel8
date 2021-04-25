<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();

        return view('admin.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->postRepository->find($id);

        return view('home.post', compact('post'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $post = $this->postRepository->create($data);

        return view('home.post', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $post = $this->postRepository->update($id, $data);

        return view('home.post', compact('post'));
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return view('home.post');
    }
}
