<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
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

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function content() {
        return $this->belongsTo(Content::class);
    }
    
}
