<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  
    use HasFactory;
    protected $table='news';
    protected $fillable=['name','slug','description','yt_iframe','meta_title','meta_description','meta_keyword',
    'status','created_by'];
}
