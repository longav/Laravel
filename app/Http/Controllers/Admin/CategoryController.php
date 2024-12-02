<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        public function index(){
            $categories = Category::query()-> paginate(10);
            return view('admin.category.list',compact('categories'));
        }
        public function Create(){
            return view('admin.category.add');
        }
        public function Edit($id){
            $category = Category::query() -> find($id);
            return view('admin.category.edit',compact('category'));
        }
        public function Update(Request $request, $id){
            $data = $request -> validate([
                'name' => 'required|min:6|unique:categories,name,'. $id
            ]);
            $category = Category::query() -> find($id);
          $category -> update($data);
          return redirect() -> route('category.list-category') -> with('success','Cập nhập danh mục thành công');
        }
        public function Store(Request $request){
            $data = $request -> validate([
                'name' => 'required|min:6|unique:categories,name,' , 
            ]);
            Category::create($data);
            return redirect() -> route('category.list-category') -> with('success','Thêm mới danh mục thành công');
        }
}
