<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;
use Illuminate\Support\Facades\DB;

class TransactionDetailController extends Controller
{
    public function index(){
        $data = DB::table('transaction_details')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($data, 200);
    }

    public function create(request $request){
        $data = TransactionDetail::create([
            'id_transaction' => $request->get('id_transaction'),
            'id_product' => $request->get('id_product'),
            'qty' => $request->get('qty'),
            'price_total' => $request->get('price_total'),
        ]);

        $notif = "Data berhasil ditambahkan";

        return response()->json(compact('data', 'notif'),200);
    }

    public function update(request $request, $id){
        $data = TransactionDetail::where('id', $id)
            ->update([
            'id_transaction' => $request->get('id_transaction'),
            'id_product' => $request->get('id_product'),
            'qty' => $request->get('qty'),
            'price_total' => $request->get('price_total'),
        ]);

        $notif = "Data berhasil diubah";


        return response()->json(compact('data', 'notif'),200);
    }

    public function delete($id){
        $data = TransactionDetail::find($id);
        $data->delete();

        $notif = "Data berhasil dihapus";

        return response()->json(compact('data', 'notif'),200);
    }
}
