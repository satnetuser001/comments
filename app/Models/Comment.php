<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\File;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'user_name',
        'home_page',
        'text',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['children'];

    /**
     * Get the author of this comment.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get files of this comment.
     */
    public function files(){
        return $this->hasMany(File::class);
    }

    /**
     * Get parent of this comment
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * Get children of this comment
     */
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
