<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Book\Database\Factories\BookFactory;
// use Modules\Book\App\Models\Author;

class Book extends Model implements HasMedia
{
    // Optionally specify the table name, if it differs from the pluralized form of the model name
    // protected $table = 'users';

    use HasFactory;

    public const statuses = [
        1 => 'Available',
        2 => 'Unavailable',
        3 => 'Purchased',
        4 => 'Rented',
        5 => 'Returned'

    ];

    // Define the fillable fields (mass assignment protection) | attributes that are mass assignable
    protected $fillable = ['title', 'description', 'publisher', 'language', 'orderNo', 'status', 'price', 'online_amount', 'ship_amount', 'author_id'];

    // Allow all fields except 'is_admin' and 'id' to be mass assigned
    // protected $guarded = ['is_admin', 'id'];

    // protected static function newFactory(): BookFactory
    // {
    //     // return BookFactory::new();
    // }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
