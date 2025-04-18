@extends('layouts.app')

@section('title', "Update Single Student")

@section('main')

<div class="container mt-5">
    <div class="col-md-6">
        <a href="{{ route('student.index') }}"
            class="btn btn-secondary mb-3"> ← Back to List</a>
        <div class="card">
            <div class="card-header">
                <h4>Update Student</h4>
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
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label"><b> Name </b></label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            value="{{ $edit_data->name }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b> Email </b></label>
                        <input type="email"
                            name="email"
                            class="form-control"
                            value="{{ $edit_data->email }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b> Cell </b></label>
                        <input type="text"
                            name="cell"
                            class="form-control"
                            value="{{ $edit_data->cell }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b> Username </b></label>
                        <input type="text"
                            name="username"
                            class="form-control"
                            value="{{ $edit_data->username }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b> Age </b></label>
                        <input type="text"
                            name="age"
                            class="form-control"
                            value="{{ $edit_data->age }}">
                    </div>
                    <div class="my-2">
                        <label for=""><b>Gender</b></label><br>
                        <label>
                            <input type="radio"
                                name="gender"
                                value="Male"
                                {{ $edit_data->gender === 'Male' ? 'checked' : '' }}> Male
                        </label>
                        <label>
                            <input type="radio"
                                name="gender"
                                value="Female"
                                {{ $edit_data->gender === 'Female' ? 'checked' : '' }}> Female
                        </label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b> Education </b></label>
                        <select name="edu"
                            class="form-control form-select">
                            <option value="">-- Select --</option>
                            <option value="SSC"
                                @if($edit_data->edu == 'SSC') selected @endif>SSC</option>
                            <option value="HSC"
                                @if($edit_data->edu == 'HSC') selected @endif>HSC</option>
                            <option value="JSC"
                                @if($edit_data->edu == 'JSC') selected @endif>JSC</option>
                        </select>
                    </div>
                    <div class="my-2">
                        <label for=""><b>Select Your Courses</b></label><br>
                        @foreach($course as $single_course)
                        <label>
                            <input type="checkbox"
                                name="course[]"
                                value="{{ $single_course }}"
                                @if(in_array($single_course,
                                json_decode($edit_data->course, true) ?? []))
                            checked
                            @endif
                            > {{ $single_course }}
                        </label>
                        @endforeach
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Profile Photo </b> </label>
                        <input type="file"
                            name="new_photo"
                            class="form-control mb-2">
                        <input type="hidden"
                            name="old_photo"
                            class="form-control mb-2"
                            value="{{ $edit_data->photo }}">

                        <div class="form-group">
                            <img style="max-width: 100%; height: 300px; object-fit:cover; border-radius:8px;"
                                src="{{ asset('storage/students/' . $edit_data->photo) }}"
                                alt="">
                        </div>
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
