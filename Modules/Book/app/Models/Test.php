<?php

namespace Modules\Book\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Book\Database\Factories\TestFactory;

class Test extends Model
{
    use HasFactory;

    // Constant for showing test status -> enabled and disabled
    public const statuses = [
        1 => 'Enabled',
        0 => 'Diabled'

    ];

    // Constant for showing test payemnt -> paid and unpaid
    public const payment = [
        1 => 'Paid',
        0 => 'Unpaid'

    ];

    // The attributes that are mass assignable
    protected $fillable = ['title', 'slug', 'description', 'language', 'enabled', 'ispaid', 'price', 'date', 'announce_date', 'last_date', 'deleted_at', 'individual_result', 'overall_result', 'province_result', 'zone_result', 'district_result', 'instant_result', 'test_duration', 'is_finished', 'is_hidden'];

    // protected static function newFactory(): TestFactory
    // {
    //     // return TestFactory::new();
    // }
}
