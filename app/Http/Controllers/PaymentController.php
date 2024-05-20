<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Dompdf\Dompdf;


class PaymentController extends Controller
{

    public function downloadReceipt()
        {
            $latestPayment = Payment::where('student_id', auth()->id())->latest()->first();
            
            if (!$latestPayment) {
                return redirect()->back()->with('error', 'No payment found.');
            }
            
            $receiptData = [
                'amount' => $latestPayment->amount,
                'payment_method' => $latestPayment->payment_method,
                'payment_status' => $latestPayment->payment_status,
                'course_name' => $latestPayment->course->name,
                'transaction_date' => $latestPayment->created_at,
            ];

            $html = view('receipts', compact('receiptData'))->render();

            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);

            $dompdf->setPaper('A4', 'portrait');

            $dompdf->render();

            return $dompdf->stream('receipt.pdf');
        }
}
