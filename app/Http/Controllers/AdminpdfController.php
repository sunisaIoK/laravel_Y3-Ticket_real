<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use PDF;

class AdminpdfController extends Controller
{
    public function PDFdownload(Request $request)
    {
        $adds = Admin::latest()->paginate(1);
        if ($request->has('download')) {
            $pdf = PDF::loadView('admin.admin_download', compact('adds'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('pdfview.pdf');
        }
        return view('admin.showcus', compact('adds'));
    }

}
