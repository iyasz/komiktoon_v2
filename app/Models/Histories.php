<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    use HasFactory, HasUuids;

    function getIncrementing()
    {
     return false;   
    }

    function getKeyType()
    {
        return 'string';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    protected $table = 'histories';
}
