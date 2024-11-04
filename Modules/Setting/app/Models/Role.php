<?php

namespace Modules\Setting\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Role;

class Role extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [];

    // Roles
    Role::create(['name' => 'admin']);
    Role::create(['name' => 'user']);

}
