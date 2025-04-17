@extends('layouts.app')
@section('title', "Create Single Dev")

@section('main')


<div class="container mt-3">
    <div class="col-md-5">
        <a href="{{ route('student.index') }}"
            class="btn btn-primary mb-2"> Back </a>
        <div class="card">
            <div class="card-header">
                <h4> Add New Student</h4>
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
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <label for=""> <b> Name </b> </label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Email </b> </label>
                        <input type="text"
                            class="form-control"
                            name="email"
                            value="{{ old('email') }}">
                        @error('email')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Age </b> </label>
                        <input type="text"
                            class="form-control"
                            name="age"
                            value="{{ old('age') }}">
                        @error('age')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Cell </b> </label>
                        <input type="text"
                            class="form-control"
                            name="cell"
                            value="{{ old('cell') }}">
                        @error('cell')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> <b> UserName </b> </label>
                        <input type="text"
                            class="form-control"
                            name="username"
                            value="{{ old('username') }}">
                        @error('username')
                        <p class="text-danger"> * Required </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Education </b> </label>
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
                        <label for=""> <b> Gender </b> </label> <br>
                        <label>
                            <input type="radio"
                                name="gender"
                                value="Male"
                                id=""> Male
                        </label>
                        <label>
                            <input type="radio"
                                name="gender"
                                value="Female"
                                id=""> Female
                        </label>
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Select Your Courses </b> </label> <br>
                        <label>
                            <input type="checkbox"
                                name="course[]"
                                value="Mern Stack"> Mern Stack
                        </label>
                        <label>
                            <input type="checkbox"
                                name="course[]"
                                value="React Native"> React Native
                        </label>
                        <label>
                            <input type="checkbox"
                                name="course[]"
                                class="ml-5"
                                value="Laravel"> Laravel
                        </label> <br>
                        <label>
                            <input type="checkbox"
                                name="course[]"
                                value="Wordpress"> Wordpress
                        </label>
                        <label>
                            <input type="checkbox"
                                name="course[]"
                                value="BlockChain"> BlockChain
                        </label>
                        <label>
                            <input type="checkbox"
                                name="course[]"
                                value="Shopify"> Shopify
                        </label>
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Profile Photo </b> </label>
                        <input type="file"
                            class="form-control"
                            name="photo">
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
