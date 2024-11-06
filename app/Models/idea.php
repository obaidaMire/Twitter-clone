<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    use HasFactory;

    protected $with = ['user:id,name,image','comments.user:id,name,image'];

    protected $withCount = ['likes'];
    protected $fillable = [
        "content",
        "user_id",
    ];


    public function comments() {
        return $this->hasMany(comment::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'idea_like','idea_id','user_id')->withTimestamps();
    }

    public function scopeSearch(Builder $query,$search = '') {
        $query->where('content', 'like', '%' . $search . '%');
    }
}
