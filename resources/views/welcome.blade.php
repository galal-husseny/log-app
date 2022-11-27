@extends('layouts.app')

@section('title', 'Log File')

@section('content')
    <div class="col-12 text-center text-primary h1 my-5">
        <h1>Log Data</h1>
    </div>
    <div class="col-12">
        <form class="d-flex form" method="POST" id="view" action="{{ route('file.begin') }}">
            <input class="form-control me-2" name="path" type="text" placeholder="/path/to/file" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">View</button>
        </form>
        <p class="text-danger font-weight-bold my-2" id="error"></p>
        <div id="table_here" class="my-3">
        </div>
    </div>
@endsection
@push('js')
    <script>


        $(document).on('submit',".form",function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            var httpVerb = form.attr('method');
            var filePath = (new FormData(document.querySelector('.form'))).get('path');
            $.ajax({
                type: httpVerb,
                url: actionUrl,
                data: form.serialize(),
                success: function(result,status,xhr) {
                    $('#error').html('');
                    if(result.data.length != 0){
                        drawTable(result.data,filePath);
                    }
                },
                error: function(xhr,status,error){
                    $('#error').html(xhr.responseJSON.message);
                }
            });
        });

        function drawTable(data,filePath){
            var firstIndex = Object.keys(data)[0];
            $('#table_here').html('');
            var table = `<table class="table table-borderless mb-5">
                            <tbody>`
                                for(var index in data){
                                    table +=    `<tr>
                                                    <th scope="row" class="border-end bg-light text-center">`+index+`</th>
                                                    <td colspan="3">`+data[index]+`</td>
                                                </tr>`;
                                }
                table += `  </tbody>
                            <tfoot class="w-100">
                                <tr class="container ">
                                    <th class="col-3">
                                        <form class="form" action="{{ route('file.begin') }}" method="POST">
                                            <input type='hidden' name='path' value='`+filePath+`'>
                                            <input type='hidden' name='lastIndex' value="`+index+`">
                                            <button type='submit'
                                                class="btn btn-light form-control" title="Go to the beginning of the file">
                                                <i class="fas fa-step-backward"></i>
                                            </button>
                                        </form>
                                    </th>
                                    <th class="col-3">
                                        <form class="form" action="{{ route('file.previous') }}" method="POST">
                                            <input type='hidden' name='path' value='`+filePath+`'>
                                            <input type='hidden' name='lastIndex' value="`+firstIndex+`">
                                            <button type='submit'
                                                class="btn btn-light form-control" title="Previous 10 lines">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                        </form>
                                    </th>
                                    <th class="col-3">
                                        <form class="form" action="{{ route('file.next') }}" method="POST">
                                            <input type='hidden' name='path' value='`+filePath+`'>
                                            <input type='hidden' name='lastIndex' value="`+index+`">
                                            <button type='submit'
                                                class="btn btn-light form-control" title="Next 10 lines">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </form>

                                    </th>
                                    <th class="col-3">
                                        <form class="form" action="{{ route('file.end') }}" method="POST">
                                            <input type='hidden' name='path' value='`+filePath+`'>
                                            <input type='hidden' name='lastIndex' value="`+index+`">
                                            <button type='submit'
                                                class="btn btn-light form-control" title="Go to the end of the file">
                                                <i class="fas fa-step-forward"></i>
                                            </button>
                                        </form>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>`;
            $('#table_here').html(table);
        }
    </script>
@endpush
