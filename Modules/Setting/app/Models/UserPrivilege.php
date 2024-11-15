<?php

namespace Modules\Setting\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Setting\Database\Factories\UserPrivilegeFactory;

class UserPrivilege extends Model
{
    use HasFactory;

    protected $table = 'user_privileges';

    // The attributes that are mass assignable
    protected $fillable = ['user_id', 'privilegeable_type', 'privilegeable_id'];

    public function privilegeable()
    {
        return $this->morphTo();
    }

    // protected static function newFactory(): UserPrivilegeFactory
    // {
    //     // return UserPrivilegeFactory::new();
    // }
}
