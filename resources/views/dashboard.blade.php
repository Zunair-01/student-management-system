@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
  <div><h1 class="h3 mb-1">Dashboard</h1><p class="text-secondary mb-0">Overview of your student portal.</p></div>
  <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add student</a>
</div>
<div class="row g-3 mb-4">
  <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-secondary small">Total students</div><div class="stat-number">{{ $stats['students'] }}</div></div></div></div>
  <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-secondary small">Courses</div><div class="stat-number">{{ $stats['courses'] }}</div></div></div></div>
  <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-secondary small">Added this month</div><div class="stat-number">{{ $stats['new_this_month'] }}</div></div></div></div>
  <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-secondary small">Fees collected</div><div class="stat-number fs-4">PKR {{ number_format((float)$stats['fees'], 2) }}</div></div></div></div>
</div>
<div class="card shadow-sm"><div class="card-body">
  <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h5 mb-0">Recently added students</h2><a href="{{ route('students.index') }}">View all</a></div>
  <div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Name</th><th>Email</th><th>Course</th><th>Added</th></tr></thead><tbody>
  @forelse($recentStudents as $student)
    <tr><td>{{ $student->full_name }}</td><td>{{ $student->email }}</td><td>{{ $student->course }}</td><td>{{ $student->created_at->format('d M Y') }}</td></tr>
  @empty
    <tr><td colspan="4" class="text-center text-secondary py-4">No students yet. Add your first student.</td></tr>
  @endforelse
  </tbody></table></div>
</div></div>
@endsection
