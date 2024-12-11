<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Question extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['type', 'unit_id', 'answer', 'marks', 'description', 'explanation',];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    // protected static function newFactory(): QuestionFactory
    // {
    //     // return QuestionFactory::new();
    // }
}
