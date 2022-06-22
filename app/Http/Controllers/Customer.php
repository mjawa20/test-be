<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use App\Models\MCustomer;
use Exception;
use Illuminate\Http\Request;

class Customer extends Controller
{
    public function index()
    {
        return ResponseBuilder::createResponse(200, 'Get Data Success', MCustomer::all());
    }
    public function store(Request $request)
    {
        try {
            $customer = $request->validate([
                'kode' => 'required',
                'nama' => 'required',
                'telp' => 'required',
            ]);
            MCustomer::create($customer);
            return ResponseBuilder::createResponse(200, 'Post data success', $customer);
        } catch (Exception $err) {
            return ResponseBuilder::createResponse(400, 'Post data failed', $err);
        }
    }

    public function destroy($id)
    {
        $customer = MCustomer::find($id);
        $customer->delete();
        
        return ResponseBuilder::createResponse(200, 'Delete Success');
    }
}
