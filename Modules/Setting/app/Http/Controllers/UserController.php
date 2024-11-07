<?php

namespace Modules\Setting\App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    // Display a listing of the resource
    public function index()
    {
        // dd('I am here');
        $data = User::latest()->paginate(5);

        return view('setting::user.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Show the form for creating a new resource
    public function create()
    {
        // $roles = Role::pluck('name', 'name')->all();
        $gender = User::gender;

        return view('setting::user.create', [
            'gender' => $gender
        ]);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        // $user->assignRole($request->input('roles'));
        $user->save();
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    // Show the specified resource
    public function show($id)
    {
        $user = User::find($id);

        // return view('setting::user.show',compact('user'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $decrypted = Crypt::decrypt($id);

        $user = User::find($decrypted);
        // $roles = Role::pluck('name', 'name')->all();
        // $userRole = $user->roles->pluck('name', 'name')->all();

        return view('setting::user.edit', [
            'user' => $user
        ]);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,',
        //     'roles' => 'required'
        // ]);

        $decrypted = Crypt::decrypt($id);
        $user = User::where('id', $decrypted)->first();

        $input = $request->except(['password']);

        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }



        $user->update($input);
        // DB::table('model_has_roles')->where('model_id', $id)->delete();

        // $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {

        $decrypted_id = Crypt::decrypt($id);
        $user = User::findOrFail($decrypted_id);


        if ($user) {
            $user->delete();

            return response()->json(['success' => 'user deleted successfully.']);
        } else {
            return response()->json(['error' => 'user not found.'], 404);
        }
    }
}
