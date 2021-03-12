<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $data = DB::table('roles')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($data, 200);
    }

    public function create(request $request){
        $data = Role::create([
            'role_name' => $request->get('role_name'),
            'status' => $request->get('status'),
        ]);

        $notif = "Data berhasil ditambahkan";

        return response()->json(compact('data', 'notif'),200);
    }

    public function update(request $request, $id){
        $data = Role::where('id', $id)
            ->update([
            'role_name' => $request->get('role_name'),
            'status' => $request->get('status'),
        ]);

        $notif = "Data berhasil diubah";


        return response()->json(compact('data', 'notif'),200);
    }

    public function delete($id){
        $data = Role::find($id);
        $data->delete();

        $notif = "Data berhasil dihapus";

        return response()->json(compact('data', 'notif'),200);
    }
}
