@extends('backend.layouts.master')

@section('main_content')
    @include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Assign Person Lists

            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($users as $user)
                            @if ($role_id == 1)
                                <tr>
                                    <th scope="row">{{ $sl++ }}</th>
                                    <td>{{ $user->name ?? '' }}</td>
                                    <td>{{ $user->mobile ?? '' }}</td>
                                    <td>{{ $user->email ?? '' }}</td>
                                    <td>{{ $user->password ?? '' }}</td>
                                    <td>

                                        <a class="btn btn-sm btn-warning" href="{{ route('profile.edit') }}"><i
                                                class="bi bi-pen"></i></a>

                                        <form action="{{ route('assign_person.destroy', $user->id) }}" method="POST"
                                            style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @elseif ($user_name == $user->name)
                                <tr>
                                    <th scope="row">{{ $sl++ }}</th>
                                    <td>{{ $user->name ?? '' }}</td>
                                    <td>{{ $user->mobile ?? '' }}</td>
                                    <td>{{ $user->email ?? '' }}</td>
                                    <td>{{ $user->password ?? '' }}</td>
                                    <td>

                                        <a class="btn btn-sm btn-warning" href="{{ route('profile.edit') }}"><i
                                                class="bi bi-pen"></i></a>

                                        <form action="{{ route('assign_person.destroy', $user->id) }}" method="POST"
                                            style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
