<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\Product;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(){
        $data = DB::table('transactions')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($data, 200);
    }

    public function create(request $request){
        
        $data = Transaction::create([
            'id_customer' => $request->get('id_customer'),
            'status' => $request->get('status'),
            'transaction_date' => $request->get('transaction_date'),
        ]);

        $count = count($request->transaction_detail);
       
        for ($x = 0; $x < $count; $x++) {
            $transactionDetail = TransactionDetail::create([
                'id_transaction' => $data->id,
                'id_product' => $request->get('transaction_detail')[$x]['id_product'],
                'qty' => $request->get('transaction_detail')[$x]['qty'],
                'price_total' => $request->get('transaction_detail')[$x]['price_total'],
            ]);

            //cari produk
            $prod = Product::find($request->get('transaction_detail')[$x]['id_product']); 
            
            $updatestock = $prod->stock - $request->get('transaction_detail')[$x]['qty'];
            // var_dump($updatestock);

            //update stok produk
            $product = Product::where('id', $request->get('transaction_detail')[$x]['id_product'])
            ->update([
                'stock' => $updatestock
            ]);
        }       

        $notif = "Data berhasil ditambahkan";

        return response()->json(compact('data', 'notif'),200);
    }

    public function update(request $request, $id){
        $data = Transaction::where('id', $id)
            ->update([
            'id_customer' => $request->get('id_customer'),
            'status' => $request->get('status'),
            'transaction_date' => $request->get('transaction_date'),
        ]);

        $count = count($request->transaction_detail);
        $TD = TransactionDetail::where('id_transaction', $id)->get();
        $countTD = count($TD);
        for ($x = 0; $x < $countTD; $x++) {
            $prod = Product::find($TD[$x]->id_product); 
            
            $updatestock = $prod->stock + $TD[$x]->qty;

            //update stok produk
            $product = Product::where('id', $TD[$x]->id_product)
            ->update([
                'stock' => $updatestock
            ]);

            $transdetdel =  TransactionDetail::find($TD[$x]->id); 
            $transdetdel->delete();
        }        
      
        for ($x = 0; $x < $count; $x++) {
            $transactionDetail = TransactionDetail::create([
                'id_transaction' => $id,
                'id_product' => $request->get('transaction_detail')[$x]['id_product'],
                'qty' => $request->get('transaction_detail')[$x]['qty'],
                'price_total' => $request->get('transaction_detail')[$x]['price_total'],
            ]);

            //cari produk
            $prod = Product::find($request->get('transaction_detail')[$x]['id_product']); 
            
            $updatestock = $prod->stock - $request->get('transaction_detail')[$x]['qty'];
            // var_dump($updatestock);

            // update stok produk
            $product = Product::where('id', $request->get('transaction_detail')[$x]['id_product'])
            ->update([
                'stock' => $updatestock
            ]);
        }

        $notif = "Data berhasil diubah";


        return response()->json(compact('data', 'notif'),200);
    }

    public function delete($id){
        $data = Transaction::find($id);
        $transdet = TransactionDetail::where('id_transaction', '=', $id)->get(); 
        $transdetdel;
        if(count($transdet) > 0){
            for ($x = 0; $x < count($transdet); $x++) {
                $transdetdel = TransactionDetail::find($transdet[$x]->id); 
                $transdetdel->delete();
            }
        }
        $data->delete();
        $notif = "Data berhasil dihapus";
        return response()->json(compact('data', 'transdetdel', 'notif'),200);
    }
}
