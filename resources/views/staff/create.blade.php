@extends('layouts.app')
@section('title', "Create Single Staff")

@section('main')


<div class="container mt-3">
    <div class="col-md-5">
        <a href="{{ route('staff.index') }}"
            class="btn btn-primary mb-2"> Back </a>
        <div class="card">
            <div class="card-header">
                <h4> Add New Staff </h4>
            </div>
            <div class="card-body">

                @include("validate")

                <form action="{{ route('staff.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <label for=""> <b> Name </b> </label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Email </b> </label>
                        <input type="text"
                            class="form-control"
                            name="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Cell </b> </label>
                        <input type="text"
                            class="form-control"
                            name="cell"
                            value="{{ old('cell') }}">
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