<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Book\Database\Factories\QuestionFactory;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): QuestionFactory
    // {
    //     // return QuestionFactory::new();
    // }
}
