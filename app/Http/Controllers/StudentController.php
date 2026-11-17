<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $query = Student::query();

        if ($search = trim((string) $request->query('search'))) {
            $query->where(function ($builder) use ($search) {
                $builder->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('course', 'like', "%{$search}%");
            });
        }

        if ($course = $request->query('course')) {
            $query->where('course', $course);
        }

        $sort = $request->query('sort', 'newest');
        match ($sort) {
            'oldest' => $query->oldest(),
            'name' => $query->orderBy('full_name'),
            default => $query->latest(),
        };

        $students = $query->paginate(8)->withQueryString();
        $courses = Student::query()->select('course')->distinct()->orderBy('course')->pluck('course');

        return view('students.index', compact('students', 'courses', 'sort'));
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160', 'unique:students,email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'course' => ['required', 'string', 'max:100'],
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160', Rule::unique('students', 'email')->ignore($student->id)],
            'phone' => ['nullable', 'string', 'max:30'],
            'course' => ['required', 'string', 'max:100'],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function export(): StreamedResponse
    {
        $filename = 'students-'.now()->format('Y-m-d').'.csv';
        $students = Student::orderBy('id')->cursor();

        return Response::streamDownload(function () use ($students) {
            $output = fopen('php://output', 'w');
            fputcsv($output, ['ID', 'Full Name', 'Email', 'Phone', 'Course', 'Created At']);

            foreach ($students as $student) {
                fputcsv($output, [
                    $student->id,
                    $student->full_name,
                    $student->email,
                    $student->phone,
                    $student->course,
                    $student->created_at?->toDateTimeString(),
                ]);
            }
            fclose($output);
        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }
}
