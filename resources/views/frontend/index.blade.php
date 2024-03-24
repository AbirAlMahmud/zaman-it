<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <!-- Favicons -->
    <link href="{{ asset('ui/backend') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('ui/backend') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('ui/backend') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('ui/backend') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('ui/backend') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('ui/backend') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('ui/backend') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('ui/backend') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('ui/backend') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('ui/backend') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <div class="container p-5">
        <div class="card">
            @include('backend.layouts.includes.message')
            <div class="card-header">
                <h3 class="text-center">Entry Form</h3>
            </div>
            <div class="card-body mt-3">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('all_client.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Client Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="client_name" class="form-control">

                                    @error('client_name')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Mobile Number</label>
                                <div class="col-sm-10">
                                    <input type="tel" id="phone" name="mobile_number" class="form-control">

                                    @error('mobile_number')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control">

                                    @error('email')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control">

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
                                            <option value="{{ $service->service }}">{{ $service->service ?? '' }}
                                            </option>
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
                                    <select class="form-select" name="assign_person"
                                        aria-label="Default select example">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->name }}">{{ $user->name ?? '' }}</option>
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
                                    <textarea name="note" class="form-control" style="height: 100px"></textarea>

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
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-4">

                        <style>
                            #summary {
                                display: none;
                                border: 1px solid #ccc;
                                padding: 10px;
                                margin-bottom: 20px;
                                background-color: #f9f9f9;
                                border-radius: 5px;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            }

                            #summary p {
                                margin: 5px 0;
                            }

                            #sendWhatsapp {
                                display: none;
                                background-color: #25D366;
                                /* WhatsApp green color */
                                color: #fff;
                                /* White text color */
                                border: none;
                                padding: 10px 20px;
                                border-radius: 5px;
                                cursor: pointer;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                transition: background-color 0.3s ease;
                            }

                            #sendWhatsapp:hover {
                                background-color: #128C7E;
                                /* Darker shade of WhatsApp green on hover */
                            }
                        </style>

                        <div id="summary">
                            <p><strong>Client Name:</strong> <span id="clientName"></span></p>
                            <p><strong>Mobile Number:</strong> <span id="mobileNumber"></span></p>
                            <p><strong>Email:</strong> <span id="email"></span></p>
                            <p><strong>Address:</strong> <span id="address"></span></p>
                            <p><strong>Service Name:</strong> <span id="serviceName"></span></p>
                            <p><strong>Assign Person:</strong> <span id="assignPerson"></span></p>
                            <p><strong>Note:</strong> <span id="note"></span></p>
                            <p><strong>Status:</strong> <span id="status"></span></p>
                        </div>


                        <button id="sendWhatsapp" class="btn btn-primary" style="display: none;">Send via
                            WhatsApp</button>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var formData = @json(session('formData'));

                                // Generate summary
                                var summary = "Client Name: " + formData.client_name + "\n" +
                                    "Mobile Number: " + formData.mobile_number + "\n" +
                                    "Email: " + formData.email + "\n" +
                                    "Address: " + formData.address + "\n" +
                                    "Service Name: " + formData.service_name + "\n" +
                                    "Assign Person: " + formData.assign_person + "\n" +
                                    "Note: " + formData.note + "\n" +
                                    "Status: " + formData.status;

                                // Display summary
                                document.getElementById('summary').style.display = 'block';
                                document.getElementById('summary').innerText = summary;

                                // Display WhatsApp button
                                document.getElementById('sendWhatsapp').style.display = 'block';

                                // WhatsApp Button Click Event
                                document.getElementById('sendWhatsapp').addEventListener('click', function() {
                                    var phoneNumber = formData.mobile_number;
                                    var whatsappUrl = 'https://api.whatsapp.com/send?phone=' + phoneNumber + '&text=' +
                                        encodeURIComponent(summary);
                                    window.open(whatsappUrl, '_blank');
                                });
                            });
                        </script>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ asset('ui/backend') }}/#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('ui/backend') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('ui/backend') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('ui/backend') }}/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ asset('ui/backend') }}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('ui/backend') }}/assets/vendor/quill/quill.min.js"></script>
    <script src="{{ asset('ui/backend') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('ui/backend') }}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('ui/backend') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('ui/backend') }}/assets/js/main.js"></script>

    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "bd", // Set the default country to Bangladesh
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>

</body>

</html>
