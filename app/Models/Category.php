<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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

    public function genreDetail()
    {
        return $this->hasMany(CategoryDetail::class, 'category_id', 'id');
    }

}
