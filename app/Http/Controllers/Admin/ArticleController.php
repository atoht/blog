<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Model\Category;

class ArticleController extends CommonController
{
    //get.admin/article 全部文章列表
    public function index() {
        echo "zzz";
    }

    //get.admin/article/create 添加文章列表
    public function create() {
        $data = (new Category)->tree();
        return view('admin.article.add', compact('data'));
    }
}
