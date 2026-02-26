<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('task_name', 'ASC')->paginate(10);
        return view('dataRef.category.index', compact('category'));
    }
}
