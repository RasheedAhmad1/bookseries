<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserPrivilege;
use Modules\Book\App\Models\Book;
use Modules\Book\App\Models\Unit;
use Modules\Author\App\Models\Author;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

// use Modules\Book\Database\Factories\SectionFactory;

class Section extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;

    // The attributes that are mass assignable
    protected $fillable = ['title', 'description', 'language', 'book_id', 'mcqs'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function privileges()
    {
        return $this->morphMany(UserPrivilege::class, 'privilegeable');
    }

    // protected static function newFactory(): SectionFactory
    // {
    //     // return SectionFactory::new();
    // }
}
