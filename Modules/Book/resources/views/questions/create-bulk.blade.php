@extends('masterLayout.master')
@push('content')
    <!-- Dynamic Breadcrumb -->
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{ route('home') }}>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('books.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('books.index') }}">Books</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('sections.index', Crypt::encrypt($section->book_id)) }}">Sections</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('units.index', Crypt::encrypt($unit->section_id)) }}">Units</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('questions.index', Crypt::encrypt($unit_id)) }}">Questions</a>
                </li>
                <li class="breadcrumb-item active text-primary">New Bulk Question</li>
            </ol>
        </nav>
    </div>
    <!--/ Dynamic Breadcrumb -->

    <!--Form -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">
                        <li class="fa fa-align-justify"></li> New Bulk Question
                    </h5>
                </div>
                {{-- <div class="menu-divider mb-4"></div> --}}
                <hr>
                <div id="question-form">
                    <form id="bulkQuestionForm" action="{{ route('question.store', Crypt::encrypt($unit->id)) }}"
                        class="card-body" enctype="multipart/form-data">
                        @csrf

                        {{-- Type --}}
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label class=" col-form-label text-sm-end" for="title">Type</label>
                                <input type="text" name="type" id="alignment-username" class="form-control"
                                    placeholder="Enter type" />
                            </div>
                            {{-- Unit title --}}
                            <div class="col-sm-6">
                                <label class=" col-form-label text-sm-end" for="title">Unit</label>
                                <input type="text" id="alignment-book" class="form-control" value="{{ $unit->title }}"
                                    disabled />
                                <input type="hidden" name="unit_id" id="alignment-unit" class="form-control"
                                    value="{{ $unit->id }}" />
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3 mt-5">
                            <div class="col-sm-12">
                                <label class="col-form-label text-sm-end" for="alignment-publisher">Question
                                    Description</label>
                                <textarea type="text" name="description" class="form-control editor" placeholder="Enter section description"></textarea>
                            </div>
                        </div>

                        {{-- Image file --}}
                        <div class="row mb-3 mt-3">
                            <div class="col-sm-12">
                                <div id="app">
                                    <file-uploader :unlimited="true" collection="question_images"
                                        :tokens="{{ json_encode(old('media.question_images', [])) }}"
                                        label="Question Attachment" notes="Supported types: jpeg, png,jpg,gif"
                                        accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- Answer --}}
                            <div class="col-sm-6">
                                <label class="col-form-label text-sm-end" for="alignment-username">Answer</label>
                                <input type="text" name="answer" id="alignment-book" class="form-control"
                                    placeholder="Enter answer" />
                            </div>

                            {{-- Marks --}}
                            <div class="col-sm-6">
                                <label class="col-form-label text-sm-end" for="alignment-username">Marks</label>
                                <input type="text" name="marks" id="alignment-username" class="form-control"
                                    placeholder="Enter marks" />
                            </div>
                        </div>

                        {{-- Answer Explanation --}}
                        <div class="row mb-3 mt-5">
                            <div class="col-sm-12">
                                <label class="col-form-label text-sm-end" for="alignment-publisher">Answer
                                    Explanation</label>
                                <textarea type="text" name="explanation" class="form-control editor" placeholder="Enter section description"></textarea>
                            </div>
                        </div>

                        {{-- Image file --}}
                        <div class="row mb-3 mt-3">
                            <div class="col-sm-12">
                                <div id="app2">
                                    <file-uploader :unlimited="true" collection="answer_images"
                                        :tokens="{{ json_encode(old('media.answer_images', [])) }}"
                                        label="Answer Attachment" notes="Supported types: jpeg, png,jpg,gif"
                                        accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                                </div>
                            </div>
                        </div>



                        <div id="questions-container">
                            <!-- Placeholder for dynamically added questions -->
                        </div>


                        <hr class="my-4 mx-1">
                        {{-- Add book button --}}
                        <div class="card-footer col-md-12 d-flex justify-content-end align-items-center g-5">
                            {{-- <a href="" type="button" class="btn btn-secondary">Cancel</a>
                            &nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary">Save</button> --}}

                            <!-- Add Question Button -->
                            <button type="button" id="add-question" class="btn btn-success">Add Question</button>
                            &nbsp;&nbsp;&nbsp;
                            <!-- Submit Button -->
                            <button type="button" id="submit-questions" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script src="{{ asset('assets/editors/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let questionIndex = 0;

            // Add a new question input group
            $('#add-question').on('click', function() {
                const questionHtml = `
                    <hr >
                    <div class="question-group" id="question-${questionIndex}">
                        <h5 class=" text-primary">
                            <li class="fa fa-align-justify"></li> New Question
                        </h5>
                        <!-- Type -->
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label class=" col-form-label text-sm-end" for="title">Type</label>
                                <input type="text" name="questions[${questionIndex}][type]" id="alignment-username" class="form-control"
                                    placeholder="Enter type" />
                            </div>

                            <!-- Unit Tittle -->
                            <div class="col-sm-6">
                                <label class=" col-form-label text-sm-end" for="title">Unit</label>
                                <input type="text" id="alignment-book" class="form-control" value="{{ $unit->title }}"
                                    disabled />
                                <input type="hidden" name="questions[${questionIndex}][unit_id]" id="alignment-unit" class="form-control"
                                    value="{{ $unit->id }}" />
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3 mt-5">
                            <div class="col-sm-12">
                                <label class="col-form-label text-sm-end" for="alignment-publisher">Question
                                    Description</label>
                                <textarea type="text" name="questions[${questionIndex}][description]" class="form-control editor" placeholder="Enter section description"></textarea>
                            </div>
                        </div>

                        {{-- Image file --}}
                        <div class="row mb-3 mt-3">
                            <div class="col-sm-12">
                                <div id="app">
                                    <file-uploader :unlimited="true" collection="question_images"
                                        :tokens="{{ json_encode(old('media.question_images', [])) }}"
                                        label="Question Attachment" notes="Supported types: jpeg, png,jpg,gif"
                                        accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- Answer --}}
                            <div class="col-sm-6">
                                <label class="col-form-label text-sm-end" for="alignment-username">Answer</label>
                                <input type="text" name="questions[${questionIndex}][answer]" id="alignment-book" class="form-control"
                                    placeholder="Enter answer" />
                            </div>

                            {{-- Marks --}}
                            <div class="col-sm-6">
                                <label class="col-form-label text-sm-end" for="alignment-username">Marks</label>
                                <input type="number" name="questions[${questionIndex}][marks]" id="alignment-username" class="form-control"
                                    placeholder="Enter marks" />
                            </div>
                        </div>

                        {{-- Answer Explanation --}}
                        <div class="row mb-3 mt-5">
                            <div class="col-sm-12">
                                <label class="col-form-label text-sm-end" for="alignment-publisher">Answer
                                    Explanation</label>
                                <textarea type="text" name="questions[${questionIndex}][explanation]" class="form-control editor" placeholder="Enter section description"></textarea>
                            </div>
                        </div>

                        {{-- Image file --}}
                        <div class="row mb-3 mt-3">
                            <div class="col-sm-12">
                                <div id="app2">
                                    <file-uploader :unlimited="true" collection="answer_images"
                                        :tokens="{{ json_encode(old('media.answer_images', [])) }}"
                                        label="Answer Attachment" notes="Supported types: jpeg, png,jpg,gif"
                                        accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                                </div>
                            </div>
                        </div>

                        <!-- Remove Question Button -->
                        <button type="button" class="btn btn-danger btn-md remove-question" data-id="${questionIndex}">Remove</button>

                    </div>
                         &nbsp;&nbsp;&nbsp;


                `;

                $('#questions-container').append(questionHtml);
                questionIndex++;
            });

            // Remove a specific question group
            $('#questions-container').on('click', '.remove-question', function() {
                const questionId = $(this).data('id');
                $(`#question-${questionId}`).remove();
            });

            // Submit the form via AJAX
            $('#submit-questions').on('click', function(e) {
                e.preventDefault();

                const formData = $('#bulkQuestionForm').serialize();

                $.ajax({
                    url: $('#bulkQuestionForm').attr('action'),
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Questions added successfully!');
                            location.reload(); // Reload the page or redirect to another page
                        } else {
                            alert('An error occurred while saving questions.');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>




    {{-- <script>
        CKEDITOR.replace('editor', {
            extraPlugins: 'uploadimage', // Enable the upload image plugin
            filebrowserUploadUrl: "{{ route('image_question.upload') }}?_token={{ csrf_token() }}",
            filebrowserUploadMethod: 'form',
            removeDialogTabs: 'image:Link;image:advanced', // Optional: remove extra tabs in the image dialog
        });
    </script> --}}

    <script>
        // Loop through all elements with the 'editor' class and initialize CKEditor
        document.querySelectorAll('.editor').forEach(function(textarea) {
            CKEDITOR.replace(textarea, {
                extraPlugins: 'uploadimage', // Enable the upload image plugin
                filebrowserUploadUrl: "{{ route('image_question.upload') }}?_token={{ csrf_token() }}",
                filebrowserUploadMethod: 'form',
                removeDialogTabs: 'image:Link;image:advanced', // Optional: remove extra tabs in the image dialog
            });
        });
    </script>
    <script>
        function initializeEditors() {
            document.querySelectorAll('.editor:not(.initialized)').forEach(function(textarea) {
                CKEDITOR.replace(textarea, {
                    extraPlugins: 'uploadimage',
                    filebrowserUploadUrl: "{{ route('image_question.upload') }}?_token={{ csrf_token() }}",
                    filebrowserUploadMethod: 'form',
                    removeDialogTabs: 'image:Link;image:advanced',
                });
                textarea.classList.add('initialized'); // Mark as initialized
            });
        }

        // Call it initially for existing elements
        initializeEditors();
    </script>
    {{--
    <script>
        CKEDITOR.replace('editor', {
            extraPlugins: 'uploadimage', // Enable the upload image plugin
            filebrowserUploadUrl: "{{ route('image_question.upload') }}?_token={{ csrf_token() }}",
            filebrowserUploadMethod: 'form',
            removeDialogTabs: 'image:Link;image:advanced', // Optional: remove extra tabs in the image dialog
        });
    </script> --}}

    <script>
        new Vue({
            el: '#app'
        })
    </script>

    <script>
        new Vue({
            el: '#app2'
        })
    </script>
@endpush
