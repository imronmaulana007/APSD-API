<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $data = DB::table('admins')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($data, 200);
    }

    public function create(request $request){
        $data = Admin::create([
            'id_role' => $request->get('id_role'),
            'admin_name' => $request->get('admin_name'),
            'gender' => $request->get('gender'),
            'phone_number' => $request->get('phone_number'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'status' => $request->get('status'),
        ]);

        $notif = "Data berhasil ditambahkan";

        return response()->json(compact('data', 'notif'),200);
    }

    public function update(request $request, $id){
        $data = Admin::where('id', $id)
            ->update([
                'id_role' => $request->get('id_role'),
                'admin_name' => $request->get('admin_name'),
                'gender' => $request->get('gender'),
                'phone_number' => $request->get('phone_number'),
                'address' => $request->get('address'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'status' => $request->get('status'),
        ]);

        $notif = "Data berhasil diubah";


        return response()->json(compact('data', 'notif'),200);
    }

    public function delete($id){
        $data = Admin::find($id);
        $data->delete();

        $notif = "Data berhasil dihapus";

        return response()->json(compact('data', 'notif'),200);
    }
}
