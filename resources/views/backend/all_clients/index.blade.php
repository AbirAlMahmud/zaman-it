@extends('backend.layouts.master')

@section('main_content')
    @include('backend.layouts.includes.message')


    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <div class="container">
        <div class="card">
            <div class="card-header d-flex">
                Client Lists

                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('frontend.index') }}"> <i class="bi bi-plus"></i>
                    Add New Client</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Mobile Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Assign Person</th>
                            <th scope="col">Note</th>
                            <th scope="col">Status</th>
                            <th scope="col">Report</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($all_clients as $all_client)
                            @if ($role_id == 1)
                                <tr>
                                    <th scope="row">{{ $sl++ }}</th>
                                    <td>{{ $all_client->client_name ?? '' }}</td>
                                    <td>{{ $all_client->mobile_number ?? '' }}</td>
                                    <td>{{ $all_client->email ?? '' }}</td>
                                    <td>{{ $all_client->address ?? '' }}</td>
                                    <td>{{ $all_client->service_name ?? '' }}</td>
                                    <td>{{ $all_client->assign_person ?? '' }}</td>
                                    <td>{{ $all_client->note ?? '' }}</td>
                                    <td>{{ $all_client->status ?? '' }}</td>
                                    <td>{{ $all_client->report ?? '' }}</td>
                                    <td>

                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('all_client.edit', $all_client->id) }}"><i
                                                class="bi bi-pen"></i></a>

                                        <a id="callButton" class="btn btn-sm btn-warning"
                                            href="tel:{{ $all_client->mobile_number ?? '' }}"><i
                                                class="bi bi-telephone-inbound"></i></a>


                                        <a type="button" class="btn btn-sm btn-warning mt-2" data-toggle="modal"
                                            data-target="#myModal{{ $all_client->id }}">
                                            <i class="bi bi-newspaper"></i>
                                        </a>


                                        <div class="modal" id="myModal{{ $all_client->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Write Report</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                        <form action="{{ route('all_client.report', $all_client->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div>
                                                                <label class="form-label">Report</label>
                                                                <textarea name="report" class="form-control" cols="30" rows="10"></textarea>

                                                                @error('report')
                                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                            <button class="btn btn-sm btn-primary mt-3" type="submit"><i
                                                                    class="bi bi-check"></i> Save</button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <a class="btn btn-sm btn-warning mt-2"
                                            href="mailto:{{ $all_client->email ?? '' }}?subject=Client%20Information&body=Client%20Name:%20{{ $all_client->client_name ?? '' }}%0AMobile%20Number:%20{{ $all_client->mobile_number ?? '' }}%0AEmail:%20{{ $all_client->email ?? '' }}%0AAddress:%20{{ $all_client->address ?? '' }}%0AService%20Name:%20{{ $all_client->service_name ?? '' }}%0AAssign%20Person:%20{{ $all_client->assign_person ?? '' }}%0ANote:%20{{ $all_client->note ?? '' }}%0AStatus:%20{{ $all_client->status ?? '' }}"><i
                                                class="bi bi-envelope"></i></a>

                                        <form id="whatsappForm{{ $sl }}" action="https://wa.me/" method="get">
                                            <input type="hidden" name="text"
                                                value="Client Name: {{ $all_client->client_name ?? '' }}%0A
                                                    Mobile Number: {{ $all_client->mobile_number ?? '' }}%0A
                                                    Email: {{ $all_client->email ?? '' }}%0A
                                                    Address: {{ $all_client->address ?? '' }}%0A
                                                    Service Name: {{ $all_client->service_name ?? '' }}%0A
                                                    Assign Person: {{ $all_client->assign_person ?? '' }}%0A
                                                    Note: {{ $all_client->note ?? '' }}%0A
                                                    Status: {{ $all_client->status ?? '' }}">
                                            <a class="btn btn-sm btn-warning mt-2" href="#"
                                                onclick="document.getElementById('whatsappForm{{ $sl }}').submit();"><i
                                                    class="bi bi-whatsapp"></i></a>
                                        </form>

                                        <a class="btn btn-sm btn-warning mt-2"
                                            href="{{ route('send.sms', ['client_name' => $all_client->client_name, 'mobile_number' => $all_client->mobile_number, 'email' => $all_client->email, 'address' => $all_client->address, 'service_name' => $all_client->service_name, 'assign_person' => $all_client->assign_person, 'note' => $all_client->note, 'status' => $all_client->status]) }}"><i
                                                class="bi bi-chat-dots"></i></a>

                                        <a class="btn btn-sm btn-warning mt-2"
                                            href="{{ route('all_client.log', $all_client->id) }}"><i
                                                class="bi bi-book"></i></a>

                                        <a class="btn btn-sm btn-warning mt-2" id="urgentMeetingButton"
                                            data-client-id="{{ $all_client->id }}"><i class="bi bi-alarm"></i></a>

                                        <a class="btn btn-sm btn-warning mt-2"
                                            href="{{ route('all_client.edit', $all_client->id) }}"><i
                                                class="bi bi-arrow-bar-right"></i></a>

                                        <form action="{{ route('all_client.destroy', $all_client->id) }}" method="POST"
                                            style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger mt-2" type="submit"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @elseif ($user_name == $all_client->assign_person)
                                <tr>
                                    <th scope="row">{{ $sl++ }}</th>
                                    <td>{{ $all_client->client_name ?? '' }}</td>
                                    <td>{{ $all_client->mobile_number ?? '' }}</td>
                                    <td>{{ $all_client->email ?? '' }}</td>
                                    <td>{{ $all_client->address ?? '' }}</td>
                                    <td>{{ $all_client->service_name ?? '' }}</td>
                                    <td>{{ $all_client->assign_person ?? '' }}</td>
                                    <td>{{ $all_client->note ?? '' }}</td>
                                    <td>{{ $all_client->status ?? '' }}</td>
                                    <td>{{ $all_client->report ?? '' }}</td>
                                    <td>

                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('all_client.edit', $all_client->id) }}"><i
                                                class="bi bi-pen"></i></a>

                                        <a id="callButton" class="btn btn-sm btn-warning"
                                            href="tel:{{ $all_client->mobile_number ?? '' }}"><i
                                                class="bi bi-telephone-inbound"></i></a>


                                        <a type="button" class="btn btn-sm btn-warning mt-2" data-toggle="modal"
                                            data-target="#myModal{{ $all_client->id }}">
                                            <i class="bi bi-newspaper"></i>
                                        </a>


                                        <div class="modal" id="myModal{{ $all_client->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Write Report</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                        <form action="{{ route('all_client.report', $all_client->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div>
                                                                <label class="form-label">Report</label>
                                                                <textarea name="report" class="form-control" cols="30" rows="10"></textarea>

                                                                @error('report')
                                                                    <div class="text-danger mt-3">{{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                            <button class="btn btn-sm btn-primary mt-3" type="submit"><i
                                                                    class="bi bi-check"></i> Save</button>
                                                        </form>
                                                    </div>

                                                    <!-- Modal Footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <a class="btn btn-sm btn-warning mt-2"
                                            href="mailto:{{ $all_client->email ?? '' }}?subject=Client%20Information&body=Client%20Name:%20{{ $all_client->client_name ?? '' }}%0AMobile%20Number:%20{{ $all_client->mobile_number ?? '' }}%0AEmail:%20{{ $all_client->email ?? '' }}%0AAddress:%20{{ $all_client->address ?? '' }}%0AService%20Name:%20{{ $all_client->service_name ?? '' }}%0AAssign%20Person:%20{{ $all_client->assign_person ?? '' }}%0ANote:%20{{ $all_client->note ?? '' }}%0AStatus:%20{{ $all_client->status ?? '' }}"><i
                                                class="bi bi-envelope-fill"></i></a>

                                        <form id="whatsappForm{{ $sl }}" action="https://wa.me/"
                                            method="get">
                                            <input type="hidden" name="text"
                                                value="Client Name: {{ $all_client->client_name ?? '' }}%0A
                                                    Mobile Number: {{ $all_client->mobile_number ?? '' }}%0A
                                                    Email: {{ $all_client->email ?? '' }}%0A
                                                    Address: {{ $all_client->address ?? '' }}%0A
                                                    Service Name: {{ $all_client->service_name ?? '' }}%0A
                                                    Assign Person: {{ $all_client->assign_person ?? '' }}%0A
                                                    Note: {{ $all_client->note ?? '' }}%0A
                                                    Status: {{ $all_client->status ?? '' }}">
                                            <a class="btn btn-sm btn-warning mt-2" href="#"
                                                onclick="document.getElementById('whatsappForm{{ $sl }}').submit();"><i
                                                    class="bi bi-whatsapp"></i></a>
                                        </form>

                                        <a class="btn btn-sm btn-warning mt-2" href="{{ route('send.sms') }}"><i
                                                class="bi bi-chat-dots"></i></a>

                                        <a class="btn btn-sm btn-warning mt-2"
                                            href="{{ route('all_client.edit', $all_client->id) }}"><i
                                                class="bi bi-book-fill"></i></a>

                                        <a class="btn btn-sm btn-warning mt-2"
                                            href="{{ route('all_client.edit', $all_client->id) }}"><i
                                                class="bi bi-chat-dots"></i></a>

                                        <a class="btn btn-sm btn-warning mt-2"
                                            href="{{ route('all_client.edit', $all_client->id) }}"><i
                                                class="bi bi-arrow-bar-right"></i></a>

                                        <form action="{{ route('all_client.destroy', $all_client->id) }}" method="POST"
                                            style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger mt-2" type="submit"><i
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

    <script>
        document.getElementById('callButton').addEventListener('click', function() {
            window.location.href = 'tel:+1234567890'; // Replace +1234567890 with the phone number you want to call
        });
    </script>


    <script>
        document.getElementById('urgentMeetingButton').addEventListener('click', function() {
            var clientId = this.getAttribute('data-client-id');
            // Send AJAX request to the server
            fetch(`/notify/${clientId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: 'Urgent Meeting'
                    })
                })
                .then(response => {
                    // Handle response
                    if (response.ok) {
                        alert('Push notification sent successfully');
                    } else {
                        alert('Failed to send push notification');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error occurred while sending push notification');
                });
        });
    </script>
@endsection
