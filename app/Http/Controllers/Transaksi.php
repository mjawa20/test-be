<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\ResponseBuilder;
use App\Models\TSales;
use Exception;

class Transaksi extends Controller
{
    public function index()
    {
        return ResponseBuilder::createResponse(200, 'Get Data Success', TSales::all());
    }

    public function store(Request $request)
    {
        try {
            $transaksi = $request->validate([
                'kode' => 'required',
                'tgl' => 'required',
                'cust_id' => 'required',
                'subtotal' => 'required',
                'diskon' => 'required',
                'ongkir' => 'required',
                'total_bayar' => 'required',
            ]);
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
