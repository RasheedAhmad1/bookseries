<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\UserPrivilege;
use Modules\Book\App\Models\Book;
use Modules\Book\App\Models\Unit;

class User extends Authenticatable

{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = ['name', 'email', 'phone', 'cnic', 'gender', 'country', 'province', 'district', 'professional', 'address', 'password'];

    // The attributes that should be hidden for serialization
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function privileges()
    {
        return $this->morphMany(UserPrivilege::class, 'privilegeable');
    }

    public function bookPrivileges()
    {
        return $this->privileges()->where('privilegeable_type', Book::class);
    }

    public function sectionPrivileges()
    {
        return $this->privileges()->where('privilegeable_type', Section::class);
    }

    public function unitPrivileges()
    {
        return $this->privileges()->where('privilegeable_type', Unit::class);
    }


    public function hasPrivilegeFor($model, $privilegeName = 'access')
    {
        return $this->privileges()
            ->where('privilegeable_id', $model->id)
            ->where('privilegeable_type', get_class($model))
            ->exists();
    }

    public const gender = [
        0 => 'Male',
        1 => 'Female',
        2 => 'Other'
    ];




    // Get the attributes that should be cast
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
