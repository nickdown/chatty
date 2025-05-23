<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'parent_id'];

    public function children()
    {
        return $this->hasMany(Message::class, 'parent_id');
    }
}
