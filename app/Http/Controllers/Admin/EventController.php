<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View\
     */
    public function index()
    {
        $model = Event::all();
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
        Event::create($input);
        Session::flash('success', 'Event successfully created');
        return redirect(route('admin.event.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Event::findOrFail($id);
        return view('backend.events.edit', compact('model'));
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
        $model = Event::findOrFail($id);
        $model->update($input);
        return 'success';
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $model = Event::findOrFail($id);
        return view('backend.events.show', compact('model'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        Session::flash('success', 'Event successfully deleted');
        return redirect(route('admin.event.index'));
    }
}
