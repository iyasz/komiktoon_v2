<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
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
        return $this->hasMany(CategoryDetail::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function rejected()
    {
        return $this->hasMany(Rejected::class, 'content_id', 'id');
    }

    public function takedown() {
        return $this->hasMany(Takedown::class);
    }

}
