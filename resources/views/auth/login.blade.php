@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px">
    <h3 class="mb-4">Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
        <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
