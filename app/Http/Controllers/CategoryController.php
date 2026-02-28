<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryServices;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('task_name', 'ASC')->paginate(10);
        return view('dataRef.category.index', compact('category'));
    }

    public function store(CreateCategoryRequest $request, CategoryServices $categoryServices)
    {                  
        $categoryServices->create($request->validated());

        return redirect()->back()->with('success', 'Kategori berhasil disimpan.');
    }

    public function update(CreateCategoryRequest $request, Category $category, CategoryServices $categoryServices)
    {
        $categoryServices->update($category, $request->validated());

        return redirect()->back()->with("success", "Kategori berhasil disimpan.");
    }

    public function destroy(Category $category, CategoryServices $categoryServices)
    {
        try {
            $categoryServices->delete($category);
            return redirect()
                ->back()
                ->with('success', 'Kategori berhasil dihapus');
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
