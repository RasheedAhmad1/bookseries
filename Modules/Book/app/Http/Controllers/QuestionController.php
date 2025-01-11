<?php

namespace Modules\Book\App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Book\App\Models\Unit;
use App\Http\Controllers\Controller;
use Modules\Book\App\Models\Section;
use Illuminate\Support\Facades\Crypt;
use Modules\Book\App\Models\Question;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $unit = Unit::findOrFail($decrypted_id);
        $section_id = $unit->section_id;
        $section = Section::findOrFail($section_id);
        $questions = Question::where('unit_id', $decrypted_id)->get();


        return view('book::questions.index', [
            'unit_id' => $unit_id,
            'unit' => $unit,
            'questions' => $questions,
            'section' =>   $section
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($unit_id)
    {
        try {
            $decrypted_id = Crypt::decrypt($unit_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid unit ID');
        }

        $unit = Unit::findOrFail($decrypted_id);
        $section_id = $unit->section_id;
        $section = Section::findOrFail($section_id);
        $questions = Question::where('unit_id', $decrypted_id)->get();

        $unit_id = $questions->pluck('unit_id');
        return view('book::questions.create', [
            'unit' => $unit,
            'section' => $section,
            'unit_id' => $decrypted_id, // Pass the `unit_id` to the view
        ]);
    }


    public function createBulk($unit_id)
    {
        try {
            $decrypted_id = Crypt::decrypt($unit_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid unit ID');
        }

        $unit = Unit::findOrFail($decrypted_id);
        $section_id = $unit->section_id;
        $section = Section::findOrFail($section_id);
        $questions = Question::where('unit_id', $decrypted_id)->get();

        $unit_id = $questions->pluck('unit_id');
        return view('book::questions.create-bulk', [
            'unit' => $unit,
            'section' => $section,
            'unit_id' => $decrypted_id, // Pass the `unit_id` to the view
        ]);
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $unit_id)
    {

        try {
            $decrypted_id = Crypt::decrypt($unit_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid unit ID');
        }

        $requestData = $request->all();
        $question = Question::create($requestData);
        $question->addAllMediaFromTokens();
        $encrypted_unit_id = Crypt::encrypt($decrypted_id);
        return redirect()->route('questions.index', $encrypted_unit_id)->with('success', 'Question added successfully!');
    }

    //Upload ckeditor images method
    public function uploadImage(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            $url = Storage::url($path);

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => ['message' => 'File upload failed']
        ]);
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
    public function edit($question_id)
    {
        try {
            $decrypted_question_id = Crypt::decrypt($question_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid question ID');
        }

        $question = Question::with('media')->findOrFail($decrypted_question_id);
        $unit_id =  $question->unit_id;
        $unit = Unit::findOrFail($unit_id);
        $section_id = $unit->section_id;
        $section = Section::findOrFail($section_id);


        return view('book::questions.edit', [
            'question' => $question,
            'unit' => $unit,
            'section' => $section
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $question_id)
    {
        try {
            $decrypted_question_id = Crypt::decrypt($question_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid question Id');
        }

        $question = Question::findOrFail($decrypted_question_id);
        if ($request->has('question_images')) {
            $question->addAllMediaFromTokens();
        }

        if ($request->has('answer_images')) {
            $question->addAllMediaFromTokens();
        }

        $question->update($request->all());

        $encrypted_question_id = Crypt::encrypt($question->unit_id);

        return redirect()->route('questions.index', $encrypted_question_id)->with('success', 'Question updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($question_id)
    {
        try {
            $decrypted_question_id = Crypt::decrypt($question_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid question ID');
        }


        $question = Question::findOrFail($decrypted_question_id);

        if ($question) {
            $question->delete();
            return response()->json(['success' => 'question deleted successfully.']);
        } else {
            return response()->json(['error' => 'question not found.'], 404);
        }
    }
}
