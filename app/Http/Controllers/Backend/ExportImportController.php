<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportImportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'import_file'=>'required|file'
        ]);

        Excel::import(new ProductImport, $request->file('import_file'));

        return redirect()->route('product.index');
    }

    public function export()
    {
        // if($request->type == 'xlsx'){

        //     $fileExt = 'xlsx';
        //     $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        // }
        // elseif($request->type == 'csv'){

        //     $fileExt = 'csv';
        //     $exportFormat = \Maatwebsite\Excel\Excel::CSV;
        // }
        // elseif($request->type == 'xls'){

        //     $fileExt = 'xls';
        //     $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        // }
        // else{

        //     $fileExt = 'xlsx';
        //     $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        // }

        return Excel::download(new ProductExport,'products.xlsx');
    }
}
