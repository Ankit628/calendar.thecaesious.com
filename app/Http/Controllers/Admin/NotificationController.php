<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Event;
use App\Notifications\EventNotify;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $id)
    {
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $event = Event::findOrFail($id);
        $event->updatePushSubscription($endpoint, $key, $token);
        return response()->json(['notificationEnabled' => true], 200);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function push()
    {
        Notification::send(User::all(), new EventNotify);
        return redirect()->back();
    }
}
