<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters)
    {
      $query->when($filters['search'] ?? false, function($query, $search) {
        $query
        ->where('title', 'like', '%' . $search . '%')
        ->orWhere('body', 'like', '%' . $search . '%');
      });

        $query->when($filters['author'] ?? false, function($query, $search) {
            $query
                ->whereHas('author', function ($query) {
                    $query->where('username', $author);
                });
        });

    }

    public function author()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
