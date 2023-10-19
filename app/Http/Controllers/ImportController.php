<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImportService;

class ImportController extends Controller
{
    protected $importService;

    public function __construct(ImportService $importService)
    {
        $this->importService = $importService;
    }

    public function import(Request $request)
    {
        $importResult = $this->importService->importListing();

        return response()->json($importResult);
    }
}
