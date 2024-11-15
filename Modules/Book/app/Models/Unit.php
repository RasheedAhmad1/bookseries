<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserPrivilege;
use Modules\Book\App\Models\Section;

// use Modules\Book\Database\Factories\UnitFactory;

class Unit extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [];

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
