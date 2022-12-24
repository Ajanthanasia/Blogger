<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class PostModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function likes()
    {
        return $this->hasMany(Like::class,'post_id','id');
    }
}
