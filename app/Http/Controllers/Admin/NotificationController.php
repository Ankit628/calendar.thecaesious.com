<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\EventNotify;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = Auth::user();
        $user->updatePushSubscription($endpoint, $key, $token);
        return response()->json(['notificationEnabled' => true], 200);
    }

    public function delete(Request $request)
    {
        $endpoint = $request->endpoint;
        $user = Auth::user();
        $user->deletePushSubscription($endpoint);
        return response()->json(['notificationEnabled' => False], 200);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function push()
    {
        $events = Auth::user()->events;
        $now = Carbon::now();
        foreach ($events as $event):
            $notify_date = getNumericValueForNotification($event['event_notify'], $event['event_startDate'], $event['event_startTime']);
            //dd($now->format('Y-m-d H:i'), $notify_date->format('Y-m-d H:i'));
            if ($now->format('Y-m-d H:i') >= $notify_date->format('Y-m-d H:i')):
                Notification::send(User::findOrFail($event['user_id']), new EventNotify);
            endif;
        endforeach;
        return redirect()->back();
    }
}
