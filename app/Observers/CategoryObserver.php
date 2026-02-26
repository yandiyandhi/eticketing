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
            'model'       => 'Department',
            'model_id'    => $category->id,
            'new_data'    => $category->toArray(),
            'description' => "Departemen baru dibuat: {$category->name}",
        ]);
    }

    public function saving(Category $category): void
    {
        $category->name = Str::title(
            strtolower($category->name)
        );
    }
}
