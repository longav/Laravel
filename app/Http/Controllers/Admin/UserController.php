<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::query()
        ->where('id', '!=', auth()->id()) // Lấy ra tất cả user trừ bản thân
        ->paginate(10);
         return view('admin.user.list',compact('user'));
    }

    public function Ban($id){
        $user = User::query() -> find($id);

        $data['status'] = $user -> status == 1 ? 0 : 1;

        $user -> update( $data);
        return redirect() -> route('user.list-user') -> with('success','Thay đổi trạng thái thành công');
    }

    // public function Edit($id){
    //     $action = User::query() -> get();
    //     $user = User::find($id);

    //     return view('admin.user.edit',compact('user','action'));

    // }
}
