@extends('layouts.app')

@section('content_header')
    <h1>Select fields</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Select fields</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('import_process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}"/>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    @if (isset($headings))
                                        <thead>
                                        <tr>
                                            @foreach ($headings[0][0] as $csv_header_field)
                                                <th>{{ $csv_header_field }}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                    @endif

                                    <tbody>
                                    @foreach($csv_data as $row)
                                        <tr>
                                            @foreach ($row as $key => $value)
                                                <td>{{ $value }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach

                                    <tr>
                                        @foreach ($csv_data[0] as $key => $value)
                                            <td>
                                                <div class="form-group">
                                                    <label for="fields[{{ $key }}]">{{ $value }}</label>
                                                    <select class="form-control" name="fields[{{ $key }}]">
                                                        @foreach (config('app.db_fields') as $db_field)
                                                            <option value="{{ (\Request::has('header')) ? $db_field : $loop->index }}"
                                                                    @if ($key === $db_field) selected @endif>{{ $db_field }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop
