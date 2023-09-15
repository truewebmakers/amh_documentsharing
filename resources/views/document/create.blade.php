@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Share Documents') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('document.store') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="mb-3">
                            <label for="user_ids" class="form-label">{{ __('Select Users') }}</label>
                            <select id="user_ids" name="user_ids[]" class="form-select" multiple required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                            <div class="mb-3">
                                <label for="user_tags" class="form-label">{{ __('Select Users') }}</label>
                                <input id="user_tags" name="user_ids" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>

                            <div class="dropzone" id="myDropzone"></div>
                            <div id="files">
                            </div>




                            {{-- <div class="mb-3">
                                <label for="files" class="form-label">{{ __('Select Files') }}</label>
                                <input type="file" class="form-control" id="files" name="files[]" multiple required
                                    accept=".pdf,.doc,.docx">
                            </div> --}}

                            <button type="submit" id="submit" class="btn btn-primary mt-3">{{ __('Upload Documents') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        var myDropzone = new Dropzone("#myDropzone", {
            url: "{{ route('dropzon.upload-drop') }}", // Your upload route
            paramName: "file", // The name of the file input field
            maxFilesize: 50, // Maximum file size in MB
            acceptedFiles: ".pdf, .doc, .docx, .txt, .jpg, .jpeg, .png, .gif, .xls, .xlsx", // Allowed file types
            addRemoveLinks: true, // Display remove links for uploaded files
            dictDefaultMessage: "Drop files here or click to upload", // Default message
            dictRemoveFile: "Remove", // Remove button text
            dictCancelUpload: "Cancel", // Cancel button text
            init: function() {
                const dropzone = this;
                $("#submit").prop("disabled", true);
                // Array to store temporary file pa 

                this.on("success", function(file, response) {
                    $("#files").append(`<input type="hidden" id="${file.upload.uuid}" name="file_paths[]" value="${response.temp_path}">`);
                    $("#submit").prop("disabled", false);
                    // 9ef1a352-a5a1-4e62-974a-d9ec75c4bb39
                });

                this.on("removedfile", function(file) { 
                   var fileName = $("#"+file.upload.uuid).val(); 
                   $("#submit").prop("disabled", true);
                   
                    // Handle the removal of files from Dropzone
                    // Remove the file path from the array
                        $.ajax({
                            type: "POST",
                            url: "{{ route('dropzon.upload-drop') }}", // Your remove file URL
                            data: {
                                _token: "{{ csrf_token() }}",
                                'file_name': fileName,
                                'type': 'remove'
                            },
                            success: function(response) {
                                $("#"+file.upload.uuid).remove();
                                $("#submit").prop("disabled", false);
                                console.log("File removed successfully.");
                            },
                            error: function(error) {
                                console.error("Error removing file: " + error
                                    .responseText);
                            },
                        });

                    



                    // Update the hidden input field with updated file paths
                    // updateHiddenInput(temporaryFilePaths);
                });
            },
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
        });

        // Listen to the success event for each uploaded file
        myDropzone.on("success", function(file, response) {
            // Handle successful upload here, e.g., display a success message or update the form
        });
        //  console.log('Users:', {!! json_encode($users) !!});

        // var input = document.querySelector('#user_tags');

        var inputElm = document.querySelector('#user_tags'),



            whitelist = {!! json_encode(
                $users->map(function ($user) {
                        return [
                            'value' => $user->name, // Display name in suggestions
                            'id' => $user->id, // Additional data for searching by email
                        ];
                    })->toArray(),
            ) !!};
        var tagify = new Tagify(inputElm, {
            enforceWhitelist: true,

            // make an array from the initial input value
            whitelist: inputElm.value.trim().split(/\s*,\s*/)
        })

        // Chainable event listeners
        tagify.on('add', onAddTag)
            .on('remove', onRemoveTag)
            .on('input', onInput)
            .on('edit', onTagEdit)
            .on('invalid', onInvalidTag)
            .on('click', onTagClick)
            .on('focus', onTagifyFocusBlur)
            .on('blur', onTagifyFocusBlur)
            // .on('dropdown:hide dropdown:show', e => console.log(e.type))
            .on('dropdown:select', onDropdownSelect)

        var mockAjax = (function mockAjax() {
            var timeout;
            return function(duration) {
                clearTimeout(timeout); // abort last request
                return new Promise(function(resolve, reject) {
                    timeout = setTimeout(resolve, duration || 700, whitelist)
                })
            }
        })()

        // tag added callback
        function onAddTag(e) {
            // console.log("onAddTag: ", e.detail);
            // console.log("original input value: ", inputElm.value)
            tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
        }

        // tag remvoed callback
        function onRemoveTag(e) {
            // console.log("onRemoveTag:", e.detail, "tagify instance value:", tagify.value)
        }

        // on character(s) added/removed (user is typing/deleting)
        function onInput(e) {
            // console.log("onInput: ", e.detail);
            tagify.settings.whitelist.length = 0; // reset current whitelist
            tagify.loading(true).dropdown.hide.call(tagify) // show the loader animation

            // get new whitelist from a delayed mocked request (Promise)
            mockAjax()
                .then(function(result) {
                    // replace tagify "whitelist" array values with new values
                    // and add back the ones already choses as Tags
                    tagify.settings.whitelist.push(...result, ...tagify.value)

                    // render the suggestions dropdown.
                    tagify.loading(false).dropdown.show.call(tagify, e.detail.value);
                })
        }

        function onTagEdit(e) {
            // console.log("onTagEdit: ", e.detail);
        }

        // invalid tag added callback
        function onInvalidTag(e) {
            // console.log("onInvalidTag: ", e.detail);
        }

        // invalid tag added callback
        function onTagClick(e) {
            // console.log(e.detail);
            // console.log("onTagClick: ", e.detail);
        }

        function onTagifyFocusBlur(e) {
            // console.log(e.type, "event fired")
        }

        function onDropdownSelect(e) {
            // console.log("onDropdownSelect: ", e.detail)
        }
    </script>
@endsection
