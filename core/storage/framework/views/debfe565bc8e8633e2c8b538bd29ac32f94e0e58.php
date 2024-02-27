<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 "><b><?php echo e(__('Update Template')); ?></b> </h3>
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.setting.email')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
                </div>
        </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row">

                        <div class="col-lg-6">
                            <div class="gd-responsive-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><?php echo e(__('BB Code')); ?></th>
                                    <th><?php echo e(__('Meaning')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{user_name}</td>
                                    <td><?php echo e(__('Name of the customer')); ?></td>
                                </tr>
                                <tr>
                                    <td>{order_cost}</td>
                                    <td><?php echo e(__('Order Cost')); ?></td>
                                </tr>
                                <tr>
                                    <td>{site_title}</td>
                                    <td><?php echo e(__('Site Title')); ?></td>
                                </tr>
                                <tr>
                                    <td>{transaction_number}</td>
                                    <td><?php echo e(__('Order Transaction Number')); ?></td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>


						<div class="col-lg-6">
								<form class="admin-form" action="<?php echo e(route('back.template.update',$template->id)); ?>"
									method="POST" enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('PUT'); ?>

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

									<div class="form-group">
										<label for="subject"><?php echo e(__('Subject')); ?> *</label>
										<input type="text" name="subject" class="form-control" id="subject"
											placeholder="<?php echo e(__('Enter Subject')); ?>" value="<?php echo e($template->subject); ?>" >
									</div>

									<div class="form-group">
										<label for="body"><?php echo e(__('Body')); ?> *</label>
										<textarea name="body" id="body" class="form-control " rows="5"
											placeholder="<?php echo e(__('Enter Email Body')); ?>"
											><?php echo e($template->body); ?></textarea>
									</div>

								<div class="form-group">
										<button type="submit"
											class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
									</div>

									<div>
								</form>
                        </div>

					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/back/email_template/edit.blade.php ENDPATH**/ ?>