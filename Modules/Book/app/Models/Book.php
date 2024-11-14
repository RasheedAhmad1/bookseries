<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Author\App\Models\Author;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use App\Models\UserPrivilege;

class Book extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public const statuses = [
        1 => 'Available',
        2 => 'Unavailable',
        3 => 'Purchased',
        4 => 'Rented',
        5 => 'Returned'

    ];

    protected $fillable = ['title', 'description', 'publisher', 'language', 'orderNo', 'status', 'price', 'online_amount', 'ship_amount', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function privileges()
    {
        return $this->morphMany(UserPrivilege::class, 'privilegeable');
    }
}
