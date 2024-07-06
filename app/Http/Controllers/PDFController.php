<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class PDFController extends Controller
{
    public function PDFdownload(Request $request)
    {
        $orders = Order::latest()->paginate(1);
        if ($request->has('download')) {
            $pdf = PDF::loadView('shop.pdf_download', compact('orders'))->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf -> download('pdfview.pdf');
        }
        return view('shop.confirm', compact('orders'));
    }


}
