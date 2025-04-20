@extends('layouts.app')


@section('main')



<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('staff.create') }}"
                class="btn btn-primary mb-2"> Add New Staff </a>
            <div class="row">
                <div class="col-md-4">
                    @include("validate")
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="text-center"> All Staff Data </h2>
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
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($staffs as $staff)
                            <tr class="align-middle">
                                <td>{{ $loop->index + 1 }} </td>
                                <td>
                                    <img src="{{ asset('storage/staffs/' . $staff->photo) }}"
                                        alt=""
                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%">
                                </td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>{{ $staff->cell }}</td>
                                <td>
                                    <a href="{{ route('staff.show', $staff -> id) }}"
                                        class="btn btn-info"> View </a>

                                    <form action="{{ route('staff.edit', $staff -> id) }}"
                                        class="d-inline">
                                        <button class="btn btn-warning"
                                            type="submit"> Edit </button>

                                    </form>

                                    <form action="{{ route('staff.destroy', $staff -> id) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger delete-btn "
                                            type="submit">Delete</button>
                                    </form>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td class="text-center"
                                    colspan="4">
                                    <h4> No Staff Found! </h4>
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
