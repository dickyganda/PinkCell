<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

use App\Models\Stok;
use App\Models\TrxIn;

class TrxOutController extends Controller
{
    //
    public function index()
    {
        // menampilkan data build of material
        $trxout = DB::table('t_keluar')
        ->get();
        // dd($trxin);

        return view('trxout.index', [
            'trxout' => $trxout
        ]);
    }
}
