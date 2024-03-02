@extends('layouts.app')
@section('content')


<div class="col-md-12 mt-5">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Reports</h3>
              </div>
              <div class="card-body">

              <form action="{{ route('reports') }}" method="get">
                @csrf

                <!-- Date range -->
              <div class="col-md-8">
                <div class="form-group">
                  <label>Report Time (From:To)</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" name="reservation" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>
                <!-- /.form group -->
              <div class="col-md-3">

              <div class="form-group">
                  <label>Report Type</label>
                  <select class="form-control select2" name="report_type" style="width: 100%;">
                    <option value="" selected="selected">Please choose The Type</option>
                    <option value="leads">Leads</option>
                    <option value="stock">Stock</option>
                    <option value="expenses">Expenses</option>
                    <option value="income">Income</option>
                  </select>
                </div>

              </div>

                  <button type="submit" class="btn btn-info">Generate</button>

              </form>


              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>




          <script>
    $(function() {


        $('#reservation').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'YYYY-MM-DD HH:mm:ss'
          }
        })

    });


    
</script>







@endsection

