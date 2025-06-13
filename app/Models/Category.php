<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Permite asignación masiva de 'name'

    /**
     * Relación con los posts (una categoría puede tener varios posts)
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
