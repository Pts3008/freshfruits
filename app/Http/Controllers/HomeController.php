<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPhams;
use App\User;
use Hash;
use Auth;
use Sentinel;
use Reminder;
use Mail;
use App\Cart;
use App\DonHangs;
use App\Binhluans;
use App\Http\Requests\RequestPassword;
class HomeController extends Controller
{
    public function index(){
    	$sanpham= SanPhams::where('gia','>',0)->paginate(8);
    	return view('index',compact('sanpham'));
    }
    public function chitiet(Request $req,$id){
    	$sanpham= SanPhams::where('id',$req->id)->first();
      $binhluan = Binhluans::where('id_sp',$id)->orderBy('id_bl', 'desc')->paginate(5);
    	return view('chitiet',compact('sanpham','binhluan'));
    }
    public function timkiem(Request $req){
    	$sanphamtk= SanPhams::where('tensp','like','%'.$req->key.'%')->get();
    	return view('timkiem',compact('sanphamtk'));
    }
    public function dangnhap(){
    	
    	return view('dangnhap');
    }
    public function dangki(){
    	
    	return view('dangki');
    }
     public function postdangki(Request $req){
    	
    	$this->validate($req,[
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:6|max:20',
              'name'=>'required'
    	],[
               'email.required'=>'nhập email !',
               'email.email'=>'nhập sai định dạng email !',
               'email.unique'=>'email đã có người sử dụng !',
               'password.required'=>'nhập mật khẩu !',
               'name.required'=>'nhập tên !',
               'password.min'=>'mật khẩu ít nhất 6 kí tự !',
               
    	]);
    	$user=new User();
    	$user->name=$req->name;
    	$user->email=$req->email;
    	$user->password=Hash::make($req->password);
    	$user->save();
    	return redirect()->back()->with('thanhcong','tạo thành công');
    }
    public function postdangnhap(Request $req){
           $this->validate($req,[
           'email'=>'required|email',
           'password'=>'required|min:6|max:20',
           ],[
            'email.required'=>'nhaapj email',
            'email.email'=>'email sai',
            'password.required'=>'nhập mật khẩu !',
            'password.min'=>'mật khẩu ít nhất 6 kí tự !'
           ]);
           $credentials=array('email'=>$req ->email,'password'=>$req->password);
           if(Auth::attempt($credentials)){
           	return redirect()->route('index')->with(['plag'=>'success','thongbao'=>'dang nhap thành công']);
           }else{
           	return redirect()->back()->with(['plag'=>'danger','thongbao'=>'dang nhap khong thành công']);
           }
    }
    public function dangxuat(){
    	Auth::logout();
    	return redirect()->route('index');
    }
    public function doimatkhau(){
      
      return view('doimatkhau');
    }
    public function postdoimatkhau(RequestPassword $req){
      $user = Auth::user();
      if(Hash::check($req -> password_old,$user->password)){
        $user->password=bcrypt($req->password);
        $user->save();

        return redirect()->back()->with('success','cap nhật thaanhf công');
      }
      return redirect()->back()->with('danger','Mật khẩu cũ không đung');
    }
    public function quenmk(){
      return view('quenmk');
    }
    
    
   
  public function cart()
  {
    

    return view('giohang');

  }
 



      public function getAddtoCart2(Request $req,$id){
        $product = SanPhams::find($id);
       // dd($product);
        $cart = new Cart();
        $qtt = ($req->quantity) ? $req->quantity : 1;
        
        // dd($qtt);
        $cart->add2($product, $qtt);
       // dd(session('procart'));
        return redirect()->back();
    }
   
    public function ship()
  {
    
        $order = DonHangs::all();
    return view('order',compact('order'));

  }
    public function getAdd(Request $req,$id){
        $product = Product::find($id);
        $cart = new Cart();
        $qtt = ($req->quantity) ? $req->quantity : 1;
        
        $cart->add2($product, $qtt);

       
        return  redirect('ship');
    }

    public function getDeletetoCart(Request $req,$id){
        
        $cart = new Cart();
        $qtt = ($req->soluong) ? $req->soluong : 1;
        
        $cart->reduceByOne($id);
        return redirect()->back();
    }
    public function getDeletealltoCart(Request $req,$id){
        
        $cart = new Cart();
        $qtt = ($req->soluong) ? $req->soluong : 1;
        
        $cart->removeItem($id);
        return redirect()->back();
    }
    
    public function postBinhluan(Request $request,$id){
    
      Binhluans::create([
          'noidung'=>$request->noidung,
          
          'id_sp'=>$id,
          'id'=>Auth::user()->id,
           
        ]);

         return redirect()->back();
    }
}
