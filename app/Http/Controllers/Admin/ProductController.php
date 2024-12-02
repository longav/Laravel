<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $list = Product::query()->latest('id')->paginate(10);

        return view('admin.product.list', compact('list'));
    }

    public function Create(Request $request)
    {
        $category = Category::query() -> get();

        return  view('admin.product.create', compact('category'));
    }

    public function Store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|unique:products,title',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
         // Nếu có file, kiểm tra loại file và dung lượng
        ]);
    
        // Loại bỏ trường `img_thumbnail` khỏi dữ liệu nếu không cần lưu vào cơ sở dữ liệu
        $data = $request->except('img_thumbnail');

        if ($request->hasFile('img_thumbnail')) {

            $data['img_thumbnail'] = $request->file('img_thumbnail')->store('images','public');
        }
       
        Product::create($data);

        return redirect('admin/products/list-product') -> with('success','Thêm mới thành công');
    }
    public function Delete($id){
        Product::query() -> find($id) -> delete();
        return redirect() -> route('list-product') -> with('success','Xoá thành công ');
    }

    public function Edit($id){
        $category = Category::query() -> get();
        $product = Product::query() -> find($id);
        return  view('admin.product.edit', compact('category','product'));
    }

    public function Update(Request $request, $id)
        {   
            $update = $request->validate([
                'title' => 'required|string|max:255|unique:products,title,' . $id,
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:0',
                'category_id' => 'required|exists:categories,id',
             // Nếu có file, kiểm tra loại file và dung lượng
            ]);
        
           $update = $request -> except('img_thumbnail');

            $data = Product::query() -> find($id);

            if($request -> hasFile('img_thumbnail')){
                $update['img_thumbnail'] = $request -> file('img_thumbnail') -> store('images','public');

            }

            $data -> update($update);

            return redirect() -> route('list-product') -> with('success','Sửa thành công ');
}
}
