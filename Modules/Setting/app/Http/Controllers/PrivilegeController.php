<?php

namespace Modules\Setting\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Setting\App\Models\UserPrivilege;
use Modules\Book\App\Models\Book;
use App\Models\User;

class PrivilegeController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $data = UserPrivilege::latest()->paginate(20);
        return view('setting::privilege.index', [
            'data' => $data
        ]);
    }

    // Show the form for creating a new resource
    public function create()
    {
        $books = Book::all();
        $users = User::all();
        // dd('I am here');
        $privileges = UserPrivilege::latest()->paginate(5);

        return view('setting::privilege.create', [
            'books' => $books,
            'users' => $users,
            'data' => $privileges
        ])
        ->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('setting::privilege.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $userIds = $request->input('user_ids');
        $bookIds = $request->input('book_ids');

        foreach ($userIds as $index => $userId) {
            UserPrivilege::create([
                'user_id' => $userId,
                'privilegeable_type' => Book::class,
                'privilegeable_id' => $bookIds[$index],
            ]);
        }

        return redirect()->route('privileges.index');
    }

    // Show the specified resource
    public function show($id)
    {
        return view('setting::privilege.show');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        return view('setting::privilege.edit');
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        //
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        //
    }
}
