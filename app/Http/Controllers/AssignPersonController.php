<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\AssignPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AssignPersonRequest;
use App\Models\User;

class AssignPersonController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user_name = Auth::user()->name;
        $role_id = Auth::user()->role_id;
        return view('backend.assign_person.index', compact('users', 'user_name', 'role_id'));
    }

    public function create(Request $request)
    {
        return view('backend.assign_person.create');
    }

    public function store(AssignPersonRequest $request)
    {
        try {
            $data = $request->all();
            AssignPerson::create($data);
            return redirect()->route('assign_person.index')->withMessage('Assign Person Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $assign_person = AssignPerson::find($id);
        return view('backend.assign_person.edit', compact('assign_person'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');
            AssignPerson::where('id', $id)->update($data);

            return redirect()->route('assign_person.index')->withMessage('Updated Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('assign_person.index')->withMessage('Deleted Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
