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


<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                        Data Information :
                        </div>
                        <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                            <h2 class="lead"><b>ID : {{$data->id}}</b></h2>
                            <p class="text-muted text-sm"><b>Deal Name: </b> {{$data->deal_name}} </p>
                            <p class="text-muted text-sm"><b>Student Id: </b> {{$data->student_id}} </p>
                            <p class="text-muted text-sm"><b>Gender: </b> {{$data->gender}} </p>
                            <p class="text-muted text-sm"><b>Grade Name: </b> {{$data->grade_name}} </p>
                            <p class="text-muted text-sm"><b>Type: </b> {{$data->type}} </p>
                            <p class="text-muted text-sm"><b>Student Name: </b> {{$data->student_name}} </p>
                            <p class="text-muted text-sm"><b>Student Phone: </b> {{$data->student_phone}} </p>

                            </div>

                        </div>
                        </div>

                    </div>
                    </div>

        <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Action Centre</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form action="{{ route('data.update', ['data' => $data->id]) }}" method="POST">
              @csrf
              @method('PUT') 
                    <div class="form-group col-md-4">
                        <label for="dropdown1">Rejection Reasons</label>
                        <select class="form-control form-control-primary" id="rejection_reasons" name="rejection_reasons">
                        <option value="">--Select--</option>
                        <option>المواعيد غير مناسبة</option>
                        <option>سعر الكورس غالي</option>
                        <option>محتاج مادة فقط من الباقة</option>
                        <option>لا يفضل الأونلاين</option>
                        <option>مشاكل في الانترنت</option>
                        <option>مكتفي بالمجان</option>
                        <option>مشترك بالفعل</option>
                        <option>أزهر أو لغات</option>
                        <option>الدراسة انتهت</option>
                        <option>حذف التطبيق</option>
                        <option>أسباب أخرى</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dropdown2">Call Status</label>
                        <select class="form-control form-control-primary" id="call_status" name="call_status">
                        <option value="">--Select--</option>
                        <option>Accepted</option>
                        <option>Call Back</option>
                        <option>Interested</option>
                        <option>Refuesd</option>
                        <option>Wrong Number</option>
                        <option>Not Answered</option>
                        <option>Ready To Call</option>
                        </select>
                    </div>

                <div class="form-group col-md-4">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                </form>

            </div>
            <!-- /.card -->
        </div>





        </div>
    </div>

    
</div>

            
            @stop
