@extends('layouts.app')
@section('title', 'Student Details')
@section('content')
<div class="row justify-content-center"><div class="col-lg-7"><a href="{{ route('students.index') }}" class="text-decoration-none">← Back to students</a>
<div class="card shadow-sm mt-3"><div class="card-body p-4">
<div class="d-flex justify-content-between align-items-start mb-4"><div><div class="text-secondary small">Student #{{ $student->id }}</div><h1 class="h3 mb-0">{{ $student->full_name }}</h1></div><a class="btn btn-outline-primary" href="{{ route('students.edit',$student) }}">Edit</a></div>
<dl class="row mb-0"><dt class="col-sm-4 text-secondary">Email</dt><dd class="col-sm-8">{{ $student->email }}</dd><dt class="col-sm-4 text-secondary">Phone</dt><dd class="col-sm-8">{{ $student->phone ?: 'Not provided' }}</dd><dt class="col-sm-4 text-secondary">Course</dt><dd class="col-sm-8">{{ $student->course }}</dd><dt class="col-sm-4 text-secondary">Registered</dt><dd class="col-sm-8">{{ $student->created_at->format('d M Y, h:i A') }}</dd></dl>
</div></div></div></div>
@endsection
