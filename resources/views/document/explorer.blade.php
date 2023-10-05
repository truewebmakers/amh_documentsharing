@extends('layout.app')

@section('content')
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">

 

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Sent By You</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Received</a>
                    </li>
                    {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Third Panel</a>
                        </li> --}}
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active panel panel-dark-outline tabs-panel" id="tabs-1" role="tabpanel">

                        <div class="tab-pane active documents-panel">

                            <div class="clear"></div>
                            <div class="v-spacing-xs"></div>
                            <h4 class="no-margin-top mt-2">Users</h4>
                            <ul class="folders list-unstyled sentBylist">
                                @foreach ($relatedUsers['sentUsers'] as $users)
                                    <li>
                                        <a href="javascript:void(0)" data-id="{{ $users->id }}" data-type="sent"
                                            class="get-document">
                                            <i class="fa fa-user success"></i> {{ $users->name }} ({{ $users->email }})
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                            <div class="v-spacing-xs"></div>
                        </div>

                    </div>
                    <div class="tab-pane panel panel-dark-outline tabs-panel" id="tabs-2" role="tabpanel">
                        <div class="tab-pane active documents-panel">

                            <div class="clear"></div>
                            <div class="v-spacing-xs"></div>
                            <h4 class="no-margin-top mt-2">Users</h4>
                            <ul class="folders list-unstyled">
                                @foreach ($relatedUsers['receivedUsers'] as $users)
                                    <li>
                                        <a href="javascript:void(0)" data-id="{{ $users->id }}" data-type="receive "
                                            class="get-document">
                                            <i class="fa fa-user"></i>  {{ $users->name }} ({{ $users->email }})
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                            <div class="v-spacing-xs"></div>

                        </div>
                    </div>
                    {{-- <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <p>Third Panel</p>
                        </div> --}}
                    <a class="btn btn-block btn-success" href="{{ route('document.create') }}"> <i class="fa fa-plus"> </i> Upload</a>
                </div>
 
            </div>
            <div class="col-sm-8 tab-content no-bg no-border view-side">
                <div class="tab-pane active documents documents-panel" id="documents-panel-list">
                    {{-- <div class="document success">
                        <div class="document-body">
                            <i class="fa fa-file-excel-o text-success"></i>
                        </div>
                        <div class="document-footer">
                            <span class="document-name"> Excel database 2017 </span>
                            <span class="document-description"> 1.2 MB </span>
                        </div>
                    </div> --}}

                </div>
                <div class="tab-pane documents images-panel">
                    <div class="document">
                        <div class="document-body">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                        </div>
                        <div class="document-footer">
                            <span class="document-name"> Forest.png </span>
                            <span class="document-description"> 1.2 MB </span>
                        </div>
                    </div>
                    <div class="document">
                        <div class="document-body">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                        </div>
                        <div class="document-footer">
                            <span class="document-name"> Developer.png </span>
                            <span class="document-description"> 2.5 MB </span>
                        </div>
                    </div>
                    <div class="document">
                        <div class="document-body">
                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png">
                        </div>
                        <div class="document-footer">
                            <span class="document-name"> Meeting.png </span>
                            <span class="document-description"> 1.1 MB </span>
                        </div>
                    </div>
                    <div class="document">
                        <div class="document-body">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png">
                        </div>
                        <div class="document-footer">
                            <span class="document-name"> Hiking.png </span>
                            <span class="document-description"> 3.5 MB </span>
                        </div>
                    </div>
                    <div class="document">
                        <div class="document-body">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                        </div>
                        <div class="document-footer">
                            <span class="document-name"> Developers meeting.png </span>
                            <span class="document-description"> 862 KB </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
     
@endsection
@section('page-script')

   
    <script>
        
        $(document).ready(function() {
        $(".sentBylist li:first-child a").click();
    });
            
        $(".get-document").on('click', function() {
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            $(".get-document").removeClass('text-success'); 
            $(this).addClass('text-success')

            $.ajax({
                url: "{{ route('get-docs') }}", // Replace with your actual route
                type: 'POST',
                data: {
                    id: id,
                    type: type,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'JSON',
                success: function(response) {
                    var documents = response.data;
                    var html = '';
                    $.each(documents, function(key, doc) {
                        var extension = doc.file_path.split('.').pop();

                        html += `<div class="document">
                            <div class="document-body">
                                 ` + getIcon(extension) + `
                            </div>
                            <div class="document-footer">
                                <div class="infog" id="info-btn">
                                <span class="document-name">${doc.title} </span>
                                <span class="document-description">`+convertime(doc.created_at)+` </span>
                                </div>
                                 
                                <div class="actions" id="action-btn">
                                    <a href="${response.path}${doc.file_path}" download="${doc.file_path}">
                                          <i class="fa fa-download text-dark"></i>
                                    </a>
                                    <a href="${response.path}${doc.file_path}" target='_blank' >
                                        <i class="fa fa-eye text-info"></i>
                                    </a>
                                    <i class="fa fa-info-circle " data-toggle="collapse" data-target="#collapseExample${doc.id}" aria-expanded="false" aria-controls="collapseExample"></i>
                                </div>
                                 
                               
                            </div>
                            <div class="collapse collapes-main" id="collapseExample${doc.id}">
                                <div class="card card-body">
                                    <h6>${doc.title} </h6>
                                    <hr>
                                   <p> ${doc.description}</p>
                                </div>
                         </div>
                        </div>`;
                    })
                    $("#documents-panel-list").html(html).fadeIn(1000);

 
                }
            });



        });

        function getIcon(extension) {
            var icon = ``;
            if (extension == 'pdf') {
                icon = `<i class="fa fa-file-pdf-o text-danger"></i>`;
            } else if (extension == 'xls' || extension == 'xlsx') {
                icon = `<i class="fa fa-file-pdf-o text-danger"></i>`;
            } else if (extension == 'xls' || extension == 'xlsx') {
                icon = `<i class="fa fa-file-pdf-o text-danger"></i>`;
            } else if (extension == 'dpc' || extension == 'docx') {
                icon = `<i class="fa fa-file-word-o text-info"></i>`;
            } else if (extension == 'ppt' || extension == 'docx') {
                icon = `<i class="fa fa-file-powerpoint-o text-warning"></i>`;
            } else if (extension == 'png' || extension == 'jpg' || extension == 'gif' || extension == 'jpeg') {
                icon = `<i class="fa fa fa-image text-dark"></i>`;
            } else if (extension == 'mkv' || extension == 'flv' || extension == 'ogg' || extension == 'mp4') {
                icon = `<i class="fa fa-file-video text-dark"></i>`;
            } else {
                icon = `<i class="fa fa-question-circle text-dark" aria-hidden="true"></i>`;

            }


            return icon;
        }

        function changeLanguage(language) {
            var element = document.getElementById("url");
            element.value = language;
            element.innerHTML = language;
        }

        function showDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains("show")) {
                        openDropdown.classList.remove("show");
                    }
                }
            }
        };

        function convertime(isoDate){
            var date = new Date(isoDate);

            // Format the date as desired (e.g., "YYYY-MM-DD HH:MM:SS")
            var formattedDate = date.getFullYear() + "-" +
                ("0" + (date.getMonth() + 1)).slice(-2) + "-" +
                ("0" + date.getDate()).slice(-2) + " " +
                ("0" + date.getHours()).slice(-2) + ":" +
                ("0" + date.getMinutes()).slice(-2) + ":" +
                ("0" + date.getSeconds()).slice(-2);
                return formattedDate;  

            // Display the formatted date
            $("#formattedDate").text(formattedDate);
        }

        
    </script>
@endsection
