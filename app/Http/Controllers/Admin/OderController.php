<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OderController extends Controller
{
        public function index(){
            $oder = DB::table('oder') ->  paginate(10);
           
          
            return view('admin.oder.list',compact('oder'));

        }
}
