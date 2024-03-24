@extends('backend.layouts.master')

@section('main_content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Log Detail Information
        </div>
        <div class="card-body">
            <p>Assign Person : {{ $all_client->assign_person ?? '' }}</p>
            <p>Created At : {{ $all_client->created_at ?? '' }}</p>
            <p>Updated At : {{ $all_client->updated_at ?? '' }}</p>
        </div>
        <div class="card-footer m-auto">
            <a class="btn btn-sm btn-primary" href="{{ route('all_client.index') }}"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>

@endsection
