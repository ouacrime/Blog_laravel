<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillibale = [
        'title','slug','description','image_path','user_id'
    ];


    public function user()//propertie
    {
        return $this->belongsTo(User::class);
    }


}
