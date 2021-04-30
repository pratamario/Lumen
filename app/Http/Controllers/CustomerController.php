<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller {
    public function index(Request $request)
    {
        $Nama_Customer = $request->get('Nama_Customer');

        if($Nama_Customer) {
            $data = DB::select("SELECT * FROM customer WHERE Nama_Customer LIKE '%$Nama_Customer%' ");
        } else {
            $data = DB::select('SELECT * FROM customer');
        }

        return response()->json($data);
    }

    public function insert(Request $request)
    {
        $No_Customer = $request->post('No_Customer');
        $Nama_Customer = $request->post('Nama_Customer');
        $No_Telp = $request->post('No_Telp');
        $Alamat_Customer = $request->post('Alamat_Customer');
        $Merk_Mobil = $request->post('Merk_Mobil');
        $No_Plat = $request->post('No_Plat');
        $No_Vin = $request->post('No_Vin');

        $insert = DB::insert("INSERT INTO customer (No_Customer,Nama_Customer,No_Telp,Alamat_Customer,Merk_Mobil,No_Plat,No_Vin) VALUE ('$No_Customer','$Nama_Customer','$No_Telp','$Alamat_Customer','$Merk_Mobil','$No_Plat','$No_Vin')");

        if($insert) {
            return response()->json('Data Berhasil');
        } else {
            return response()->json('Data Gagal');
        }
    }
    public function update($id, Request $request)
    {
        $No_Customer = $request->post('No_Customer');
        $Nama_Customer = $request->post('Nama_Customer');
        $No_Telp = $request->post('No_Telp');
        $Alamat_Customer = $request->post('Alamat_Customer');
        $Merk_Mobil = $request->post('Merk_Mobil');
        $No_Plat = $request->post('No_Plat');
        $No_Vin = $request->post('No_Vin');

        $update = DB::update("UPDATE customer SET Nama_Customer='$Nama_Customer',No_Telp='$No_Telp',Alamat_Customer='$Alamat_Customer',Merk_Mobil='$Merk_Mobil',No_Plat='$No_Plat',No_Vin='$No_Vin' WHERE No_Customer='$id'");

        if($update) {
            return response()->json('Data Berhasil');
        } else {
            return response()->json('Data Gagal');
        }
    }
    public function delete($id)
    {
        $delete = DB::delete("DELETE from customer WHERE No_Customer = '$id'");

        if($delete) {
            return response()->json('Data Berhasil');
        } else {
            return response()->json('Data Gagal');
        }
    }
}

?>
