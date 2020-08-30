<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Model\Category;

class CategoryController extends CommonController
{
    //get.admin/category //全部分类列表
    public function index() {
        phpinfo();
        $categorys = Category::all();
        $data = $this->getTree($categorys);
        // dd($data);
        // return view('admin.category.index')->with('data', $data);
    }

    public function getTree($data) {
        $arr = array();
        foreach($data as $key=>$val) {
            if($val->cate_pid = 0) {
                $arr[] = $data[$key];
                foreach($data as $key_=>$val_) {
                    if($val_->cate_pid == $val->vate_id) {
                        $arr[] = $data[$key_];
                    }
                }
            }
        }
        return $arr;
    }

    //post.admin/category
    public function store() {

    }

    //get.admin/category/create //
    public function create() {

    }
    //get.admin/category/{category}
    public function show() {

    }
    //delete.admin/category/{caategory} //删除单个分类
    public function destroy() {

    }
    //put.admin/category/{caategory} //更新分类
    public function update() {

    }
    //get.admin/category/{caategory}/edit //编辑分类
    public function edit() {

    }
}
