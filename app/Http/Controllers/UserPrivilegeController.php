<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Modules\Book\App\Models\Book;
use Modules\Book\App\Models\Section;
use Modules\Book\App\Models\Unit;

class UserPrivilegeController extends Controller
{
    public function assignPrivilege(Request $request)
    {
        // Retrieve the user, model, and privilege type from the request
        $user = User::find($request->input('user_id'));
        $book = Book::find($request->input('model_id'));
        $section = Section::find($request)->input('section_id');
        $unit = Unit::find($request)->input('unit_id');
        $privilegeName = $request->input('privilege_name');

        // Create the privilege for the user and model
        $user->privileges()->create([
            'privilege_name' => $privilegeName,
            'model_id' => $book->id,
            'model_type' => Book::class,
        ]);

        // Assigning access privilege to a book
        $user->privileges()->create([
            'privilege_name' => 'access',
            'privilegeable_id' => $book->id,
            'privilegeable_type' => Book::class,
        ]);

        // Assigning access privilege to a section
        $user->privileges()->create([
            'privilege_name' => 'access',
            'privilegeable_id' => $section->id,
            'privilegeable_type' => Section::class,
        ]);

        // Assigning access privilege to a unit
        $user->privileges()->create([
            'privilege_name' => 'access',
            'privilegeable_id' => $unit->id,
            'privilegeable_type' => Unit::class,
        ]);

        return response()->json(['message' => 'Privilege assigned successfully']);
    }
}
