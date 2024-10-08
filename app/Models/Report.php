<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
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

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
