<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportProductsRequest;
use App\Jobs\ImportCsv;
use Illuminate\Http\Response;

class ImportProductsController extends Controller
{
    public function importProducts(ImportProductsRequest $request)
    {
        try {
            ImportCsv::dispatch();
        } catch (\Exception $e) {
            echo 'test';
        }

        return response()->json([
            'status' => true,
            'data'=>'created'
        ]);
    }
}
