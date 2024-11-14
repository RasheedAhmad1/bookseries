<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Author\App\Models\Author;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use App\Models\UserPrivilege;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Book extends Model implements HasMedia
{
    use InteractsWithMedia, HasUploader;

    public const statuses = [
        1 => 'Draft Book',
        2 => 'Show Book',


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
