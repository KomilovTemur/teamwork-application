<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id',
    ];
    public function projects()
    {
        return $this->belongsTo(Viewers::class);
    }
}