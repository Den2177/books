<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function scopeFilter($query)
    {
        if (request('authors')) {
            $query->whereIn('author_id', request('authors'));
        }

        if (request('genres')) {
            $query->whereHas('genres', function($q) {
                $q->whereIn('genre_id', request('genres'));
            });
        }

        return $query;
    }
}
