<?php

namespace App\Http\Controllers;

use App\Models\FeePayment;
use App\Models\Student;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            'students' => Student::count(),
            'courses' => Student::query()->distinct()->count('course'),
            'new_this_month' => Student::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)->count(),
            'fees' => FeePayment::sum('amount'),
        ];

        $recentStudents = Student::latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recentStudents'));
    }
}
