<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use Illuminate\Http\Request;

use App\Http\Model\Category;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //get.admin/article 全部文章列表
    public function index() {
        // Article::find()
        $data = (new Article)->tree();
        return view('admin.article.index', compact('data'));
    }

    //get.admin/article/create 添加文章列表
    public function create() {
        $data = (new Category)->tree();
        return view('admin.article.add', compact('data'));
    }

    //post.admin/article 添加文章提交
    public function store() {
        $input = Request()->except('_token');
        $rules = [
            'art_title'=>'required',
            'art_content'=>'required'
        ];
        $message = [
            'art_title.required'=>'文章标题不能为空',
            'art_content.required'=>'文章内容不能为空'
        ];
        $validator = Validator::make($input, $rules, $message);

        if(!$validator->fails()) {
            $input['art_time'] = time();
            $re = Article::create($input);
            if($re) {
                return redirect('admin/article');
            }else {
                return back()->with('errors', '发生未知错误');
            }
        }else {
            return back()->withErrors($validator);
        }
    }

    //get.admin/article/{article}/edit //编辑文章
    public function edit($art_id) {
        $field = Article::find($art_id);
        $data = (new  Category)->tree();
        return view('admin.article.edit', compact('field', 'data'));
    }
}
