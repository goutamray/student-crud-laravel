@extends('layouts.app')
@section('title', "Edit Staff")

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

                <form action="{{ route('staff.update', $staff -> id ) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="my-2">
                        <label for=""> <b> Name </b> </label>
                        <input type="text"
                            class="form-control"
                            name="name"
                            value="{{ $staff -> name }}">
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Email </b> </label>
                        <input type="text"
                            class="form-control"
                            name="email"
                            value="{{ $staff -> email }}">
                    </div>
                    <div class="my-2">
                        <label for=""> <b> Cell </b> </label>
                        <input type="text"
                            class="form-control"
                            name="cell"
                            value="{{ $staff -> cell }}">
                    </div>
                    <div class="my-2">
                        <input type="submit"
                            value="Update"
                            class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection