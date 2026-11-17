@extends('layouts.app')
@section('title', 'Students')
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
  <div><h1 class="h3 mb-1">Students</h1><p class="text-secondary mb-0">Manage student records.</p></div>
  <div class="d-flex gap-2"><a href="{{ route('students.export') }}" class="btn btn-outline-success">Export CSV</a><a href="{{ route('students.create') }}" class="btn btn-primary">+ Add student</a></div>
</div>
<div class="card shadow-sm"><div class="card-body">
  <form method="GET" class="row g-2 mb-3">
    <div class="col-lg-5"><input class="form-control" name="search" value="{{ request('search') }}" placeholder="Search name, email or course"></div>
    <div class="col-md-4 col-lg-3"><select class="form-select" name="course"><option value="">All courses</option>@foreach($courses as $course)<option value="{{ $course }}" @selected(request('course')===$course)>{{ $course }}</option>@endforeach</select></div>
    <div class="col-md-4 col-lg-2"><select class="form-select" name="sort"><option value="newest" @selected($sort==='newest')>Newest</option><option value="oldest" @selected($sort==='oldest')>Oldest</option><option value="name" @selected($sort==='name')>Name A–Z</option></select></div>
    <div class="col-md-4 col-lg-2 d-grid"><button class="btn btn-dark">Filter</button></div>
  </form>
  <div class="table-responsive"><table class="table table-hover align-middle"><thead><tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th class="text-end">Actions</th></tr></thead><tbody>
  @forelse($students as $student)
    <tr><td>{{ $student->id }}</td><td class="fw-semibold">{{ $student->full_name }}</td><td>{{ $student->email }}</td><td>{{ $student->phone ?: '—' }}</td><td><span class="badge text-bg-light">{{ $student->course }}</span></td>
    <td class="text-end text-nowrap"><a class="btn btn-sm btn-outline-secondary" href="{{ route('students.show',$student) }}">View</a> <a class="btn btn-sm btn-outline-primary" href="{{ route('students.edit',$student) }}">Edit</a>
    <form class="d-inline" method="POST" action="{{ route('students.destroy',$student) }}" onsubmit="return confirm('Delete this student?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr>
  @empty<tr><td colspan="6" class="text-center text-secondary py-4">No matching students found.</td></tr>@endforelse
  </tbody></table></div>
  <div class="mt-3">{{ $students->links() }}</div>
</div></div>
@endsection
