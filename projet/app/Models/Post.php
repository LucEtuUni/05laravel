<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [ "title", "picture", "content" ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function deleteWithComments()
{
    $this->comments()->delete(); // Supprime tous les commentaires liés au post
    $this->delete(); // Supprime le post lui-même
}
}
