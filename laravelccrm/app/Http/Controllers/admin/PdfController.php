<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Invoice;

class PdfController extends Controller
{
    public function generatePdf(){


        $product = Invoice::get();
        $data = [
            'title' => 'Funda of Web IT',
            'date' => date('m/d/y'),
            'products' => $product
        ];
        $pdf = Pdf::loadView('admin.invoices.generate-product-pdf', $data);
        return $pdf->download('invoice.pdf');
    }
}
