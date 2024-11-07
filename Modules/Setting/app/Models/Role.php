<?php

namespace Modules\Setting\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = ['name'];

}
