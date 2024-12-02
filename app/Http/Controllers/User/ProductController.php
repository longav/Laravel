<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index()
    {

        $list = DB::table('products')->latest('id')->limit(6)->get();
        return view('user.home', compact('list'));
    }

    public function detail($id)
    {

        $list = DB::table('products')->where('id', $id)->first();
        return view('user.detail', compact('list'));
    }

    public function list()
    {

        $products = Product::query() -> paginate(10);
        return view('user.list_product', compact('products'));
    }

    public function list_product($id = null)
    {

        $products = DB::table('products')->where('category_id', $id)->paginate(6);
        return view('user.list_product', compact('products'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $list = DB::table('products')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('id', $search)
            ->get();
        return view('user.home', compact('list'));
    }

    public function cart()
    {

        $cart = session()->get('cart', []);


        return view('user.cart', compact('cart'));
    }

    public function add_cart(Request $request, $id)
    {

        // ID của sản phẩm
        $quantity = $request->input('quantity', 1);   // Số lượng, mặc định là 1 nếu không có giá trị

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu (hoặc có thể lấy thông tin từ request)
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }

        // Kiểm tra nếu giỏ hàng đã tồn tại trong session
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // Nếu chưa có, thêm sản phẩm vào giỏ hàng
            $cart[$product->id] = [
                'id' => $product->id,
                'title' => $product->title,
                'quantity' => $quantity,
                'price' => $product->price,
                'image' => $product->img_thumbnail,  // Thêm ảnh sản phẩm nếu cần
            ];
        }

        $old_quantity = $product->quantity;

        $data['quantity'] = $old_quantity - $quantity;

        $product->update($data);

        // Cập nhật giỏ hàng vào session
        session()->put('cart', $cart);

        // Trả về một thông báo thành công và chuyển hướng về trang giỏ hàng
        return redirect()->route('cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function Detroy_PrCart($id)
    {
        $cart = session()->get('cart', []);
        $product = Product::find($id);
        if (isset($cart[$id])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$id]);

            // Cập nhật lại giỏ hàng vào session
            session()->put('cart', $cart);

            // Thông báo xóa thành công
            return redirect()->route('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
        }
    }

    public function Oder(Request $request)
    {
        $cart = session()->get('cart');
        if (session()->has('oder')) {
            session()->forget('oder');
        }
        // Kiểm tra xem người dùng có chọn sản phẩm để thanh toán không
        if (empty($request->input('products'))) {
            return back()->with('error', 'Bạn chưa chọn sản phẩm để thanh toán!');
        }


        // Lấy danh sách các sản phẩm đã chọn (có giá trị 'true' từ checkbox)
        $orderedProducts = [];
        foreach ($request->input('products') as $productId => $value) {
            if (isset($cart[$productId])) {
                $orderedProducts[] = $cart[$productId];  // Lưu thông tin các sản phẩm đã chọn
            }
        }
        session()->push('oder', $orderedProducts);
        return redirect()->route('oder_view');
    }


    public function Oder_view()
    {

        $oder = session('oder');

        return view('user.oder', compact('oder'));
    }
    public function Add_oder()
    {

        $oder = session('oder');

        
if ($oder && is_array($oder)) {
    // Tạo mã order tự động
    $orderId = 'ORD-' . strtoupper(Str::random(8)); // Ví dụ: ORD-A1B2C3D4
    $cart = session('cart', []);
    foreach ($oder as $products) {
        foreach ($products as $product) {
            $data = [
                'user_email' => Auth::user()-> email,
                'oder_id' => $orderId, // Sử dụng mã order tự tạo
                'product' => $product['id'],
                'quantity' => $product['quantity'],
             
            ];
            if (isset($cart[$product['id']])) {
                // Xóa sản phẩm theo ID
                unset($cart[$product['id']]);
        
                // Cập nhật lại session
                session(['cart' => $cart]);
        
                
            }

      
            // Lưu vào bảng `orders`
            DB::table('oder')->insert($data);
            

        }
    }
    // Xóa session sau khi lưu
    session()->forget('oder');
    return back()->with('success', "Đơn hàng $orderId đã được tạo thành công!");
} else {
    return back()->withErrors('Không có sản phẩm nào trong đơn hàng.');
}
       
    }
    
}
