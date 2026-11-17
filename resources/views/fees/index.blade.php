@extends('layouts.app')
@section('title', 'Fee Management')
@section('content')
<div class="mb-3"><h1 class="h3 mb-1">Fee management</h1><p class="text-secondary mb-0">Record and review student payments.</p></div>
<div class="card shadow-sm mb-4"><div class="card-body"><div class="text-secondary small">Total fees collected</div><div class="stat-number">PKR {{ number_format((float)$totalCollected,2) }}</div></div></div>
<div class="row g-4"><div class="col-lg-4"><div class="card shadow-sm"><div class="card-body"><h2 class="h5 mb-3">Record payment</h2>
<form method="POST" action="{{ route('fees.store') }}">@csrf
<div class="mb-3"><label class="form-label">Student</label><select class="form-select" name="student_id" required><option value="">Choose student</option>@foreach($students as $student)<option value="{{ $student->id }}">{{ $student->full_name }}</option>@endforeach</select></div>
<div class="mb-3"><label class="form-label">Amount (PKR)</label><input class="form-control" type="number" min="0.01" step="0.01" name="amount" required></div>
<div class="mb-3"><label class="form-label">Payment date</label><input class="form-control" type="date" name="payment_date" value="{{ today()->toDateString() }}" required></div>
<div class="mb-3"><label class="form-label">Description</label><input class="form-control" name="description" maxlength="180" placeholder="Semester fee"></div>
<button class="btn btn-primary w-100" @disabled($students->isEmpty())>Save payment</button>
</form></div></div></div>
<div class="col-lg-8"><div class="card shadow-sm"><div class="card-body"><h2 class="h5 mb-3">Recent payments</h2><div class="table-responsive"><table class="table align-middle"><thead><tr><th>Student</th><th>Date</th><th>Description</th><th class="text-end">Amount</th></tr></thead><tbody>
@forelse($payments as $payment)<tr><td>{{ $payment->student->full_name }}</td><td>{{ $payment->payment_date->format('d M Y') }}</td><td>{{ $payment->description ?: '—' }}</td><td class="text-end">{{ number_format((float)$payment->amount,2) }}</td></tr>@empty<tr><td colspan="4" class="text-center text-secondary">No payments recorded yet.</td></tr>@endforelse
</tbody></table></div>{{ $payments->links() }}</div></div></div></div>
@endsection
