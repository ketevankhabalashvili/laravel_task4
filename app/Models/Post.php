<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';


    protected $fillable = [
        'title',
        'description',
        'foreign_tag_ID'
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class,'foreign_tag_ID');
    }

}
