@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
<div class="row justify-content-center"><div class="col-lg-7"><a href="{{ route('students.index') }}" class="text-decoration-none">← Back to students</a>
<div class="card shadow-sm mt-3"><div class="card-body p-4"><h1 class="h3 mb-3">Edit student</h1>
<form method="POST" action="{{ route('students.update',$student) }}">@csrf @method('PUT') @include('students._form')<button class="btn btn-primary">Update student</button> <a class="btn btn-outline-secondary" href="{{ route('students.index') }}">Cancel</a></form>
</div></div></div></div>
@endsection
