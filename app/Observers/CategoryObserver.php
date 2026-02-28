<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class CategoryObserver
{
    public function created(Category $category): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Category',
            'model_id'    => $category->id,
            'new_data'    => $category->toArray(),
            'description' => "Kategori baru dibuat: {$category->task_name}",
        ]);
    }

    public function update(Category $category): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'udpate',
            'model'       => 'Category',
            'model_id'    => $category->id,
            'new_data'    => $category->toArray(),
            'description' => "Kategori baru dibuat: {$category->task_name}",
        ]);
    }

    public function saving(Category $category): void
    {
        $category->task_name = Str::title(
            strtolower($category->task_name)
        );
    }
}
