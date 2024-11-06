<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "idea_id",
        "content",
        "user_id",
        "",
        "",
        "",
        "",
    ];
    public function idea() {
        return $this->belongsTo(idea::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}

