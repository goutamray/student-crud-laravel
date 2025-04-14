@extends('layouts.app')


@section('title', "Show Single Dev")


@section('main')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <a href="{{ route('student.index') }}"
                class="btn btn-primary mb-2"> Back </a>
            <div class="single-data">
                <div class="singleData">
                    <div class="card p-2">
                        <img style="max-width: 100%;"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrWw4xs7f8dW6LGlGESCOOBOZrdECgEr2ayw&s"
                            alt="">
                        <p> Name : <b> {{ $student->name }} </b> </p>
                        <p>Email : <b> {{ $student->email }} </b> </p>
                        <p>Phone : <b> {{ $student->cell }} </b> </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
