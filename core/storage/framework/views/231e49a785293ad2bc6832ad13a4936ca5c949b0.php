<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0"><b><?php echo e(__('Review Details')); ?></b></h3>
                <a class="btn btn-primary  btn-sm" href="<?php echo e(route('back.review.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
                </div>
        </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body p-5">
					<!-- Nested Row within Card Body -->
                    <div class="table-responsive dashboard-table">
                        <table class="table">
                            <tr>
                                <th><?php echo e(__("First Name")); ?></th>
                                <td><?php echo e($review->user->first_name); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__("Last Name")); ?></th>
                                <td><?php echo e($review->user->last_name); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__("Email Address")); ?></th>
                                <td><?php echo e($review->user->email); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__("Phone Number")); ?></th>
                                <td><?php echo e($review->user->phone); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__("Country Name")); ?></th>
                                <td><?php echo e($review->user->country); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__("Rating")); ?></th>
                                <td><?php echo e($review->rating); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e(__("Review")); ?></th>
                                <td><?php echo e($review->review); ?></td>
                            </tr>
                        </table>
                    </div>
				</div>
			</div>

		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/back/review/show.blade.php ENDPATH**/ ?>