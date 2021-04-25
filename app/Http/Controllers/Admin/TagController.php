<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagFormRequest;
use App\Repositories\TagRepository;

class TagController extends Controller
{
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $tags = $this->tagRepository->getAll();

        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagFormRequest $tagFormRequest)
    {
        $validatedData = $tagFormRequest->validated();
        $this->tagRepository->store($validatedData);

        return redirect('/admin/tags')->withSuccess('Tạo thẻ tag thành công.');
    }

    public function edit($id)
    {
        $tag = $this->tagRepository->find($id);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update($id, TagFormRequest $tagFormRequest)
    {
        $validatedData = $tagFormRequest->validated();
        $this->tagRepository->update($id, $validatedData);

        return redirect('/admin/tags')->withSuccess('Cập nhật thẻ tag thành công.');
    }

    public function destroy($id)
    {
        $this->tagRepository->destroy($id);

        return redirect('/admin/tags')->withSuccess('Xóa thẻ tag thành công.');;
    }
}
