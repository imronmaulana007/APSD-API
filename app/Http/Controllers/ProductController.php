<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Http\UploadedFile;
use App\FileUpload;

class ProductController extends Controller
{
    public function index(){
        $data = DB::table('products')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($data, 200);
    }

    public function create(request $request){
        if($request->get('photo'))
        {
            $image = $request->get('photo');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('photo'))->save(public_path('images/upload_product/').$name);
        }

        $data = Product::create([
            'id_category' => $request->get('id_category'),
            'product_name' => $request->get('product_name'),
            'photo' => $name,
            'stock' => $request->get('stock'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'weight' => $request->get('weight'),
            'long' => $request->get('long'),
            'heigt' => $request->get('heigt'),
            'wide' => $request->get('wide'),
            'status' => $request->get('status'),
        ]);

        $notif = "Data berhasil ditambahkan";

        return response()->json(compact('data', 'notif'),200);
    }

    public function update(request $request, $id){

        $cek = Product::find($id); 

        $path = public_path('images/upload_product/');
        $isExists = File::exists($path.$request->get('photo'));
        
        if($isExists != true)
        {
            File::delete($path.$cek->photo);

            $image = $request->get('photo');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

            \Image::make($request->get('photo'))->save(public_path('images/upload_product/').$name);
        }

        $data = Product::where('id', $id)
            ->update([
                'id_category' => $request->get('id_category'),
                'product_name' => $request->get('product_name'),
                'photo' => isset($name) == true ? $name : $request->get('photo') ,
                'stock' => $request->get('stock'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'weight' => $request->get('weight'),
                'long' => $request->get('long'),
                'heigt' => $request->get('heigt'),
                'wide' => $request->get('wide'),
                'status' => $request->get('status'),
        ]);

        $notif = "Data berhasil diubah";


        return response()->json(compact('data', 'notif'),200);
    }

    public function delete($id){
        $post = Product::find($id); 
        // delete image
        $destinationPath = public_path('images/upload_product/');
        if(File::exists($destinationPath.$post->photo) == true ){
            File::delete($destinationPath.$post->photo);
        }
        $post->delete();
        $notif = "Data berhasil dihapus";

        return response()->json(compact('post', 'notif'),200);
    }
}
