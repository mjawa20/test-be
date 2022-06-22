<?php

namespace App\Http\Controllers;

use App\Helpers\Number;
use Illuminate\Http\Request;

use App\Helpers\ResponseBuilder;
use App\Models\TSales;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;

class Transaksi extends Controller
{
    public function index()
    {
        return ResponseBuilder::createResponse(200, 'Get Data Success', TSales::all());
    }

    public function store(Request $request)
    {
        try {
            dd(Number::transaksiGenerate(),Number::transaksiGenerate());
            $transaksi = $request->validate([
                'tgl' => 'required',
                'cust_id' => 'required',
                'subtotal' => 'required',
                'diskon' => 'required',
                'ongkir' => 'required',
                'total_bayar' => 'required',
            ]);
            $transaksi['kode'] = Str::random(4);
            TSales::create($transaksi);
            return ResponseBuilder::createResponse(200, 'Post data success', $transaksi);
        } catch (Exception $err) {
            return ResponseBuilder::createResponse(400, 'Post data failed', $err);
        }
    }
    public function destroy($id)
    {
        $transaksi = TSales::find($id);
        $transaksi->delete();

        return ResponseBuilder::createResponse(200, 'Delete Success');
    }
}
