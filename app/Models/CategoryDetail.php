<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
    use HasFactory;

    protected $table = 'category_details';

    public function genre()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function contents()
    {
        return $this->belongsTo(Content::class, 'content_id', 'id');
    }

    public function content()
    {
        return $this->hasMany(Content::class, 'content_id', 'id');
    }
}
