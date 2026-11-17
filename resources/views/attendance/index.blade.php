@extends('layouts.app')
@section('title', 'Attendance')
@section('content')
<div class="mb-3"><h1 class="h3 mb-1">Attendance management</h1><p class="text-secondary mb-0">Mark Present, Absent or Late for each student.</p></div>
<div class="card shadow-sm"><div class="card-body">
<form method="POST" action="{{ route('attendance.store') }}">@csrf
<div class="col-md-4 mb-3"><label class="form-label">Attendance date</label><input type="date" class="form-control" name="attendance_date" value="{{ $date }}" required></div>
<div class="table-responsive"><table class="table align-middle"><thead><tr><th>Student</th><th>Course</th><th>Status</th><th>Note</th></tr></thead><tbody>
@forelse($students as $student)
@php($record = $student->attendanceRecords->first())
<tr><td>{{ $student->full_name }}</td><td>{{ $student->course }}</td><td><select class="form-select" name="attendance[{{ $student->id }}][status]">@foreach(['Present','Absent','Late'] as $status)<option value="{{ $status }}" @selected(($record?->status ?? 'Present')===$status)>{{ $status }}</option>@endforeach</select></td><td><input class="form-control" name="attendance[{{ $student->id }}][note]" maxlength="255" value="{{ $record?->note }}" placeholder="Optional"></td></tr>
@empty<tr><td colspan="4" class="text-center text-secondary">Add students before taking attendance.</td></tr>@endforelse
</tbody></table></div>
@if($students->isNotEmpty())<button class="btn btn-primary">Save attendance</button>@endif
</form></div></div>
@endsection
