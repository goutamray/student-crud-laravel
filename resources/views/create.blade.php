@extends('layouts.app')

@section('title', "Create Single Dev")

@section('main')


<div class="container mt-5">
    <div class="col-md-5">
        <a href="{{ route('student.index') }}"
            class="btn btn-primary mb-2"> Back </a>
        <div class="card">
            <div class="card-header">
                <h2> Add New Student</h2>
            </div>
            <div class="card-body">

                @if (session('error'))
                <p class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button"
                        class="btn-close"
                        aria-label="Close"
                        data-bs-dismiss="alert"></button>
                </p>
                @endif

                {{-- Keep this for validation errors --}}
                @if($errors->any())
                <p class="alert alert-danger alert-dismissible fade show">
                    {{ $errors->first() }}
                    <button type="button"
                        class="btn-close"
                        aria-label="Close"
                        data-bs-dismiss="alert"></button>
                </p>
                @endif


                @if (session('success'))
                <p class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button"
                        class="btn-close"
                        aria-label="Close"
                        data-bs-dismiss="alert"></button>
                </p>
                @endif


                <!-- @if($errors->any())

                <p class="alert alert-danger alert-dismissible fade show"> {{ $errors->first() }} <button type="button"
                        class="btn-close"
                        aria-label="Close"
                        data-bs-dismiss="alert"></button></p>
                @endif -->

                <!-- @if($errors->any())

                <p class="alert alert-danger alert-dismissible fade show"> All fields are Required<button type="button"
                        class="btn-close"
                        aria-label="Close"
                        data-bs-dismiss="alert"></button></p>
                @endif -->

                <form action="{{ route('student.store') }}"
                    method="POST">
                    @csrf
                    <div class="my-2">
                        <label for=""> Name </label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> Email </label>
                        <input type="text"
                            class="form-control"
                            name="email"
                            value="{{ old('email') }}">
                        @error('email')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> Cell </label>
                        <input type="text"
                            class="form-control"
                            name="cell"
                            value="{{ old('cell') }}">
                        @error('cell')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> UserName </label>
                        <input type="text"
                            class="form-control"
                            name="username"
                            value="{{ old('username') }}">
                        @error('username')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> Education </label>
                        <select name="edu"
                            class="form-control"
                            id="">
                            <option value="">-- Select --</option>
                            <option value="SSC"> SSC </option>
                            <option value="HSC"> HSC </option>
                            <option value="JSC"> JSC </option>
                        </select>
                    </div>

                    <div class="my-2">
                        <input type="submit"
                            value="Sign Up"
                            class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection