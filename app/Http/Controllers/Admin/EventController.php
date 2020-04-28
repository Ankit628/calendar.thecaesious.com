<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View\
     */
    public function index()
    {
        $model = Auth::user()->events;
        return view('backend.events.index', compact('model'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.events.create');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if (($request->get('event_recursion')) == 'null'):
            $input['event_repeating_days'] = null;
            $input['event_recursion'] = null;
        endif;
        $input['user_id'] = Auth::user()->id;
        Event::create($input);
        Session::flash('success', 'Event successfully created');
        return redirect(route('admin.event.index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = Event::findOrFail($id);
        if (Auth()->user()->id == $model->user->id)
            return view('backend.events.edit', compact('model'));
        else
            return redirect(route('admin.event.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        if (($request->get('event_recursion')) == 'null'):
            $input['event_repeating_days'] = null;
            $input['event_recursion'] = null;
        endif;
        $input['user_id'] = Auth::user()->id;
        $model = Event::findOrFail($id);
        $model->update($input);
        return 'success';
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $model = Event::findOrFail($id);
        if (Auth()->user()->id == $model->user->id)
            return view('backend.events.show', compact('model'));
        else
            return redirect(route('admin.event.index'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = Event::findOrFail($id);
        if (Auth()->user()->id == $model->user->id):
            $model->delete();
            Session::flash('success', 'Event successfully deleted');
            return redirect()->back();
        else:
            return redirect(route('admin.event.index'));
        endif;
    }
}
