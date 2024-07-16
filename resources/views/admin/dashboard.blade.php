@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>



    <div class="content">
      <div class="container-fluid">



        <div class="row">


          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Orders</span>
                <span class="info-box-number">{{ $TotalOrder }}</span>
              </div>
            </div>
           </div>

           <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Orders</span>
                <span class="info-box-number">{{ $TotalTodayOrder }}</span>
              </div>
            </div>
           </div>


           <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Amount</span>
                <span class="info-box-number">Ksh{{ number_format($TotalAmount, 2) }}</span>
              </div>
            </div>
           </div>

             <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Amount</span>
                <span class="info-box-number">Ksh{{ number_format($TotalTodayAmount, 2) }}</span>
              </div>
            </div>
           </div>



           <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Customer</span>
                <span class="info-box-number">{{ $TotalCustomer }}</span>
              </div>
            </div>
           </div>



           <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Customer</span>
                <span class="info-box-number">{{ $TotalTodayCustomer }}</span>
              </div>
            </div>
           </div>


        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <select class="form-control ChangeYear" style="width: 100px;">
                      @for($i=2022; $i<=date('Y'); $i++)
                      <option {{ ($year == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                      @endfor
                  </select>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">Ksh{{ number_format($totalAmount, 2) }}</span>
                    <span>Sales Over Time</span>
                  </p>

                </div>


                <div class="position-relative mb-4">
                  <canvas id="sales-chart-order" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Customer
                  </span>

                  <span class="mr-2">
                    <i class="fas fa-square text-gray"></i> Order
                  </span>

                  <span>
                    <i class="fas fa-square text-danger"></i> Amount
                  </span>
                </div>
              </div>
            </div>


            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Latest Orders</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Order Number</th>
                      <th>Name</th>
                      <th>County</th>
                      <th>Address</th>
                      <th>City</th>


                      <th>Phone</th>
                      <th>Email</th>
                      <th>Discount Code</th>
                      <th>Discount Amount (Ksh)</th>
                      <th>Shipping Amount (Ksh)</th>
                      <th>Total Amount (Ksh)</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getLatestOrders as $value)
                     <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->order_number }}</td>
                      <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                      <td>{{ $value->county }}</td>
                      <td>{{ $value->address_one }} <br /> {{ $value->address_two }}</td>
                      <td>{{ $value->city }}</td>
                      <td>{{ $value->phone }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->discount_code }}</td>
                      <td>{{ number_format($value->discount_amount, 2) }}</td>
                      <td>{{ number_format($value->shipping_amount, 2) }}</td>
                      <td>{{ number_format($value->total_amount, 2) }}</td>
                      <td style="text-transform: capitalize;">{{ $value->payment_method }}</td>

                      <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                      <td>
                        <a href="{{ url('admin/orders/detail/'.$value->id) }}" class="btn btn-primary">Detail</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection

@section('script')
<script src="{{ url('public/assets/dist/js/pages/dashboard3.js') }}"></script>
<script type="text/javascript">
  $('.ChangeYear').change(function(){
      var year = $(this).val();
      window.location.href = "{{ url('admin/dashboard?year=') }}"+year;
  });


  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart-order')

  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: [{{ $getTotalCustomerMonth }}]
        },
        {
          backgroundColor: '#ced4da',
          borderColor: '#ced4da',
          data: [{{ $getTotalOrderMonth }}]
        },
        {
          backgroundColor: 'red',
          borderColor: 'red',
          data: [{{ $getTotalOrderAmountMonth }}]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,


            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return '$' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
</script>
@endsection
