<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index(){
        $data = DB::table('categories')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($data, 200);
    }

    public function create(request $request){
        $data = Category::create([
            'category_name' => $request->get('category_name'),
            'status' => $request->get('status'),
        ]);

        $notif = "Data berhasil ditambahkan";

        return response()->json(compact('data', 'notif'),200);
    }

    public function update(request $request, $id){
        $data = Category::where('id', $id)
            ->update([
            'category_name' => $request->get('category_name'),
            'status' => $request->get('status'),
        ]);

        $notif = "Data berhasil diubah";


        return response()->json(compact('data', 'notif'),200);
    }

    public function delete($id){
        $data = Category::find($id);
        $data->delete();

        $notif = "Data berhasil dihapus";

        return response()->json(compact('data', 'notif'),200);
    }
}
