@extends('layouts.app')


@section('main')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('student.create') }}"
                class="btn btn-primary mb-2"> Add New Dev </a>
            <div class="row">
                <div class="col-md-4">
                    @if (session('success'))
                    <p class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button"
                            class="btn-close"
                            aria-label="Close"
                            data-bs-dismiss="alert"></button>
                    </p>
                    @endif
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="text-center"> All Developers Data </h2>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> #ID </th>
                                <th> Photo </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Cell </th>
                                <th> Age </th>
                                <th> Education </th>
                                <th> Gender </th>
                                <th> Username </th>
                                <th> Courses </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr class="align-middle">
                                <td>{{ $loop->index + 1 }} </td>
                                <td>
                                    <img src="{{ asset('storage/students/' . $student->photo) }}"
                                        alt=""
                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%">
                                </td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->cell }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->edu }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->username }}</td>
                                <td>
                                    @php
                                    $courses = json_decode($student->course, true);
                                    @endphp

                                    <ul>
                                        @if (is_array($courses))
                                        @forelse($courses as $item)
                                        <li>{{ $item }}</li>
                                        @empty
                                        <li>No Course Found</li>
                                        @endforelse
                                        @else
                                        <li>No Course Found</li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('student.show', $student->id) }}"
                                        class="btn btn-info"> View </a>
                                    <a class="btn btn-warning"
                                        href="{{ route('student.edit', $student->id) }}"> Edit </a>
                                    <a class="btn btn-danger delete-btn "
                                        href="{{ route('student.destroy', $student->id) }}">Delete</a>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td class="text-center"
                                    colspan="11">
                                    <h4> No Student Found! </h4>
                                </td>
                            </tr>

                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection