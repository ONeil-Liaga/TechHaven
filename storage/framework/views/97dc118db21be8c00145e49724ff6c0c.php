
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

	 
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Brand List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="<?php echo e(url('admin/brand/add')); ?>" class="btn btn-primary">Add New Brand</a>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
      
      
          <div class="col-md-12">

            <?php echo $__env->make('admin.layouts._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Brand List</h3>
              </div>
            
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Meta Title</th>
                      <th>Meta Description</th>
                      <th>Meta Keywords</th>
                      <th>Created By</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                      <td><?php echo e($value->id); ?></td>
                      <td><?php echo e($value->name); ?></td>
                      <td><?php echo e($value->slug); ?></td>
                      <td><?php echo e($value->meta_title); ?></td>
                      <td><?php echo e($value->meta_description); ?></td>
                      <td><?php echo e($value->meta_keywords); ?></td>
                      <td><?php echo e($value->created_by_name); ?></td>
                      <td><?php echo e(($value->status == 0) ? 'Active' : 'Inactive'); ?></td>
                      <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?></td>
                      <td>
                          <a href="<?php echo e(url('admin/brand/edit/'.$value->id)); ?>" class="btn btn-primary">Edit</a>
                          <a href="<?php echo e(url('admin/brand/delete/'.$value->id)); ?>" class="btn btn-danger">Delete</a>
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
    </section>
    


</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\TechHub\resources\views/admin/brand/list.blade.php ENDPATH**/ ?>