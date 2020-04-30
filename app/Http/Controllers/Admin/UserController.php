<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin'))
            return view('backend.users.index')->with('model', User::all());
        else
            return redirect(route('admin.index'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function create()
    {
        if (Auth::user()->hasRole('admin'))
            return view('backend.users.create');
        else
            return redirect(route('admin.index'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('admin')):
            $input = $request->all();
            $user = User::create($input);
            $user->assignRole('subscriber');
            Session::flash('success', 'User Successfully Created');
            return redirect(route('admin.user.index'));
        else:
            return redirect(route('admin.index'));
        endif;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View\
     */
    public function show($id)
    {
        if (Auth::user()->hasRole('admin')):
            $model = User::findOrFail($id);
            return view('backend.users.show', compact('model'));
        else:
            return redirect(route('admin.index'));
        endif;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('admin')):
            $model = User::findOrFail($id);
            return view('backend.users.edit', compact('model'));
        else:
            return redirect(route('admin.index'));
        endif;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->hasRole('admin')):
            $model = User::findOrFail($id);
            $input = $request->all();
            $model->update($input);
            return 'success';
        else:
            return redirect(route('admin.index'));
        endif;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')):
            $model = User::findOrFail($id);
            $model->delete();
            Session::flash('success', 'User successfully Deleted');
            return redirect(route('admin.user.index'));
        else:
            return redirect(route('admin.index'));
        endif;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function events($id)
    {
        if (Auth::user()->hasRole('admin')):
            $model = User::findOrFail($id);
            return view('backend.users.events')->with('model', $model->events);
        else:
            return redirect(route('admin.index'));
        endif;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function calendar($id)
    {
        if (Auth::user()->hasRole('admin')):
            $model = User::findOrFail($id);
            return view('backend.users.calendar')->with('model', $model->events);
        else:
            return redirect(route('admin.index'));
        endif;
    }
}
