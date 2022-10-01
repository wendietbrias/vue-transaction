<?php

namespace App\Http\Controllers;

use App\Models\tbbarang;
use Illuminate\Http\Request;

class TbbarangController extends Controller
{
    public function GetAllBarang(Request $request) {
       $all = tbbarang::all();
       return response($all , 200)->header('Content-Type'  , 'application/json');
    }

    public function CreateBarang(Request $request) {
        $create = tbbarang::create([
            'kodebarang'=>$request->kodebarang,
            'nama'=>$request->nama,
            'jenis'=>$request->jenis,
            'merk'=>$request->merk,
            'satuan'=>$request->satuan,
            'jumlah_stock'=>$request->jumlah_stock,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual
        ]);

        return response($create, 200)->header('Content-Type', 'application/json');
    }

    public function DeleteBarang($kodebarang) {
       $delete = tbbarang::where('kodebarang',$kodebarang)->delete();

       if($delete) {
         return response(['msg'=>'deleted', 'kodebarang'=>$kodebarang], 200);
       }
    }

    public function UpdateBarang(Request $request, $kodebarang) {
        $updateProduct = tbbarang::where('kodebarang',$kodebarang)->update(
            [
                'nama'=>$request->nama ,
                'jenis'=>$request->jenis,
                'merk'=>$request->merk, 
                'satuan'=>$request->satuan, 
                'jumlah_stock'=>$request->jumlah_stock,
                'harga_beli'=>$request->harga_beli,
                'harga_jual'=>$request->harga_jual
            ]
            );

            return response([
                'msg'=>'updated success',
                'update_data'=>$updateProduct
            ])->header('Content-Type', 'application/json');
    }
}
