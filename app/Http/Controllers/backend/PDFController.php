<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use PDF;

class PDFController extends Controller
{
    //
    public function generatePDF($id){
        $dataOrder = OrderModel::find($id);
        $dataOrderdetail = OrderdetailModel::where('order_id', $dataOrder->order_id)->get();

        $data = [
            'dataOrder' => $dataOrder,
            'dataOrderdetail' => $dataOrderdetail
        ];
    
        $pdf = PDF::loadView('pdf.orderpdf', $data);
    
        // return $pdf->download('orderpdf.pdf');
        return $pdf->stream();
    }
}
