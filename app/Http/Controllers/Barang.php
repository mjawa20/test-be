<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use App\Models\MBarang;
use Exception;
use Illuminate\Http\Request;

class Barang extends Controller
{
    public function index()
    {
        return ResponseBuilder::createResponse(200, 'Get Data Success', MBarang::all());
    }

    public function store(Request $request)
    {
        try {
            $barang = $request->validate([
                'kode' => 'required',
                'nama' => 'required',
                'harga' => 'required',
            ]);
            MBarang::create($barang);
            return ResponseBuilder::createResponse(200, 'Post data success', $barang);
        } catch (Exception $err) {
            return ResponseBuilder::createResponse(400, 'Post data failed', $err);
        }
    }

    public function destroy($id)
    {
        $barang = MBarang::find($id);
        $barang->delete();
        
        return ResponseBuilder::createResponse(200, 'Delete Success');
    }
}
