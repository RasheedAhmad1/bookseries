<?php

namespace Modules\Comment\App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public const statuses = [
        1 => 'Enable',
        0 => 'Disable'
    ];

    protected $fillable = ['name', 'comment', 'user_id', 'status', 'question_id'];
}
