@extends('../layouts/backend_layout')

@section('title','User Detail')

@section('content')

<div class="main-body">

    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="{{ asset('aslan1.jpeg'); }}" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{ $user->name }}</h4>
                <p class="text-secondary mb-1">{{ $user->role_name }}</p>
                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                <button class="btn btn-primary">Salary <i class=" mdi mdi-eye-off "></i> </button>
                <button class="btn btn-outline-primary">Message</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
              <span class="text-secondary">https://aslanasilon.com</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
              <span class="text-secondary">aslanasilon</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
              <span class="text-secondary">@aslanasilon</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
              <span class="text-secondary">aslanasilon</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
              <span class="text-secondary">aslanasilon</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                    <input readonly type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="User name" style="border: none;">
                    @error("name")
                     <div class="alert alert-danger ">{{ $message }}</div>
                    @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input readonly type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="User email" style="border: none;">
                @error("email")
                 <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Department</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input readonly type="text" name="department_name" value="{{ $user->department_name }}" class="form-control" placeholder="User department_name" style="border: none;">
                @error("department_name")
                 <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Section</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input readonly type="text" name="section_name" value="{{ $user->section_name }}" class="form-control" placeholder="User section_name" style="border: none;">
                @error("section_name")
                 <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input readonly type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="User phone" style="border: none;">
                @error("phone")
                 <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address 1</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input readonly type="text" name="address1" value="{{ $user->address1 }}" class="form-control" placeholder="User address 1" style="border: none;">
                @error("address1")
                 <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address 2</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input readonly type="text" name="address2" value="{{ $user->address2 }}" class="form-control" placeholder="User address 2" style="border: none;">
                @error("address2")
                 <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <hr>

          </div>
        </div>
        </div>

        <div class="row col-lg-12" style="margin:5px;">
            <div class="card-title" style="background-color: white;">
                <h1>Target Achieved 🎯 </h1>
            </div>
            <div class="col-lg-6">
                <figure class="highcharts-figure">
                    <div id="projection-chart"></div>
                    {{-- <p class="highcharts-description">
                        
                    </p> --}}
                </figure>
            </div>

            <div class="col-lg-6">
                <figure class="highcharts-figure">
                    <div id="attainment-chart"></div>
                    {{-- <p class="highcharts-description">
                        Basic line chart showing trends in a dataset. This chart includes the
                        <code>series-label</code> module, which adds a label to each line for
                        enhanced readability.
                    </p> --}}
                </figure>
            </div>
        </div>

        <div class="row col-lg-12" style="margin:5px;">
            <div class="card-title" style="background-color: white;">
                <h1>Target Statistics 📊 </h1>
            </div>
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                      <img src="{{ asset('backend/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3">8% of Goal
                      </h4>
                      <h2 class="mb-5"> Rp 151.000</h2>
                      <h6 class="card-text">PIPELINE</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                      <img src="{{ asset('backend/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3">9% of Goals 
                      </h4>
                      <h2 class="mb-5"> Rp 126.000</h2>
                      <h6 class="card-text">FORECAST</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                      <img src="{{ asset('backend/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3">23% of Goal
                      </h4>
                      <h2 class="mb-5">Rp 434.000</h2>
                      <h6 class="card-text">ATTAINMENT</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                  <div class="card bg-gradient-warning card-img-holder text-white">
                    <div class="card-body">
                      <img src="{{ asset('backend/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                      <h4 class="font-weight-normal mb-3">69% of Goal </i>
                      </h4>
                      <h2 class="mb-5">Rp 1.300.000</h2>
                      <h6 class="card-text">GAP</h6>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        
        <div class="row col-lg-12" style="margin:5px;">
            <div class="card-title" style="background-color: white;">
                <h1>Quarterly Sales 🚀 </h1>
            </div>
            <div class="col-lg-6">
                <figure class="highcharts-figure">
                    <div id="quarterly-chart"></div>
                    {{-- <p class="highcharts-description">
                        
                    </p> --}}
                </figure>
            </div>

            <div class="col-lg-6">
                <figure class="highcharts-figure">
                    <div id="absen-chart"></div>
                    {{-- <p class="highcharts-description">
                        Basic line chart showing trends in a dataset. This chart includes the
                        <code>series-label</code> module, which adds a label to each line for
                        enhanced readability.
                    </p> --}}
                </figure>
            </div>
        </div>


    </div>

  </div>

@endsection

@push('css')

<style>
    
</style>

<style>
    
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
@endpush

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    // Data retrieved from https://companiesmarketcap.com/
    Highcharts.chart('absen-chart', {
        chart: {
            type: 'area',
            inverted: true
        },
        title: {
            text: 'Absenteiseem',
            align: 'left'
        },
        accessibility: {
            keyboardNavigation: {
                seriesNavigation: {
                    mode: 'serialize'
                }
            }
        },
        tooltip: {
            pointFormat: '&#8226; {series.name}: <b>{point.y} Day</b>'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        yAxis: {
            categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            title: {
                text: 'Days of the Week'
            }
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
        },
        plotOptions: {
            area: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Sick Day',
            data: [
                [0, 3],
                [1, 0],
                [2, 0],
                [3, 0],
                [4, 0],
                [5, 0],
                [6, 0],
                [7, 0],
                [8, 0],
                [9, 0],
                [10, 0],
                [11, 0]
            ]
        }]
    });
</script>


<script>
    Highcharts.chart('quarterly-chart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Target Per Quarter',
        align: 'left'
    },
    subtitle: {
        text: 'Currency in IDR',
        align: 'left'
    },
    xAxis: {
        categories: ['Q1', 'Q2', 'Q3', 'Q4'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            borderRadius: '50%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'First Month',
        data: [631, 727, 3202, 721]
    }, {
        name: 'Second Month',
        data: [814, 841, 3714, 726]
    }, {
        name: 'Third Month',
        data: [1276, 1007, 4561, 746]
    }]
});

</script>

<script>
    Highcharts.chart('attainment-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Attainment<br>January<br>2024',
        align: 'center',
        verticalAlign: 'middle',
        y: 60
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Attainment',
        innerSize: '50%',
        data: [
            { name: 'Empty', y: 20, color: 'gray' },
            { name: 'Bonus', y: 80, color: 'green' }
        ]
    }]
});

</script>
<script>
 Highcharts.chart('projection-chart', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Projection 80%',
        align: 'left'
    },
    subtitle: {
        text: 'Projection',
        align: 'left'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 100
        }
    },
    series: [{
        name: 'Bonus',
        data: [
            { name: 'Empty', y: 20, color: 'gray' },
            { name: 'Bonus', y: 80, color: 'green' }
        ]
    }],
    exporting: {
        buttons: {
            contextButton: {
                menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
            }
        }
    }
});
</script>
@endpush
