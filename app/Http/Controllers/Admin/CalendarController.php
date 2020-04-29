<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->hasRole('subscriber') || Auth::user()->hasRole('admin')):
            $model = Auth::user()->events;
            return view('backend.calendars.index', compact('model'));
        else:
            return redirect(route('admin.index'));
        endif;
    }
}

