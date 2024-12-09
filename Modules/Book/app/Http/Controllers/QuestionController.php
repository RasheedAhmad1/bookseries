<?php

namespace Modules\Book\App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Book\App\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Modules\Book\App\Models\Question;
use Illuminate\Contracts\Encryption\DecryptException;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($unit_id)
    {
        try {
            $decrypted_id = Crypt::decrypt($unit_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid unit ID');
        }
        $units = Unit::all();
        $questions = Question::all();


        return view('book::questions.index', [
            'units' => $units
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('book::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('book::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
