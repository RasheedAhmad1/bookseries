<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPrivilege extends Model
{
    use HasFactory;

    protected $fillable = ['privilegeable_id', 'privilegeable_type'];

    // Polymorphic relationship to the associated model
    public function privilegeable()
    {
        return $this->morphTo();
    }

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
