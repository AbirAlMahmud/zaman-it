@extends('backend.layouts.master')

@section('main_content')
    @include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Service Lists

                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('service.create') }}"> <i class="bi bi-plus"></i>
                    Add New service</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{ $service->service ?? '' }}</td>
                                <td>

                                    <a class="btn btn-sm btn-warning" href="{{ route('service.edit', $service->id) }}"><i
                                            class="bi bi-pen"></i></a>

                                    <form action="{{ route('service.destroy', $service->id) }}" method="POST"
                                        style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
