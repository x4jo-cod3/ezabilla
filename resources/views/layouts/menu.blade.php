      <!-- <li class="treeview">
        <a href="{{ url('/upload-file') }}">
          <i class="fa fa-upload"></i>
          <span>Upload Center</span>
        </a>
      </li> -->

      @canany(['sales', 'admin','operation','receiption'])

              <li class="nav-item">
                <a href="{{ route('tickets.dashboard2') }}" class="nav-link">
                <i class="fa fa-filter" aria-hidden="true"></i>
                  <p>Dashboard Filtring Daily</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('tickets.index') }}" class="nav-link">
                <i class="fa fa-filter" aria-hidden="true"></i>
                  <p>Dashboard Filtring All</p>
                </a>
              </li>

           <!-- client menu -->

              <li class="nav-item">
                <a href="{{ route('client.index') }}" class="nav-link">
                <i class="fas fa-hospital-user"></i>
                  <p>Client</p>
                </a>
              </li>

      @endcanany

      @canany(['admin','operation','receiption'])


      <!--Expenses menu -->

      <li class="nav-item">
        <a href="{{ route('expenses.index') }}" class="nav-link">
        <i class="fas fa-money-bill-alt"></i>
            <p>Expenses</p>
        </a>
      </li>

      @endcanany

      @canany(['admin','operation'])

          <!--Expenses menu -->

          <li class="nav-item">
            <a href="{{ route('report.index') }}" class="nav-link">
            <i class="fas fa-chart-bar"></i>
                <p>Reports</p>
            </a>
          </li>



      @endcanany



      @canany(['admin','stock'])

      <li class="nav-item">
                <a href="{{ route('stock.index') }}" class="nav-link">
                <i class="fas fa-store-alt"></i>
                    <p>Stock</p>
                </a>
      </li>



      @endcanany







      @can('admin')


              <!-- Doctor menu -->

              <li class="nav-item">
                <a href="{{ route('doctor.index') }}" class="nav-link">
                  <i class="fa fa-user-md" aria-hidden="true"></i>
                    <p>Doctor</p>
                </a>
              </li>

              <!--Clinics menu -->
              <li class="nav-item">
                <a href="{{ route('clinic.index') }}" class="nav-link">
                <i class="fas fa-clinic-medical"></i>
                    <p>Clinics</p>
                </a>
              </li>




              <!--Services menu -->

              <li class="nav-item">
                <a href="{{ route('service.index') }}" class="nav-link">
                <i class="fa fa-server" aria-hidden="true"></i>
                    <p>Services</p>
                </a>
              </li>


                <!--Employee menu -->

                <li class="nav-item">
                  <a href="{{ route('employee.index') }}" class="nav-link">
                  <i class="fa fa-users" aria-hidden="true"></i>
                      <p>Employee</p>
                  </a>
                </li>

            <!--users menu -->

              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fas fa-user-cog"></i>
                    <p>Users Mangment</p>
                </a>
              </li>

      @endcan










