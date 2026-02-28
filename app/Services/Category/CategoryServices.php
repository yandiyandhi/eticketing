<?php

namespace App\Services\Category;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use DomainException;

class CategoryServices
{
    public function create(array $data): Category
    {                
        return DB::transaction(function () use ($data) {
            $category = Category::withTrashed()->where('task_name', $data['task_name'])->first();

            // Jika ada dan soft delete maka restore
            if ($category && $category->trashed()) {
                $category->restore();
                return $category;
            }
            
            // Jika tidak ada buat baru
            return Category::create($data);
        });
    }

    public function update(Category $category, array $data): bool
    {
       return DB::transaction(function() use ($category, $data) {
                $category->update($data);
        return $category->save();
        });
    }

    public function delete(Category $category): void
    {
        DB::transaction(function() use ($category){
            if ($category->ticketing()->exists()) {
                throw new DomainException(
                    'Kategori tidak bisa dihapus karena masih digunakan.'
                );
            }
        $category->delete();
        });
    }
}