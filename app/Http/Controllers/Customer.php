<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use App\Models\MCustomer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Customer extends Controller
{
    public function index()
    {
        return ResponseBuilder::createResponse(200, 'Get Data Success', MCustomer::all());
    }

    public function show($id)
    {
        return ResponseBuilder::createResponse(200, 'Get Data Success', MCustomer::find($id));
    }

    public function store(Request $request)
    {
        try {
            $customer = $request->validate([
                'nama' => 'required',
                'telp' => 'required',
            ]);
            $customer['kode'] = Str::random(8);
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
