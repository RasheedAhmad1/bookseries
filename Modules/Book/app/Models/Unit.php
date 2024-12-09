<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserPrivilege;
use Modules\Book\App\Models\Section;
use Modules\Book\App\Models\Book;
use Modules\Author\App\Models\Author;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

// use Modules\Book\Database\Factories\UnitFactory;

class Unit extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;

    // The attributes that are mass assignable
    protected $fillable = ['title', 'slug', 'description', 'mcqs', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function privileges()
    {
        return $this->morphMany(UserPrivilege::class, 'privilegeable');
    }

    // protected static function newFactory(): UnitFactory
    // {
    //     // return UnitFactory::new();
    // }
}
