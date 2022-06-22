<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
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
            $sales = $request->validate([
                'sales_id' => 'required',
                'barang_id' => 'required',
                'harga_bandrol' => 'required',
                'qty' => 'required',
                'diskon_pct' => 'required',
                'diskon_nilai' => 'required',
                'harga_diskon' => 'required',
                'total' => 'required',
            ]);

            TSalesDet::create($sales);
            return ResponseBuilder::createResponse(200, 'Post data success', $sales);
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
