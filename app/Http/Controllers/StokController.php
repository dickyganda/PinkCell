<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

use App\Models\Stok;
use App\Models\TrxIn;

class StokController extends Controller
{
    //
    public function index()
    {
        // menampilkan data build of material
        $stok = DB::table('m_stok')
        ->where('StatusStok', '=', 1)
        ->get();
        // dd($trxin);

        return view('stok.index', [
            'stok' => $stok
        ]);
    }

    public function edit($IdStok)
    {
        $stok = DB::table('m_stok')->where('IdStok',$IdStok)->get();

        return view('stok.editstok', [
            'stok' => $stok,
            // 'departement' => $departement,
            // 'unit' => $unit
        ]);

    }

    public function update(Request $request, $IdStok)
{
    // $dataharga = DB::table('m_harga')
    //     ->where('HargaSatuan', '=', $request->IdHarga)
    //     ->first();

	DB::table('m_stok')
    ->where('IdStok',$IdStok)->update([
		'MerkStok' => $request->MerkStok,
		'TypeStok' => $request->TypeStok,
		'RamStok' => $request->RamStok,
		'RomStok' => $request->RomStok,
		'ImeiStok' => $request->ImeiStok,
		'HargaNet' => $request->HargaNet,
	]);


    return redirect('/stok/index')->with('success', 'Data Berhasil Diupdate');
    
}
}
