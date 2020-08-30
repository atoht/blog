<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Model\Category;

class CategoryController extends CommonController
{
    //get.admin/category //全部分类列表
    public function index() {
        // phpinfo();

        $categorys = (new Category)->tree();
        // $data = $this->getTree($categorys, 'cate_name', 'cate_id', 'cate_pid', 0);
        // dd($data);
        return view('admin.category.index')->with('data', $categorys);
    }

    public function changeorder() {
        $input = Request()->all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        if($re) {
            $data = [
                'status' => 0,
                'msg' => '分类排序更新成功'
            ];
        }else {
                $data = [
                    'status' => 1,
                    'msg' => '分类排序更新失败'
                ];

        }
        return $data;
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
