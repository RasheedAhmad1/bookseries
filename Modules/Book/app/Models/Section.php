<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserPrivilege;
use Modules\Book\App\Models\Book;
use Modules\Book\App\Models\Unit;

// use Modules\Book\Database\Factories\SectionFactory;

class Section extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [];

    public function book()
    {
        return $this->belongsTo(Book::class);
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
