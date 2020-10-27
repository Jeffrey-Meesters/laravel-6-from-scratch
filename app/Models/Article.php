<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // return 'excerpt' would make laravel search on excerpt instead of id: Article::where('excerpt', $article)->first();

    // Specify which values can be created so we don't get the mass assignment error
    protected $fillable = ['title', 'excerpt', 'body'];
    // Instead guarding is an uption.. but imho that does not seem save enough
    // protected $guarded = [];
}
