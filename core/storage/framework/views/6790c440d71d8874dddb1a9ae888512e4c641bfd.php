<?php $__env->startSection('styles'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('assets/back/css/datepicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 bc-title"><b><?php echo e(request()->input('type') ? request()->input('type') : __('All')); ?> Cancelled Or Return <?php echo e(__('Orders')); ?></b></h3>
                <div class="right">
               <!-- <a href="<?php echo e(route('back.csv.order.export')); ?>" class="btn btn-info btn-sm d-inline-block"><?php echo e(__('CSV Export')); ?></a>-->
                  
              </div>
              </div>
        </div>
    </div>

	<!-- DataTales -->
	<div class="card shadow mb-4">
		<div class="card-body">

      

			<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="gd-responsive-table">
				<table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">

					<thead>
						<tr>
              <th> <input type="checkbox" data-target="order-bulk-delete" class="form-control bulk_all_delete"> </th>
              <th><?php echo e(__('Order ID')); ?></th>
              <th>User</th>
              <th>Status</th>
              <th>Reason</th>
              <th>Details</th>
              <th>Order Action</th>
              <th> Action</th>
							<th>Created </th>
              <th>Updated </th>

						</tr>
					</thead>

					<tbody>
<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="order-bulk-delete">
  <td><input type="checkbox" class="bulk-item" value="<?php echo e($data->id); ?>"></td>

    <td title="OrderId:<?php echo e($data->order_id); ?>,  Database ID:- <?php echo e($data->id); ?>">
    <a target="_blank" href="<?php echo e(url('/admin/order/invoice')); ?>/<?php echo e($data->order_id); ?>">   <?php echo e($data->Order->transaction_number); ?>

    </td>
    <td>
        <?php echo e($data->Order->User->first_name); ?>

    </td>

    <td>
      <?php if($data->status == 1): ?>

      <span class="badge badge-pill badge-primary">Order Cancelled</span>

      <?php else: ?>
  <span class="badge badge-pill badge-danger">Order Return</span>
<?php endif; ?>
    </td>
 <td>
        <?php echo e($data->reason); ?>

    </td>

 <td>
        <?php echo e($data->notes); ?>

    </td>

    <td>
        <div class="dropdown">
            <button class="btn <?php echo e($data->order_status); ?>  btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e($data->admin_status); ?>

            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
            

                <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->Order->id,'order_status','Canceled'])); ?>"><?php echo e(__('Cancel')); ?></a>
                <a class="dropdown-item" data-toggle="modal" data-target="#statusModal" href="javascript:;" data-href="<?php echo e(route('back.order.status',[$data->Order->id,'order_status','Return'])); ?>"><?php echo e(__('Return')); ?></a>

            </div>
          </div>
    </td>
    <td>
        <div class="action-list">
           <!-- <a class="btn btn-secondary btn-sm"
                href="<?php echo e(url('/admin/order/invoice')); ?>/<?php echo e($data->order_id); ?>">
                <i class="fas fa-eye"></i>
            </a>-->

            <a class="btn btn-danger btn-sm " data-toggle="modal"
                data-target="#confirm-delete" href="javascript:;"
                data-href="<?php echo e(route('back.order.cancellation_return_delete',$data->id)); ?>">
                <i class="fas fa-trash-alt"></i>
            </a>
           
        </div>
    </td>
      <td>  <?php echo e($data->created_at->diffForHumans()); ?></td>
    <td>
        <td>  <?php echo e($data->updated_at->diffForHumans()); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>

</div>





<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

		<!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Update Status?')); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			<?php echo e(__('You are going to update the status.')); ?> <?php echo e(__('Do you want proceed?')); ?>

		</div>

		<!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
            <a href="" class="btn btn-ok btn-success"><?php echo e(__('Update')); ?></a>
		</div>

      </div>
    </div>
  </div>




<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

  <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirm Delete?')); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
  </div>

  <!-- Modal Body -->
      <div class="modal-body">
        <?php echo e(__('You are going to delete this order. All contents related with this order will be lost.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

  </div>

  <!-- Modal footer -->
      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <form action="" class="d-inline btn-ok" method="POST">

      <?php echo csrf_field(); ?>
      <?php echo method_field('DELETE'); ?>
   <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>

    </form>
  </div>

    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/timesquartz/core/resources/views/back/order/cancellation_return.blade.php ENDPATH**/ ?>