<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TagRepository;
use Exception;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $customAttributes = [
            'name' => 'Tên thẻ'
        ];

        $validatedData = $request->validate([
            'name' => 'required|unique:tags|max:20'
        ], [], $customAttributes);
        $this->tagRepository->store($validatedData);

        return redirect('/admin/tags')->withSuccess('Tạo thẻ tag thành công.');
    }

    public function destroy($id)
    {
        $this->tagRepository->destroy($id);

        return redirect('/admin/tags')->withSuccess('Xóa thẻ tag thành công.');;
    }
}
