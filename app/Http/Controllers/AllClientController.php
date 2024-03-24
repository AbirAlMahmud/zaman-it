<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Service;
use App\Models\AllClient;
use Illuminate\Http\Request;
use App\Services\TwilioService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AllClientRequest;

class AllClientController extends Controller
{
    public function index()
    {
        $user_name = Auth::user()->name;
        $role_id = Auth::user()->role_id;
        $all_clients = AllClient::all();
        return view('backend.all_clients.index', compact('all_clients', 'user_name', 'role_id'));
    }

    public function create(Request $request)
    {
        return view('frontend.index');
    }

    public function store(AllClientRequest $request)
    {
        try {
            $data = $request->all();
            AllClient::create($data);
            return redirect()->route('frontend.index')->withMessage('Client Added')->with('formData', $data);
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $all_client = AllClient::find($id);
        $services = Service::all();
        $users = User::all();
        $selectedServices['service_name'] = $all_client->service_name;
        $selectedUsers['assign_person'] = $all_client->assign_person;
        return view('backend.all_clients.edit', compact('all_client', 'selectedServices', 'selectedUsers', 'services', 'users'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');
            AllClient::where('id', $id)->update($data);

            return redirect()->route('all_client.index')->withMessage('Updated Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $all_client = AllClient::find($id);
            $all_client->delete();
            return redirect()->route('all_client.index')->withMessage('Deleted Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function sendSms(Request $request, TwilioService $twilioService)
    {
        $clientData = [
            'Name' => $request->input('client_name'),
            'Mobile' => $request->input('mobile_number'),
            'Email' => $request->input('email'),
            'Address' => $request->input('address'),
            'Service Name' => $request->input('service_name'),
            'Assign Person' => $request->input('assign_person'),
            'Note' => $request->input('note'),
            'Status' => $request->input('status'),
        ];

        $message = "Client Details:\n";
        foreach ($clientData as $key => $value) {
            $message .= "$key: $value\n";
        }

        // Replace 'RECIPIENT_PHONE_NUMBER' with the actual recipient's phone number
        $recipientPhoneNumber = $clientData['Mobile'];

        // Send SMS
        $twilioService->sendSMS($recipientPhoneNumber, $message);

        // Redirect back or to any other page after sending the SMS
        return back()->with('message', 'SMS sent successfully.');
    }

    public function report(Request $request, $id)
    {
        try {
            AllClient::where('id', $id)->update([
                'report' => $request->report,
            ]);
            return redirect()->route('all_client.index')->withMessage('Report Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function log($id)
    {
        $all_client = AllClient::find($id);
        return view('backend.all_clients.log', compact('all_client'));
    }

}
