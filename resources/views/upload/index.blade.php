@extends('layouts.app')

@section('title', 'Upload File')

@section('content_header')
    <h1>Upload File</h1>
@stop

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload Centre</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('import_parse') }}" method="POST" class="mb-4" enctype="multipart/form-data">
                    @csrf



                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="csv_file" name="csv_file" required>
                        <label class="custom-file-label" for="csv_file">Choose file</label>
                    </div>

                    <div class="mt-4 form-group">
                        <label for="header">{{ __('File contains header row?') }}</label>
                        <div class="checkbox">
                            <label>
                                <input id="header" type="checkbox" name="header" checked class="minimal"/>
                            </label>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                </form>

            </div>
            <!-- /.box -->
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            // Show filename in file input field
            $('input[type=file]').change(function() {
                var filename = $(this).val().split('\\').pop();
                $(this).next('input').val(filename);
            });
        });
    </script>
@stop

