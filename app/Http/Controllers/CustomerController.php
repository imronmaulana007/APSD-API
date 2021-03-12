<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        $data = DB::table('customers')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($data, 200);
    }

    public function create(request $request){
        $data = Customer::create([
            'customer_name' => $request->get('customer_name'),
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
        $data = Customer::where('id', $id)
            ->update([
                'customer_name' => $request->get('customer_name'),
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
        $data = Customer::find($id);
        $data->delete();

        $notif = "Data berhasil dihapus";

        return response()->json(compact('data', 'notif'),200);
    }
}
