<?php

namespace Modules\Book\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Book\Database\Factories\UserFactory;

class User extends Model
{
    use HasFactory;

    // Define the fillable fields (mass assignment protection) | attributes that are mass assignable
    protected $fillable = ['name', 'email', 'password'];

    // protected static function newFactory(): UserFactory
    // {
    //     // return UserFactory::new();
    // }
}
