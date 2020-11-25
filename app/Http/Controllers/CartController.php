<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SweetAlert;



class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $keranjang = Cart::find(26);
        
        $auth = Auth::user()->id;
        $keranjang = DB::table('carts')
        ->join('users','carts.user_id','users.id')
        ->join('products','products.id','carts.product_id')
        ->select('carts.*','products.p_name','products.price','products.url','users.name',)
        // ->select('users.name as u_name', 'customers.*', 'customers.name as c_name', 'users.*', 'items.*', 'sales.*', 'sales.id as s_id', 'items.id as i_id')
        ->where('user_id',$auth)
        ->get();
        
        // $keranjang = Cart::find($auth);
        
        // $keranjang = Cart::with('product')->get();
        //  echo "<pre>";
        // print_r($keranjang);
        // return $keranjang;
        return view('transaction.cart' ,compact('keranjang'));
    }

    public function notif(){
        $x = Cart::all()->where('user_id',Auth::user()->id);
        return view('layouts.app',compact('x'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $priceProduct = Product::find($request->id_product);
        $sum  = $request->sum_price;
        $jumlah = $request->jumlah;
        $result = $sum * $jumlah;
        $user_id = Auth::user()->id;
  
        Cart::create([
           'user_id' => $user_id,
            'warna' => $request->warna,
            'jumlah' => $request->jumlah,
            'sum_price' => $result,
            'product_id' => $request->id_product,
        ]);
  
        return  redirect('/cart')->with('status','Masuk Keranjang');
       
    }
    public function tes(){
        return view('layouts.admin');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = Cart::destroy($id);
        return redirect('/cart')->with('error', 'Profile updated!'); 
    }
}
