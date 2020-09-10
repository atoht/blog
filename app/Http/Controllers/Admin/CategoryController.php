<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Category;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

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
    //修改排序
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

    //get.admin/category/create //添加分类
    public function create() {
        $categorys = Category::where('cate_pid',0)->get();
        return view('admin/category/add')->with('data', $categorys);
    }

    //post.admin/category //提交分类
    public function store() {
        $input = Request()->except('_token');
        // $input = Request()->all();
        $rules = [
            'cate_name'=>'required'
        ];
        $message = [
            'password.required'=>'分类不能为空'
        ];
        $validator = Validator::make($input, $rules, $message);

        if(!$validator->fails()) {
            $re = Category::create($input);
            if($re) {
                return redirect('admin/category');
            }else {
                return back()->with('errors', '发生未知错误');
            }
        }else {
            return back()->withErrors($validator);
        }
    }

    //get.admin/category/{caategory}/edit //编辑分类
    public function edit($cate_id) {
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid', 0)->get();
        return view('admin.category.edit', compact('field', 'data'));
    }

    //put.admin/category/{caategory} //更新分类
    public function update($cate_id) {
        $input = Request::except('_token', '_method');
        $re = Category::where('cate_id', $cate_id)->update($input);
        if($re) {
            return redirect('admin/category');
        }else {
            return back()->with('errors', '发生未知错误');
        }
    }

    //delete.admin/category/{caategory} //删除单个分类
    public function destroy($cate_id) {
        $re = Category::where('cate_id', $cate_id)->delete();
        Category::where('cate_pid', $cate_id)->update(['cate_pid'=>0]);
        if($re) {
            $data = [
                'status'=>0,
                'msg'=>'分类删除成功'
            ];
        }else {
            $data = [
                'status'=>1,
                'msg'=>'分类删除失败'
            ];
        }
        return $data;
    }

    //get.admin/category/{category}
    public function show() {

    }

}
