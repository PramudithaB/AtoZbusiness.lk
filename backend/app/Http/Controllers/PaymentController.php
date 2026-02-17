<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'address' => 'required|string',
            'packages' => 'required|string', // received as string
            'total' => 'required|numeric',
            'remark' => 'nullable|string',
            'slip' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
        ]);

        if ($request->hasFile('slip')) {
            $data['slip'] = $request->file('slip')->store('slips', 'public');
        }

        $data['user_id'] = Auth::id(); // ⭐ Save logged user id

        Payment::create($data);

        return response()->json(['message' => 'Payment submitted successfully!']);
    }

    public function index()
    {
        return Payment::orderBy('id','desc')->get();
    }

    public function approve($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'approved';
        $payment->save();

        return response()->json(['message' => 'Payment Approved']);
    }

    public function reject($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'rejected';
        $payment->save();

        return response()->json(['message' => 'Payment Rejected']);
    }
}
