<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification(Request $request, $clientId)
    {
        // Get user data associated with the client (assuming a relationship)
        $users = User::whereHas('clients', function ($query) use ($clientId) {
            $query->where('id', $clientId);
        })->get();

        // Send push notifications to users
        foreach ($users as $user) {
            // Use your preferred push notification service to send notifications
            // Example using FCM or Pusher
            // Replace with your actual code for sending notifications
        }

        return response()->json(['message' => 'Push notification sent'], 200);
    }
}
