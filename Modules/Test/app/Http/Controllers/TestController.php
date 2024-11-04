<?php

namespace Modules\Test\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Test\App\Models\Test;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class TestController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $tests = Test::all();
        return view('test::showTests', [
            'tests' => $tests
        ]);
    }

    // Show the form for creating a new resource
    public function create()
    {
        $statuses = Test::statuses;
        $payment = Test::payment;
        return view('test::addTest', [
            'statuses' => $statuses,
            'payment' => $payment
        ]);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $test = Test::create($request->all());
        return redirect()->route('tests.show')->with('success', 'Test added successfully!');
    }

    // Show the specified resource
    public function show($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $test= Test::findOrFail($decrypted_id);
        return view('test::tests.show');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $test= Test::findOrFail($decrypted_id);
        $statuses = Test::statuses;
        $payment = Test::payment;

        // dates extraction
        $test_date = Carbon::parse($test->date)->format('Y-m-d');
        $announce_date = Carbon::parse($test->announce_date)->format('Y-m-d');
        $last_date = Carbon::parse($test->last_date)->format('Y-m-d');

        return view('test::editTest', [
            'test' => $test,
            'statuses' => $statuses,
            'payment' => $payment,
            'test_date' => $test_date,
            'announce_date' => $announce_date,
            'last_date' => $last_date
        ]);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $test = Test::where('id', $id)->first();

        $test->title = $request->title;
        $test->slug = $request->slug;
        $test->description = $request->description;
        $test-> language = $request->language;
        $test->enabled = $request->enabled;
        $test->ispaid = $request->ispaid;
        $test->price = $request->price;
        $test->date = $request->date;
        $test->announce_date = $request->announce_date;
        $test->last_date = $request->last_date;
        $test->individual_result = $request->individual_result;
        $test->overall_result = $request->overall_result;
        $test->province_result = $request->province_result;
        $test->zone_result = $request->zone_result;
        $test->district_result = $request->district_result;
        $test->instant_result = $request->instant_result;
        $test->test_duration = $request->test_duration;
        $test->is_finished = $request->is_finished;
        $test->is_hidden = $request->is_hidden;

        $test->save();

        return redirect()->route('tests.show')->with('success', 'Test updated successfully!');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $test = Test::find($decrypted_id);

        $test->delete();
        return redirect()->route('tests.show')->with('danger', 'Test deleted successfully!');
        
        // if ($test) {
        //     $test->delete();
        //     return response()->json(['success' => 'Test deleted successfully.']);
        // } else {
        //     return response()->json(['error' => 'Test not found.'], 404);
        // }

    }
}
