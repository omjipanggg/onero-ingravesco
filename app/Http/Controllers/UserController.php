<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLog;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {
    public function __construct() {
        $this->middleware(['auth', 'verified', 'restricted']);
    }
    public function index() {
    }

    public function create() {
    }

    public function store(Request $request) {
    }

    public function show($id) {
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name')->get();

        $context = [
            'user' => $user,
            'roles' => $roles
        ];

        return view('components.form.user-edit', $context);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->save();

        $user->roles()->detach();
        foreach ($request->roles as $role) {
            if (is_numeric($role)) {
                $user->roles()->attach($role);
            } else {
                $roles = Role::create(['name' => $role]);
                $user->roles()->attach($roles);
            }
        }

        ActivityLog::logging('User updated—' . $id);
        Alert::success('Completed', 'User updated successfully.');
        return back();
    }

    public function destroy($id) {
        ActivityLog::logging('User deleted—' . $id);
        $user = User::findOrFail($id);
        $user->email = 'old_' . $user->email;
        $user->save();
        // $user->roles()->detach();
        $user->delete();
        Alert::success('Completed', 'User deleted successfully.');
        return back();
    }
}
