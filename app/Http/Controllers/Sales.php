<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use App\Models\TSales;
use App\Models\TSalesDet;
use Exception;
use Illuminate\Http\Request;

class Sales extends Controller
{
    public function index()
    {
        return ResponseBuilder::createResponse(200, 'Get Data Success', TSalesDet::all());
    }

    public function store(Request $request)
    {
        try {
            $transaksi = TSales::where('kode', $request->transaksi_kode)->first();
            foreach ($request->data as $key => $value) {
                $value['sales_id'] = $transaksi->id;
                TSalesDet::create($value);
            }
            return ResponseBuilder::createResponse(200, 'Post data success', $request->data);
        } catch (Exception $err) {
            return ResponseBuilder::createResponse(400, 'Post data failed', $err);
        }
    }

    public function destroy($id)
    {
        $sales = TSalesDet::find($id);
        $sales->delete();

        return ResponseBuilder::createResponse(200, 'Delete Success');
    }
}
