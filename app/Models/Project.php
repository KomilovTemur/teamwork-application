<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function viewer()
    {
        return $this->hasMany(Viewers::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}