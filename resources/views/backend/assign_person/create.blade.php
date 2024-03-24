@extends('backend.layouts.master')

@section('main_content')
    @include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header">Create Assign Person</div>
            <div class="card-body">
                <form action="{{ route('assign_person.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="assign_person" class="form-label">Assign Person</label>
                        <input type="text" name="assign_person" class="form-control">

                        @error('assign_person')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror

                    </div>
                    <button class="btn btn-sm btn-primary mt-3" type="submit"><i class="bi bi-check"></i> Save</button>
                    <a class="btn btn-sm btn-danger mt-3" href="{{ route('assign_person.index') }}"><i class="bi bi-x"></i>
                        Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
