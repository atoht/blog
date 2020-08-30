<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function getUser($name) {
        return $this->where('name', '=', $name)->get();
    }

    public function updatePassword($name, $password) {
        $this->where("name", $name )->update(['password'=>$password]);
    }
}
