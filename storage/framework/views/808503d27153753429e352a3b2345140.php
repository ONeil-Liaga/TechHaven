<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                <span class="info-box-number"><?php echo e($TotalOrder); ?></span>
              </div>
            </div>
           </div>

           <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Orders</span>
                <span class="info-box-number"><?php echo e($TotalTodayOrder); ?></span>
              </div>
            </div>
           </div>


           <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Amount</span>
                <span class="info-box-number">Ksh<?php echo e(number_format($TotalAmount, 2)); ?></span>
              </div>
            </div>
           </div>

             <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Amount</span>
                <span class="info-box-number">Ksh<?php echo e(number_format($TotalTodayAmount, 2)); ?></span>
              </div>
            </div>
           </div>



           <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Customer</span>
                <span class="info-box-number"><?php echo e($TotalCustomer); ?></span>
              </div>
            </div>
           </div>



           <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Today Customer</span>
                <span class="info-box-number"><?php echo e($TotalTodayCustomer); ?></span>
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
                      <?php for($i=2022; $i<=date('Y'); $i++): ?>
                      <option <?php echo e(($year == $i) ? 'selected' : ''); ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                      <?php endfor; ?>
                  </select>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$<?php echo e(number_format($totalAmount, 2)); ?></span>
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
                      <th>State</th>
                      <th>Postcode</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Discount Code</th>
                      <th>Discount Amount ($)</th>
                      <th>Shipping Amount ($)</th>
                      <th>Total Amount ($)</th>
                      <th>Payment Method</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $getLatestOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                      <td><?php echo e($value->id); ?></td>
                      <td><?php echo e($value->order_number); ?></td>
                      <td><?php echo e($value->first_name); ?> <?php echo e($value->last_name); ?></td>
                      <td><?php echo e($value->county); ?></td>
                      <td><?php echo e($value->address_one); ?> <br /> <?php echo e($value->address_two); ?></td>
                      <td><?php echo e($value->city); ?></td>
                      <td><?php echo e($value->state); ?></td>
                      <td><?php echo e($value->postcode); ?></td>
                      <td><?php echo e($value->phone); ?></td>
                      <td><?php echo e($value->email); ?></td>
                      <td><?php echo e($value->discount_code); ?></td>
                      <td><?php echo e(number_format($value->discount_amount, 2)); ?></td>
                      <td><?php echo e(number_format($value->shipping_amount, 2)); ?></td>
                      <td><?php echo e(number_format($value->total_amount, 2)); ?></td>
                      <td style="text-transform: capitalize;"><?php echo e($value->payment_method); ?></td>

                      <td><?php echo e(date('d-m-Y h:i A', strtotime($value->created_at))); ?></td>
                      <td>
                        <a href="<?php echo e(url('admin/orders/detail/'.$value->id)); ?>" class="btn btn-primary">Detail</a>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('public/assets/dist/js/pages/dashboard3.js')); ?>"></script>
<script type="text/javascript">
  $('.ChangeYear').change(function(){
      var year = $(this).val();
      window.location.href = "<?php echo e(url('admin/dashboard?year=')); ?>"+year;
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
          data: [<?php echo e($getTotalCustomerMonth); ?>]
        },
        {
          backgroundColor: '#ced4da',
          borderColor: '#ced4da',
          data: [<?php echo e($getTotalOrderMonth); ?>]
        },
        {
          backgroundColor: 'red',
          borderColor: 'red',
          data: [<?php echo e($getTotalOrderAmountMonth); ?>]
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TechHub\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>