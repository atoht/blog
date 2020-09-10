<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'blog_category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded=[];

    public function tree() {
        $categorys = $this->orderBy('cate_order', 'asc')->get();
        return $this->getTree($categorys, 'cate_name', 'cate_id', 'cate_pid', 0);
    }

    public function getTree($data, $field_name, $field_id='id', $field_pid='pid', $pid=0) {
        $arr = array();
        foreach($data as $key=>$val) {
            if($val->$field_pid == $pid) {
                $data[$key]['_'.$field_name] = $data[$key][$field_name];
                $arr[] = $data[$key];
                foreach($data as $key_=>$val_) {
                    if($val_->$field_pid == $val->$field_id) {
                        $data[$key_]['_'.$field_name] = ' ⊢ '.$data[$key_][$field_name];
                        $arr[] = $data[$key_];
                    }
                }
            }
        }
        return $arr;
    }
}
