<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    public function index(Request $request): View
    {
        $date = $request->query('date', today()->toDateString());
        $students = Student::query()->with(['attendanceRecords' => function ($query) use ($date) {
            $query->whereDate('attendance_date', $date);
        }])->orderBy('full_name')->get();

        return view('attendance.index', compact('students', 'date'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'attendance_date' => ['required', 'date'],
            'attendance' => ['required', 'array'],
            'attendance.*.status' => ['required', 'in:Present,Absent,Late'],
            'attendance.*.note' => ['nullable', 'string', 'max:255'],
        ]);

        foreach ($validated['attendance'] as $studentId => $record) {
            if (!Student::whereKey($studentId)->exists()) {
                continue;
            }

            Attendance::updateOrCreate(
                ['student_id' => $studentId, 'attendance_date' => $validated['attendance_date']],
                ['status' => $record['status'], 'note' => $record['note'] ?? null]
            );
        }

        return redirect()->route('attendance.index', ['date' => $validated['attendance_date']])
            ->with('success', 'Attendance saved successfully.');
    }
}
