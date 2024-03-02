@extends('layouts.app')

@section('content')

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">


        @can('admin')


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$clientCount}}</h3>

                <p>Client</p>
              </div>
              <div class="icon">
              <i class="fas fa-hospital-user"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$doctorCount}}</h3>

                <p>Doctors</p>
              </div>
              <div class="icon">
              <i class="fa fa-user-md" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$clinicsCount}}</h3>

                <p>Clinics</p>
              </div>
              <div class="icon">
               <i class="fas fa-clinic-medical"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$employeeCount}}</h3>

                <p>Employee</p>
              </div>
              <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <!-- end clinics -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$expenses}} L.E</h3>

                <p>Expenses</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <!-- end clinics -->



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$income}}</h3>

                <p>Income</p>
              </div>
              <div class="icon">
                 <i class="fas fa-money-check-alt"></i>
              </div>
            </div>
          </div>
          <!-- end clinics -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$profit}}</h3>

                <p>Profit</p>
              </div>
              <div class="icon">
                 <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
          </div>
          <!-- end clinics -->




<!-- clinics analsis -->
          <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-dark">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="{{ asset('images/clinics_analsis.png') }}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Clinics</h3>
                <h5 class="widget-user-desc">Clinics Analsis</h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link">
                      عيادات الجلديه <span class="float-right badge bg-primary">{{$services_1}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link">
                    عياده الليزر <span class="float-right badge bg-secondary">{{$services_2}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link">
                    عيادات الزراعه <span class="float-right badge bg-info">{{$services_3}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link">
                    عيادة تنضيف البشره <span class="float-right badge bg-dark">{{$services_4}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link">
                    عيادات البلازما <span class="float-right badge bg-danger">{{$services_5}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a  class="nav-link">
                    عمليات <span class="float-right badge bg-warning">{{$services_6}}</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
        </div>

        @endcan






        @can('operation')


            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$clientCount}}</h3>

                  <p>Client</p>
                </div>
                <div class="icon">
                <i class="fas fa-hospital-user"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->


            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$doctorCount}}</h3>

                  <p>Doctors</p>
                </div>
                <div class="icon">
                <i class="fa fa-user-md" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->


            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$clinicsCount}}</h3>

                  <p>Clinics</p>
                </div>
                <div class="icon">
                <i class="fas fa-clinic-medical"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->


            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$employeeCount}}</h3>

                  <p>Employee</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <!-- end clinics -->


            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$expenses}} L.E</h3>

                  <p>Expenses</p>
                </div>
                <div class="icon">
                  <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <!-- end clinics -->



            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$income}}</h3>

                  <p>Income</p>
                </div>
                <div class="icon">
                  <i class="fas fa-money-check-alt"></i>
                </div>
              </div>
            </div>
            <!-- end clinics -->


            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$profit}}</h3>

                  <p>Profit</p>
                </div>
                <div class="icon">
                  <i class="fas fa-dollar-sign"></i>
                </div>
              </div>
            </div>
            <!-- end clinics -->




            <!-- clinics analsis -->
            <div class="col-md-4">
              <!-- Widget: user widget style 2 -->
              <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-dark">
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset('images/clinics_analsis.png') }}" alt="User Avatar">
                  </div>
                  <!-- /.widget-user-image -->
                  <h3 class="widget-user-username">Clinics</h3>
                  <h5 class="widget-user-desc">Clinics Analsis</h5>
                </div>
                <div class="card-footer p-0">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link">
                        عيادات الجلديه <span class="float-right badge bg-primary">{{$services_1}}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a  class="nav-link">
                      عياده الليزر <span class="float-right badge bg-secondary">{{$services_2}}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a  class="nav-link">
                      عيادات الزراعه <span class="float-right badge bg-info">{{$services_3}}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a  class="nav-link">
                      عيادة تنضيف البشره <span class="float-right badge bg-dark">{{$services_4}}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a  class="nav-link">
                      عيادات البلازما <span class="float-right badge bg-danger">{{$services_5}}</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a  class="nav-link">
                      عمليات <span class="float-right badge bg-warning">{{$services_6}}</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /.widget-user -->
            </div>

            @endcan






        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">


          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">


          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
