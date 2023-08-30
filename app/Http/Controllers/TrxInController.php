<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

use App\Models\Stok;
use App\Models\TrxIn;

class TrxInController extends Controller
{
    //
    public function index()
    {
        // menampilkan data build of material
        $trxin = DB::table('t_masuk')
        ->get();
        // dd($trxin);

        return view('trxin.index', [
            'trxin' => $trxin
        ]);
    }

    public function store(Request $request)
    {
        $trxin = new TrxIn();
        $trxin->MerkMasuk = $request->MerkMasuk;
        $trxin->TypeMasuk = $request->TypeMasuk;
        $trxin->RamMasuk = $request->RamMasuk;
        $trxin->RomMasuk = $request->RomMasuk;
        $trxin->HargaMasuk = $request->HargaMasuk;
        $trxin->KeteranganMasuk = $request->KeteranganMasuk;
        $trxin->ImeiMasuk = $request->ImeiMasuk;
        $trxin->TglMasuk = Carbon::now();
        $trxin->save();

        $stok = new Stok();
        $stok->MerkStok = $request->MerkMasuk;
        $stok->TypeStok = $request->TypeMasuk;
        $stok->RamStok = $request->RamMasuk;
        $stok->RomStok = $request->RomMasuk;
        $stok->HargaNet = $request->HargaNet;
        $stok->KeteranganStok = $request->KeteranganMasuk;
        $stok->ImeiStok = $request->ImeiMasuk;
        $stok->StatusStok = 1;
        $stok->save();

        


        // return redirect('/sales/index')->with('success', 'Data Berhasil Ditambahkan');
        return response()->json(array('status' => 'success', 'reason' => 'Sukses Tambah Data'));
    }
}
