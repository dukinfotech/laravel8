<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryFormRequest $categoryFormRequest)
    {
        $validatedData = $categoryFormRequest->validated();
        $this->categoryRepository->store($validatedData);

        return redirect('/admin/categories')->withSuccess('Tạo thể loại thành công.');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update($id, CategoryFormRequest $categoryFormRequest)
    {
        $validatedData = $categoryFormRequest->validated();
        $this->categoryRepository->update($id, $validatedData);

        return redirect('/admin/categories')->withSuccess('Cập nhật thể loại thành công.');
    }

    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);

        return redirect('/admin/categories')->withSuccess('Xóa thể loại thành công.');
    }
}
