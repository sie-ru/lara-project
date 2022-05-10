<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'tag'
    ];

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function getAllTags() : Collection
    {
        return Tag::query()
                    ->select('tag')
                    ->distinct()
                    ->whereNotNull('tag')
                    ->get();
    }
}
