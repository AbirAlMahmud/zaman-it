@extends('backend.layouts.master')

@section('main_content')
    @include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header">Edit Service</div>
            <div class="card-body">



                <form action="{{ route('all_client.update', $all_client->id) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Client Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="client_name" value="{{ $all_client->client_name }}"
                                class="form-control">

                            @error('client_name')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="col-sm-10">
                            <input type="tel" id="phone" name="mobile_number"
                                value="{{ $all_client->mobile_number }}" class="form-control">

                            @error('mobile_number')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{ $all_client->email }}" class="form-control">

                            @error('email')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" value="{{ $all_client->address }}" class="form-control">

                            @error('address')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select Service Name</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="service_name" aria-label="Default select example">
                                @foreach ($services as $service)
                                    <option value="{{ $service->service }}">
                                        {{ $service->service ?? '' }}</option>
                                @endforeach
                            </select>

                            @error('service_name')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select Assign Person</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="assign_person" aria-label="Default select example">
                                @foreach ($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('assign_person')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Note</label>
                        <div class="col-sm-10">
                            <textarea name="note" value="{{ $all_client->note }}" class="form-control" style="height: 100px">{{ $all_client->note }}</textarea>

                            @error('note')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Select Status</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option value="Regular Query">Regular Query</option>
                                <option value="Urgent Meeting">Urgent Meeting</option>
                            </select>

                            @error('status')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Submit Button</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                            <a class="btn btn btn-danger" href="{{ route('all_client.index') }}"><i
                                    class="bi bi-x"></i>
                                Cancel</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
