@extends('layouts.app')

@section('title', "Update Single Student")

@section('main')

<div class="container mt-5">
    <div class="col-md-6">
        <a href="{{ route('student.index') }}"
            class="btn btn-secondary mb-3">← Back to List</a>
        <div class="card">
            <div class="card-header">
                <h2>Update Student</h2>
            </div>
            <div class="card-body">

                {{-- Error Message --}}
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show"
                    role="alert">
                    {{ session('error') }}
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                @endif

                {{-- Success Message --}}
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show"
                    role="alert">
                    {{ session('success') }}
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                @endif

                {{-- Form Start --}}
                <form action="{{ route('student.update', $edit_data->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            value="{{ $edit_data->name }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                            name="email"
                            class="form-control"
                            value="{{ $edit_data->email }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cell</label>
                        <input type="text"
                            name="cell"
                            class="form-control"
                            value="{{ $edit_data->cell }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text"
                            name="username"
                            class="form-control"
                            value="{{ $edit_data->username }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Education</label>
                        <select name="edu"
                            class="form-control"
                            required>
                            <option value="">-- Select --</option>
                            <option value="SSC"
                                @if($edit_data->edu == 'SSC') selected @endif>SSC</option>
                            <option value="HSC"
                                @if($edit_data->edu == 'HSC') selected @endif>HSC</option>
                            <option value="JSC"
                                @if($edit_data->edu == 'JSC') selected @endif>JSC</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit"
                            class="btn btn-primary">Update Student</button>
                    </div>
                </form>
                {{-- Form End --}}
            </div>
        </div>
    </div>
</div>

@endsection
