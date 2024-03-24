@extends('backend.layouts.master')

@section('main_content')

    @include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header">Edit Service</div>
            <div class="card-body">
                <form action="{{ route('service.update', $service->id) }}" method="POST">
                    @csrf
                    <div>
                        <label for="service" class="form-label">Service Name</label>
                        <input type="text" name="service" class="form-control" value="{{ $service->service }}">

                        @error('service')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror

                    </div>
                    <button class="btn btn-sm btn-primary mt-3" type="submit"><i class="bi bi-check"></i> Save</button>
                    <a class="btn btn-sm btn-danger mt-3" href="{{ route('service.index') }}"><i class="bi bi-x"></i>
                        Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
