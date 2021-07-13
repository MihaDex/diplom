<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Home;
use App\Homeorder;
use App\Product;
use App\Order;
use App\Productstoorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//    Методы для манипулирования товарами на главной странице панели администратора

    public function main(){
        $products = Product::all();
        $categories = Categorie::all();
        return view('admin.main',['products'=>$products,'categories'=>$categories]);
    }
    public function deleteProduct($id, Request $request)
    {
        if ($request->isMethod('delete')) {
            $product = Product::find($id);
            $product->delete();
        }
    }
    public function updateProduct($id, Request $request){
        if ($request->isMethod('put')) {
            $product = Product::find($id);
            $product->update($request->all());
        }
    }
    public function products(Request $request) {
        $filter = $request->all();
        $title = "%" . $filter['title'] . "%";
        $description = "%" . $filter['description'] . "%";
        $price = "%" . $filter['price'] . "%";
        $categorie_id = intval($filter['categorie_id']);
        if($categorie_id==0){
            $result = 1;
        }
        else {
            $result = 0;
        }
        $products =DB::select("SELECT * FROM products WHERE title LIKE :title AND description LIKE :description AND price LIKE :price AND ( $result OR categorie_id = :categorie_id)",
            [':title'=>$title,':description'=>$description,':categorie_id'=>$categorie_id,':price'=>$price]);
        return response()->json($products);
    }
    public function categories() {
        $categories = Categorie::all();
        return response()->json($categories);
    }
    public function changeImage($id, Request $request){
        if($request->isMethod('post')) {
            $imgPath = public_path();
            $imgPath .= "/.." . Product::find($id)->image;
            if (is_file($imgPath)) {
                if ($request->hasFile('img')) {
                    $input = $request->all();
                    $file = $request->file('img');
                    $img = Image::make($file);
                    $filename = time() . '.' . $file->getClientOriginalExtension() ?: 'png';
                    $path = public_path() . '/img/uploads/';
                    $img->fit(300, 200, function ($constraint) {
                        $constraint->upsize();
                    });
                    $img->save($path . $filename);
                    $product = Product::find($id);
                    $product->image = '/public/img/uploads/' . $filename;
                    $product->save();
                    unlink($imgPath);
                    return redirect('/admin');
                }
            }
        }
        else {
            $path = Product::find($id)->image;
            return view('admin.change-image',["path"=>$path,"id"=>$id]);
        }
    }

//  Метод для добавления товара

    public function addProduct(Request $request){
        if($request->isMethod('post')) {
            if ($request->hasFile('img') && $request->has(['title', 'category'])) {
                $input = $request->all();

                $file = $request->file('img');
                $img = Image::make($file);
                $filename = time().'.'.$file->getClientOriginalExtension() ?: 'png';
                $path = public_path().'/img/uploads/';
                $img->fit(300, 200, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($path.$filename);

                $product = new Product;
                $product->title = $input['title'];
                $product->description = $input['description'];
                $product->price = $input['price'];
                $product->categorie_id = $input['category'];
                $product->image = '/public/img/uploads/'.$filename;
                $product->save();

                return redirect('/admin');
            }
        }
        $categories = Categorie::all();
        return view('admin/add-product',['categories'=>$categories]);
    }

//    Методы для просмотра заказов

    public function orders() {
        $orders = Order::all();
        return view('admin.orders',['orders'=>$orders]);
    }
    public function order($id) {
        $products = [];
        $orders = Productstoorder::where('order_id',$id)->get();
      		$index=0;
        foreach ($orders as $item){
        			$id = $item['order_id'];
            array_push($products,$item->products()->get()->toArray()[0]);
            $products[$index]['count']=$item->count;
            $index++;
        }
          $order = Order::where('id',$id)->get();
        return view('admin.order',['products'=>$products,'order'=>$order]);
    }

    public function homeorders() {
        $orders = Homeorder::all();
        return view('admin.homeorders',['orders'=>$orders]);
    }
    public function homeorder($id) {
        $order = Homeorder::find($id);
        return view('admin.homeorder',['order'=>$order]);
    }

    public function addHome(Request $request){
        if($request->isMethod('post')) {
            if ($request->hasFile('img') && $request->has(['name', 'description', 'price'])) {
                $input = $request->all();

                $file = $request->file('img');
                $img = Image::make($file);
                $filename = time().'.'.$file->getClientOriginalExtension() ?: 'png';
                $path = public_path().'/img/uploads/';
                $img->fit(300, 200, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save($path.$filename);

                $product = new Home;
                $product->name = $input['name'];
                $product->description = $input['description'];
                $product->price = $input['price'];
                $product->img = '/public/img/uploads/'.$filename;
                $product->save();

                return redirect('/admin');
            }
        }
        return view('admin/add-home');
    }

    public function homes(){
        return view('admin.homes');
    }

    public function gethomes(Request $request) {
        $filter = $request->all();
        $name = "%" . $filter['name'] . "%";
        $description = "%" . $filter['description'] . "%";
        $price = "%" . $filter['price'] . "%";

        $products =DB::select("SELECT * FROM homes WHERE `name` LIKE :name AND description LIKE :description AND price LIKE :price ",
            [':name'=>$name,':description'=>$description,':price'=>$price]);
        return response()->json($products);
    }

    public function deleteHome($id, Request $request)
    {
        if ($request->isMethod('delete')) {
            $product = Home::find($id);
            $product->delete();
        }
    }
    public function updateHome($id, Request $request){
        if ($request->isMethod('put')) {
            $product = Home::find($id);
            $product->update($request->all());
        }
    }

    public function changeImageHome($id, Request $request){
        if($request->isMethod('post')) {
            $imgPath = public_path();
            $imgPath .= "/.." . Home::find($id)->img;
            if (is_file($imgPath)) {
                if ($request->hasFile('img')) {
                    $input = $request->all();
                    $file = $request->file('img');
                    $img = Image::make($file);
                    $filename = time() . '.' . $file->getClientOriginalExtension() ?: 'png';
                    $path = public_path() . '/img/uploads/';
                    $img->fit(300, 200, function ($constraint) {
                        $constraint->upsize();
                    });
                    $img->save($path . $filename);
                    $home = Home::find($id);
                    $home->img = '/public/img/uploads/' . $filename;
                    $home->save();
                    unlink($imgPath);
                    return redirect('/admin/homes');
                }
            }
        }
        else {
            $path = Home::find($id)->img;
            return view('admin.change-image-home',["path"=>$path,"id"=>$id]);
        }
    }

}
