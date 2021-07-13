<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Home;
use App\Homeorder;
use App\Product;
use App\Order;
use App\Productstoorder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class MainController extends Controller
{
//    Метод главной страницы

    public function index(){
        $products = Product::paginate(6);
        return view('index',['products'=>$products]);
    }

    public function product($id) {
        $product = Product::find($id);
        return view('product', ['product'=>$product]);
    }

//   Методы отображения товаров по категориям

    public function categories($id){
        $products = Product::where('categorie_id', $id)
            ->paginate(6);
        return view('index',['products'=>$products]);
    }
    public function getCategories() {
        $categories = Categorie::all();
        return response()->json($categories);
    }

//  Методы для корзины

    public function cart() {
        return view('cart');
    }
    public function getProducts(){
        $products=array();
        $resp=array();
        foreach (Cart::content() as $row){
            $products['image']=$row->options->image;
            $products['title']=$row->name;
            $products['price']=$row->price;
            $products['count']=$row->qty;
            $products['summ']=$row->qty*$row->price;
            $products['rowId']=$row->rowId;
            array_push($resp,$products);
        }
        return response()->json($resp);
    }
    public function cartremove($rowId){
        Cart::remove($rowId);
    }
    public function cartminus($rowId){
        $qty = Cart::get($rowId)->qty;
        $qty = $qty-1;
        Cart::update($rowId, $qty);
        return redirect('/cart');
    }
    public function cartplus($rowId){
        $qty = Cart::get($rowId)->qty;
        $qty = $qty+1;
        Cart::update($rowId, $qty);
        return redirect('/cart');
    }
    public function addtocart($id){
            $product = Product::find($id);
            $product = $product->toArray();
            $product['count']=1;
            $product['summ']=$product['price'];
            Cart::add ($product['id'],$product['title'],$product['count'],$product['summ'],$product);
            return response(Cart::count());
    }
    public function resetCart(){
        session()->flush();
        return view('cart');
    }
    public function getSum(){
        return response()->json(Cart::subtotal());
    }

    //    Метод оформления покупки

    public function getorder(Request $request){
        if($request->isMethod('post')) {
            if($request->has(['phone','email','comment']))
            {
                $input = $request->all();
                $order = new Order;
                $order->fill($input);
                $order->save();

                foreach(Cart::content() as $row){
                    $productstoorder = new Productstoorder;
                    $productstoorder['product_id'] = $row->id;
                    $productstoorder['count'] = $row->qty;
                    $productstoorder['order_id'] = $order->id;
                    $productstoorder->save();
                }
                return view('successorder');
            }
            else return view('order');
        }
        else return view('order');
    }

    public function getorderhome ($id, Request $request) {
        if($request->isMethod('post')) {
            if($request->has(['name','phone','email','comment','type']))
            {
                $input = $request->all();
                $order = new Homeorder;
                $order->fill($input);
                $order->save();

                return view('successorder');
            }
            else
                $home = Home::find($id);
                return view('homeorder', ['home'=>$home]);
        }
        else
            $home = Home::find($id);
            return view('homeorder', ['home'=>$home]);
    }

    public function homeoffers(){
        $homes = Home::all();
        return view("homeoffers", ['homes'=>$homes]);
    }

    public function about(){
        return view("about");
    }

    public function successorder() {
        return view('successorder');
    }
}
