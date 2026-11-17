@extends('layouts.app')
@section('title', 'Add Student')
@section('content')
<div class="row justify-content-center"><div class="col-lg-7"><a href="{{ route('students.index') }}" class="text-decoration-none">← Back to students</a>
<div class="card shadow-sm mt-3"><div class="card-body p-4"><h1 class="h3 mb-3">Add student</h1>
<form method="POST" action="{{ route('students.store') }}">@csrf @include('students._form')<button class="btn btn-primary">Save student</button> <a class="btn btn-outline-secondary" href="{{ route('students.index') }}">Cancel</a></form>
</div></div></div></div>
@endsection
