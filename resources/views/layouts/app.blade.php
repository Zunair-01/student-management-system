<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background:#f4f6fb}.navbar-brand{font-weight:700;letter-spacing:.2px}
        .card{border:0;border-radius:14px}.stat-number{font-size:2rem;font-weight:700;color:#2457d6}
        .table thead th{font-size:.82rem;color:#667085;text-transform:uppercase;letter-spacing:.03em}
        .form-control,.form-select{padding:.65rem .8rem}.content-wrap{min-height:75vh}
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Student Portal</a>
    @auth
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <div class="navbar-nav me-auto">
        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="nav-link" href="{{ route('students.index') }}">Students</a>
        <a class="nav-link" href="{{ route('attendance.index') }}">Attendance</a>
        <a class="nav-link" href="{{ route('fees.index') }}">Fees</a>
      </div>
      <div class="d-flex align-items-center gap-3">
        <span class="text-white small">{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-sm btn-outline-light">Logout</button></form>
      </div>
    </div>
    @endauth
  </div>
</nav>
<main class="container py-4 content-wrap">
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button class="btn-close" data-bs-dismiss="alert"></button></div>@endif
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    @yield('content')
</main>
<footer class="border-top py-3 text-center text-secondary small">Student Management System · Laravel & MySQL</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
