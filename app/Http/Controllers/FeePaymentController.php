<?php

namespace App\Http\Controllers;

use App\Models\FeePayment;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeePaymentController extends Controller
{
    public function index(): View
    {
        $students = Student::orderBy('full_name')->get();
        $payments = FeePayment::with('student')->latest('payment_date')->latest()->paginate(10);
        $totalCollected = FeePayment::sum('amount');

        return view('fees.index', compact('students', 'payments', 'totalCollected'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'amount' => ['required', 'numeric', 'gt:0', 'max:99999999'],
            'payment_date' => ['required', 'date'],
            'description' => ['nullable', 'string', 'max:180'],
        ]);

        FeePayment::create($validated);

        return redirect()->route('fees.index')->with('success', 'Fee payment recorded.');
    }
}
