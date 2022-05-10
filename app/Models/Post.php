<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'cover',
        'comments_available',
        'created_at'
    ];

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getPostsByTag(string $query) : Collection
    {
        return $this->getPostsQueryBuilder()
            ->join('tags', 'tags.post_id', '=', 'posts.id')
            ->where('tags.tag', 'LIKE', "%{$query}%")
            ->get();
    }

    public function getPostsBySearchQuery(string $query) : Collection
    {
        return $this->getPostsQueryBuilder()
                    ->where('posts.title', 'LIKE', "%{$query}%")
                    ->get();
    }

    public function getPost(int $post_id) : Collection
    {
        return $this->getPostsQueryBuilder()
                    ->where('posts.id', $post_id)
                    ->first();
    }

    public function getPostsList() : Collection
    {
        return $this->getPostsQueryBuilder()
                    ->orderBy('posts.created_at', 'DESC')
                    ->get();
    }


    private function getPostsQueryBuilder()
    {
        return self::query()->select(['posts.id', 'posts.title', 'posts.cover', 'posts.description', 'posts.created_at', 'users.id as uid', 'users.name as uname', 'users.avatar'])
                            ->join('users', 'users.id', '=', 'posts.user_id')
                            ->withCount('comments')
                            ->with('tags', function ($query) {
                                $query->whereNotNull('tag');
                            });
    }
}
