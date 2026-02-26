<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryServices
{
    public function create(array $data): Category
    {
        return DB::transaction(function () use ($data) {
            $category = Category::withTrashed()->where('task_name', $data['name'])->first();

            // Jika ada dan soft delete maka restore
            if ($category && $category->trashed()) {
                $category->restore();
                return $category;
            }

            // Jika tidak ada buat baru
            return Category::create($data);
        });
    }
}