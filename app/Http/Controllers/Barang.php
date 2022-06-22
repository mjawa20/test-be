<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use App\Models\MBarang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
                'nama' => 'required',
                'harga' => 'required',
            ]);
            $barang['kode'] = Str::random(8);
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
