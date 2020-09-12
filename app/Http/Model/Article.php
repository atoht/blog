<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'blog_article';
    protected $primaryKey = 'art_id';
    public $timestamps = false;
    protected $guarded=[];

    public function tree() {
        return $this->orderBy('art_id', 'desc')->paginate(2);
    }
}
