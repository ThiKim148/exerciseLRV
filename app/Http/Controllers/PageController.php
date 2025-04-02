<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Comment;
use App\Models\ProductType;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\BillDetail;
use App\Models\User;
use App\Models\Cart;
// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function getIndex() {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(4);
        $promotion_product = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu', compact('slide','new_product','promotion_product'));
    }

    public function getDetail(Request $request){
        $sanpham = Product::where('id', $request->id)->first();
        $splienquan = Product::where('id', '<>', $sanpham->id, 'and', 'id_type', '=', $sanpham->id_type)->paginate(3);
        $comments = Comment::where('id', $sanpham->id)->get();
        return view('page.chitiet_sanpham', compact('sanpham', 'splienquan', 'comments'));
    }
    public function getLoaiSp($type) {
        $sp_theoloai = Product::where('id_type', $type)->get();									
        $type_product = ProductType::all();									
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);	

        return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));									
    }
    //Cake_Shop Add product
    public function postAdminAdd(Request $request)							
    {							
        $product = new Product();							
        if ($request->hasFile('inputImage')) {							
            $file = $request->file('inputImage');							
            $fileName = $file->getClientOriginalName('inputImage');							
            $file->move('source/assets/image/product', $fileName);							
        }							
        $file_name = null;							
        if ($request->file('inputImage') != null) {							
            $file_name = $request->file('inputImage')->getClientOriginalName();							
        }
        
        $product -> name = $request -> inputName;
        $product -> image = $file_name;
        $product -> description = $request -> inputDescription;
        $product -> unit_price = $request -> inputPrice;
        $product -> promotion_price = $request -> inputPromotionPrice;
        $product -> unit = $request -> inputUnit;
        $product -> new = $request -> inputNew;
        $product -> id_type = $request -> inputType;
        $product -> save();
        return $this -> getIndexAdmin();

    }
       
    // Cake_Shop Edit product
    public function postAdminEdit(Request $request)							
    {							
        // $id = $request -> edit;
        $id = $request->editId;

        $product = Product::find($id);							
        if ($request->hasFile('editImage')) {							
            $file = $request->file('editImage');							
            $fileName = $file->getClientOriginalName('editImage');							
            $file->move('source/image/product', $fileName);							
        }							
        $file_name = null;							
        if ($request->file('editImage') != null) {							
            $file_name = $request->file('editImage')->getClientOriginalName();							
        }
        
        $product -> name = $request -> editName;
        $product -> image = $file_name;
        $product -> description = $request -> editDescription;
        $product -> unit_price = $request -> editPrice;
        $product -> promotion_price = $request -> editPromotionPrice;
        $product -> unit = $request -> editUnit;
        $product -> new = $request -> editNew;
        $product -> id_type = $request -> editType;
        $product -> save();
        return $this -> getIndexAdmin();

    }

    public function getContact(){
        return view('page.lienhe');
    }

    public function getAbout(){
        return view('page.about');
    }

    public function getIndexAdmin() {
        $product = Product::all();
        return view('pageadmin.admin')->with(['product' => $product, 'sumSold' => count(BillDetail::all())]);
    }

    public function getAdminAdd()					
    {					
        return view('pageadmin.formAdd');		
    }					

    public function postAdminDelete($id) {
        $product = Product::find($id);
        $product->delete();
        return $this->getIndexAdmin();
    }

    public function getAdminEdit($id) {
        $product = Product::find($id);
        return view('pageadmin.formEdit')->with('product', $product);
    }

    public function getSearch(Request $request) {
        $keyword = $request->input('keyword');

        $search = Product::where('name', 'like', "%{$keyword}%")->paginate(8);

        return view('page.search', compact('search', 'keyword'));
    }

    public function showSignup(){
        return view('page.signup');
    }
    public function signup(Request $request) {

        $user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // $input['password'] = bcrypt($input['password']);
        // User::create($input);
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = FacadesHash::make($request->input('password'));
        $user->save();

        return redirect() ->route('login')->with('');
    }

    public function Login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('pw');

        // Truy vấn kiểm tra user trong database
        $user = DB::table('users')->where('email', $email)->first();

        if ($user && FacadesHash::check($password, $user->password)) {
            // Lưu thông tin user vào session
            Session::put('user', $user);

            echo '<script>alert("Đăng nhập thành công.");window.location.assign("trangchu");</script>';
        } else {
            echo '<script>alert("Đăng nhập thất bại. Kiểm tra lại email hoặc mật khẩu.");window.location.assign("login");</script>';
        }
    }

    public function Logout(){
        
        Session::forget('user');
        Session::forget('cart');
        return redirect('/trangchu');
    }

    public function getAddToCart(Request $req, $id){					
        $product = Product::find($id);					
        $oldCart = Session('cart')?Session::get('cart'):null;					
        $cart = new Cart($oldCart);					
        $cart->add($product,$id);					
        $req->session()->put('cart', $cart);					
        return redirect()->back();					
    }					

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
        Session::put('cart',$cart);

        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

}
