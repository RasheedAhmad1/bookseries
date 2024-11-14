<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    // Privileges
    // public function privileges()
    // {
    //     return $this->hasMany(UserPrivilege::class);
    // }
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

    // Assign privilege to a specific book, section or unit
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

    // The attributes that are mass assignable
    protected $fillable = ['name', 'email', 'phone', 'cnic', 'gender', 'country', 'province', 'district', 'professional', 'address', 'password'];

    // The attributes that should be hidden for serialization
    protected $hidden = [
        'password',
        'remember_token',
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
