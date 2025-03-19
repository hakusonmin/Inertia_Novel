<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    /** @use HasFactory<\Database\Factories\NovelFactory> */
    use HasFactory;

    protected $fillable = ['chapter_id', 'content', 'title'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
