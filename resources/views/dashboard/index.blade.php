@extends('../layouts/backend_layout')

@section('title','Dashboard Page')

@section('content')
<div class="col-lg-12 stretch-card">
  @include('sweetalert::alert')

  <div class="content-wrapper">

    <div class="bg-white mb-1 rounded ">
            
            <label for="timePeriod">Select Time Period:</label>
            <select id="timePeriod" class="btn btn-sm btn-outline-primary " name="timePeriod">
                <option value="today" selected>today</option>
                <option value="week" >This Week</option>
                <option value="month" >This Month</option>
                <option value="quarter" >This Quarter</option>
                <option value="semester" >THis Semester</option>
                <option value="year" >This Year</option>
            </select>
        
            <label for="startDate">Select Start Date:</label>
            <input type="date" id="startDate" class="btn btn-sm btn-outline-primary ">
        
            <label for="timePeriod">Select End Date:</label>
            <input type="date" id="endDate" class="btn btn-sm btn-outline-primary ">
        
    </div>

    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('backend/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
            <h2 class="font-weight-normal mb-3"> Transaction <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h2>
            <h6 class="mb-5"><span id="TransactionPeriod"></span> 
                <span id="TransactionAll"></span> <br> 
                <span id="TransactionAllSum"></span> 
                <span id="TransactionAllYesterday"></span> <br> 
                <span id="TransactionAllSumYesterday"></span> 
            </h6>
            <div class="tooltip-container card-text">
                <span class="tooltip-trigger" data-tooltip-src=""><i class="mdi mdi-information "></i>  </span>
            </div>
            <span id="transaction_price_change_percentage"></span>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('backend/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
            <h2 class="font-weight-normal mb-3">Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h2>
            <h6 class="mb-5"><span id="OrderAll"></span> <br> 
                <span id="OrderAllSum"></span> 
                <span id="OrderAllYesterday"></span> <br> 
                <span id="OrderAllSumYesterday"></span> 
            </h6>
            <div class="tooltip-container card-text">
                <span class="tooltip-trigger" data-tooltip-src=""><i class="mdi mdi-information "></i>  </span>
            </div>
            <span id="order_price_change_percentage"></span>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('backend/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Net Income <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">Rp <span id="NetIncomeAll"></span></h2>
            {{-- <h6 class="card-text">Increased by 5%</h6> --}}
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              <h4 class="card-title float-left">Transaction By Month</h4>
            </div>
                <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">The Most Status Order</h4>
                    <canvas id="status-chart-order"></canvas>
                </div>
            </div>
     </div>

    </div>

    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              <h4 class="card-title float-left">Transaction Today</h4>
            </div>
                <canvas id="DashboardChartTransactionToday"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Traffic Sources</h4>
            <canvas id="traffic-chart"></canvas>
            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              <h4 class="card-title float-left">Visit And Sales Statistics</h4>
              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
            </div>
            <canvas id="visit-sale-chart" class="mt-4"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Traffic Sources</h4>
            <canvas id="traffic-chart"></canvas>
            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Tickets</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Assignee </th>
                    <th> Subject </th>
                    <th> Status </th>
                    <th> Last Update </th>
                    <th> Tracking ID </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <img src="{{ asset('backend/assets/images/faces/face1.jpg') }}" class="me-2" alt="image"> David Grey
                    </td>
                    <td> Fund is not recieved </td>
                    <td>
                      <label class="badge badge-gradient-success">DONE</label>
                    </td>
                    <td> Dec 5, 2017 </td>
                    <td> WD-12345 </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('backend/assets/images/faces/face2.jpg') }}" class="me-2" alt="image"> Stella Johnson
                    </td>
                    <td> High loading time </td>
                    <td>
                      <label class="badge badge-gradient-warning">PROGRESS</label>
                    </td>
                    <td> Dec 12, 2017 </td>
                    <td> WD-12346 </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('backend/assets/images/faces/face3.jpg') }}" class="me-2" alt="image"> Marina Michel
                    </td>
                    <td> Website down for one week </td>
                    <td>
                      <label class="badge badge-gradient-info">ON HOLD</label>
                    </td>
                    <td> Dec 16, 2017 </td>
                    <td> WD-12347 </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('backend/assets/images/faces/face4.jpg') }}" class="me-2" alt="image"> John Doe
                    </td>
                    <td> Loosing control on server </td>
                    <td>
                      <label class="badge badge-gradient-danger">REJECTED</label>
                    </td>
                    <td> Dec 3, 2017 </td>
                    <td> WD-12348 </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Updates</h4>
            <div class="d-flex">
              <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                <i class="mdi mdi-account-outline icon-sm me-2"></i>
                <span>jack Menqu</span>
              </div>
              <div class="d-flex align-items-center text-muted font-weight-light">
                <i class="mdi mdi-clock icon-sm me-2"></i>
                <span>October 3rd, 2018</span>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6 pe-1">
                <img src="{{ asset('backend/assets/images/dashboard/img_1.jpg') }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                <img src="{{ asset('backend/assets/images/dashboard/img_4.jpg') }}" class="mw-100 w-100 rounded" alt="image">
              </div>
              <div class="col-6 ps-1">
                <img src="{{ asset('backend/assets/images/dashboard/img_2.jpg') }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                <img src="{{ asset('backend/assets/images/dashboard/img_3.jpg') }}" class="mw-100 w-100 rounded" alt="image">
              </div>
            </div>
            <div class="d-flex mt-5 align-items-top">
              <img src="{{ asset('backend/assets/images/faces/face3.jpg') }}" class="img-sm rounded-circle me-3" alt="image">
              <div class="mb-0 flex-grow">
                <h5 class="me-2 mb-2">School Website - Authentication Module.</h5>
                <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable content of a page.</p>
              </div>
              <div class="ms-auto">
                <i class="mdi mdi-heart-outline text-muted"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Project Status</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Due Date </th>
                    <th> Progress </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> 1 </td>
                    <td> Herman Beck </td>
                    <td> May 15, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 2 </td>
                    <td> Messsy Adam </td>
                    <td> Jul 01, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 3 </td>
                    <td> John Richards </td>
                    <td> Apr 12, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 4 </td>
                    <td> Peter Meggik </td>
                    <td> May 15, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 5 </td>
                    <td> Edward </td>
                    <td> May 03, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td> 5 </td>
                    <td> Ronald </td>
                    <td> Jun 05, 2015 </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-white">Todo</h4>
            <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
              <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
            </div>
            <div class="list-wrapper">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Call John </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Create invoice </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Print Statements </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>
@endsection

@push('css')
<style>
    .tooltip-container {
        position: relative;
        display: inline-block;
    }

    .tooltip-trigger::before {
        content: '';
        display: none;
        position: absolute;
        width: auto; /* Set to 'auto' to allow the image to determine the width */
        height: auto; /* Set to 'auto' to maintain image aspect ratio */
    }

    .tooltip-trigger:hover::before {
    display: block;
    width: 480px;
    height: 50px; /* Set the height based on your requirement */
    content: ''; /* Remove content attribute, as you are using background-image */
    background-color: #323232;
    background-image: url({{ asset('info/persentase_perubahan_harga_per_hari.png') }});
    background-size: contain;
    background-repeat: no-repeat; /* Prevent the background image from looping */
    padding: 8px;
    border-radius: 4px;
    position: absolute;
    bottom: 125%;
    left: 50%;
    z-index: 99 !important;
    transform: translateX(-50%);
}
</style>
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            loadDataToday()
            setDefaultDateRange()
        });
    </script>



    <script src="{{ asset('backend/assets/vendors/js/file-upload.js') }}"></script>

    <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
    <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('backend/assets/js/todolist.js') }}"></script>

    
    <script>
        function setDefaultDateRange() {
            var endDate = new Date();
            var startDate = new Date(endDate);
            startDate.setDate(endDate.getDate() - 7); // Set start date to a week ago

            // Format dates to 'YYYY-MM-DD'
            var formattedStartDate = startDate.toISOString().split('T')[0];
            var formattedEndDate = endDate.toISOString().split('T')[0];

            // Set the values in the input fields
            $('#startDate').val(formattedStartDate);
            $('#endDate').val(formattedEndDate);
        }

        function updateOptionTimePeriods() {
            var timePeriodSelect = $('#timePeriod').val();

            // Depending on the selected time period, update the options or perform other actions
            switch (timePeriodSelect) {
                case '':
                    var timePeriodSelect = $('#timePeriod').val(null);
                    break;
                case 'today':
                    var timePeriodSelect = $('#timePeriod').val('today');
                    break;
                case 'week':
                    var timePeriodSelect = $('#timePeriod').val('week');
                    // Additional options or actions for 'week'
                    break;
                // Add cases for other time periods as needed
            }
        }

        $('#timePeriod').on('change', function () {
            // var startDate = $('#startDate').val(null);
            // var endDate = $('#endDate').val(null);


            $('#timePeriod').on('change', function () {
                // Get the selected value from the dropdown
                var selectedValue = $(this).val();

                // Call the appropriate function based on the selected value
                switch (selectedValue) {
                    case 'today':
                        loadDataToday();
                        break;
                    case 'week':
                        loadDataWeek();
                        break;
                    case 'month':
                        loadDataMonth();
                        break;
                    case 'quarter':
                        loadDataQuarter();
                        break;
                    case 'semester':
                        loadDataSemester();
                        break;
                    case 'year':
                        loadDataYear();
                        break;
                    default:
                        // Handle any additional cases or provide a default action
                        break;
                }
            });

        });

        $('#startDate').on('change', function () {
            $('#timePeriod').val('');
            $('#TransactionAll').val('');
        });

        $('#endDate').on('change', function () {
            $('#timePeriod').prop('selectedIndex', 0);
            // loadDataTransaction();
        });

        function loadDataToday() {
            $.ajax({
                url: '/dashboard-today',
                method: 'GET',
                success: function (response) {

                    // alert(response.priceChangePercentageOrder)
                    var tolerance = 0.0001;

                    if (!isNaN(response.transactions)) {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html('Today : '+response.transactions+' Transaction');
                        $('#TransactionAllSum').html('Today Sum : '+formatRupiah(response.totalPriceToday));
                        $('#TransactionAllYesterday').html('Yesterday : '+response.transaction_yesterday+' Transaction');
                        $('#TransactionAllSumYesterday').html('Yesterday Sum : '+formatRupiah(response.totalPriceYesterday));
                        if(response.priceChangePercentage > tolerance){
                            $('#transaction_price_change_percentage').html(' <i class=" mdi mdi-arrow-up-bold " style="color:green;"></i> '+Math.ceil(response.transaction_price_change_percentage)+' % from Yesterday');
                        }else if(response.priceChangePercentage < tolerance){
                            $('#transaction_price_change_percentage').html('<i class=" mdi mdi-arrow-down-bold " style="color:red;"></i> '+Math.ceil(response.transaction_price_change_percentage)+' % from Yesterday');
                        }else{
                            console.log('')
                        }
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html(0);
                    }
                    if (!isNaN(response.orders)) {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html('Today : '+response.orders+' Order');
                        $('#OrderAllSum').html('Today Sum : '+formatRupiah(response.totalPriceTodayOrder));
                        $('#OrderAllYesterday').html('Yesterday : '+response.order_yesterday+' Order');
                        $('#OrderAllSumYesterday').html('Yesterday Sum : '+formatRupiah(response.totalPriceYesterdayOrder));
                        if(response.priceChangePercentageOrder > tolerance){
                            $('#order_price_change_percentage').html(' <i class=" mdi mdi-arrow-up-bold " style="color:green;"></i> '+Math.ceil(response.order_price_change_percentage)+' % from Yesterday');
                        }else if(response.priceChangePercentageOrder < tolerance){
                            $('#order_price_change_percentage').html('<i class=" mdi mdi-arrow-down-bold " style="color:red;"></i> '+Math.ceil(response.order_price_change_percentage)+' % from Yesterday');
                        }else{
                            $('#order_price_change_percentage').html(' '+Math.ceil(response.order_price_change_percentage)+' % from Yesterday');
                        }
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html(0);
                    }
                },
                error: function (error) {
                    $('#WeeklyTransaction').html(0);
                }
            });
        }

        function loadDataWeek() {
            $.ajax({
                url: '/dashboard-week',
                method: 'GET',
                success: function (response) {
                    if (!isNaN(response.transactions)) {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html('This Week : '+response.transactions);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html(0);
                    }
                    if (!isNaN(response.orders)) {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html('This Week : '+response.orders);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html(0);
                    }
                },
                error: function (error) {
                    $('#WeeklyTransaction').html(0);
                }
            });
        }

        function loadDataMonth() {
            $.ajax({
                url: '/dashboard-month',
                method: 'GET',
                success: function (response) {
                    if (!isNaN(response.transactions)) {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html('This Month : '+response.transactions);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html(0);
                    }
                    if (!isNaN(response.orders)) {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html('This Month : '+response.orders);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html(0);
                    }
                },
                error: function (error) {
                    $('#WeeklyTransaction').html(0);
                }
            });
        }

        function loadDataQuarter() {
            $.ajax({
                url: '/dashboard-quarter',
                method: 'GET',
                success: function (response) {
                    if (!isNaN(response.transactions)) {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html('This Quarter : '+response.transactions);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html(0);
                    }
                    if (!isNaN(response.orders)) {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html('This Quarter : '+response.orders);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html(0);
                    }
                },
                error: function (error) {
                    $('#WeeklyTransaction').html(0);
                }
            });
        }

        function loadDataSemester() {
            $.ajax({
                url: '/dashboard-semester',
                method: 'GET',
                success: function (response) {
                    if (!isNaN(response.transactions)) {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html('This Semester : '+response.transactions);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html(0);
                    }
                    if (!isNaN(response.orders)) {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html('This Semester : '+response.orders);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html(0);
                    }
                },
                error: function (error) {
                    $('#WeeklyTransaction').html(0);
                }
            });
        }

        function loadDataYear() {
            $.ajax({
                url: '/dashboard-year',
                method: 'GET',
                success: function (response) {
                    if (!isNaN(response.transactions)) {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html('This Year : '+response.transactions);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#TransactionAll').html(0);
                    }
                    if (!isNaN(response.orders)) {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html('This Year : '+response.orders);
                    } else {
                        $('#TransactionPeriod').hide();
                        $('#OrderAll').html(0);
                    }
                },
                error: function (error) {
                    $('#WeeklyTransaction').html(0);
                }
            });
        }

    </script>


<script>
    const labels = [
        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
    ];

    // Fetch data from the Laravel controller
    fetch('/chart-data')
        .then(response => response.json())
        .then(data => {
            // Convert data values to numbers
            const numericData = data.data.map(value => Number(value));

            const chartData = {
                labels: labels,
                datasets: [{
                    label: 'Transaction By Month',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: numericData, // Use the fetched data here
                }]
            };

            const config = {
                type: 'line',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value, index, values) {
                                    return 'Rp ' + Number(value).toLocaleString(); // Format the value as Rp
                                }
                            }
                        }
                    }
                }
            };

            new Chart(
                document.getElementById('myChart'),
                config
            );
        })
        .catch(error => console.error('Error fetching chart data:', error));
</script>

{{-- Transaction Today  --}}
<script>
    const label_hours = Array.from({ length: 24 }, (_, i) => i + ':00'); // Labels for each hour

    fetch('/dashboard-chart-data-today')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Convert data values to numbers
            const data_chart_per_hour = data.map(value => Number(value));

            const chartData = {
                labels: label_hours,
                datasets: [{
                    label: 'Transaction By Hour',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: data_chart_per_hour, // Use the fetched data here
                }]
            };

            var options = {
                // animation: false,
                
                function(label){return label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}
                
            };

            const config = {
                type: 'line',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value, index, values) {
                                    return 'Rp ' + Number(value).toLocaleString('id-ID'); // Format the value as Rp
                                }
                            }
                        }
                    },

                }
            };

            new Chart(
                document.getElementById('DashboardChartTransactionToday'),
                config
            );

            // Show a success alert
        })
        .catch(error => {
            console.error('Error fetching chart data:', error);
            // Show an error alert
        });

    // Function to format numeric values as Rupiah
    function formatRupiah(value) {
        return 'Rp ' + Number(value).toLocaleString('id-ID');
    }
</script>


<script>

fetch('/dashboard-status-chart-data-order') // Update the URL based on your Laravel route
    .then(response => response.json())
    .then(data => {
        // Generate dynamic colors based on the length of the labels array
        const dynamicColors = Array.from({ length: data.labels.length }, (_, index) => getRandomColor(index));

        // Create a pie chart
        const ctx = document.getElementById('status-chart-order').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Status Orders',
                    backgroundColor: dynamicColors,
                    borderColor: dynamicColors,
                    data: data.counts,
                }]
            },
            options: {
                // Your existing options
            }
        });
    })
    .catch(error => console.error('Error fetching status chart data:', error));

    // Function to generate a random color
    function getRandomColor(index) {
        const colors = [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)',
        ];

    return colors[index % colors.length];
}

</script>


    
@endpush