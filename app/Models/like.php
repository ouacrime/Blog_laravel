<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class like extends Model
{
    use HasFactory;
    protected $fillibale = [
        'user_id','like','post_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);

    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
