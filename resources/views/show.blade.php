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
                        <img style="max-width: 100%; height: 400px; object-fit:cover; border-radius:8px;"
                            src="{{ asset('storage/students/' . $student->photo) }}"
                            alt="">
                        <p class="mt-3"> Name : <b> {{ $student->name }} </b> </p>
                        <p>Email : <b> {{ $student->email }} </b> </p>
                        <p>Phone : <b> {{ $student->cell }} </b> </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
