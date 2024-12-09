<?php

namespace Modules\Author\App\Models;

use Modules\Book\App\Models\Book;

use Modules\Book\App\Models\Section;
use Illuminate\Database\Eloquent\Model;

// use Modules\Book\Database\Factories\AuthorFactory;

class Author extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }
}