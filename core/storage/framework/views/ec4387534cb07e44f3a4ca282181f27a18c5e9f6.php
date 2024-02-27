<?php $__env->startSection('title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="breadcum_oddk_category ">

<!-- Page Title-->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(__('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Tickets')); ?> </li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
</div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
  <div class="row">
         <?php echo $__env->make('includes.user_sitebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="col-lg-8 dashboard_tab">
            <div class="mb-2">
                <div class="card">
                    <div class="card-body d-flex flex-row justify-content-between align-items-center">
                        <p class="mb-0"><span class="badge badge-primary"><?php echo e($ticket->status); ?></span> <?php echo e(__('Subject :')); ?> <?php echo e($ticket->subject); ?></p>
                        <a href="<?php echo e(route('user.ticket')); ?>" class="btn btn-primary btn-sm"><?php echo e(__('Back')); ?></a>
                        <?php if($ticket->file): ?>
                        <a href="<?php echo e(asset('assets/files/'.$ticket->file)); ?>" title="Download" class="btn btn-primary btn-sm" download> <?php echo e(__('Attachment')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php if($ticket->messages->count() > 0): ?>
                    <?php $__currentLoopData = $ticket->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($message->user_id == 0): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="media">
                                    <div class="width-100 mr-3" >
                                        <?php echo e(__('Admin')); ?>

                                    </div>
                                    <div class="media-body">
                                        <small><span><?php echo e(__('Posted on')); ?> <?php echo e(\Carbon\Carbon::parse($message->created_at)->diffForHumans()); ?></span></small>
                                      <p><?php echo e($message->message); ?></p>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="media">
                                    <div class="width-100 mr-3" >
                                        <?php echo e(__('Me')); ?>

                                    </div>
                                    <div class="media-body">
                                        <small><span><?php echo e(__('Posted on')); ?> <?php echo e(\Carbon\Carbon::parse($message->created_at)->diffForHumans()); ?></span></small>
                                      <p><?php echo e($message->message); ?></p>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <?php if($ticket->status != 'Closed'): ?>
                    <form action="<?php echo e(route('user.ticket.reply')); ?>" method="post" enctype="multipart/form-data" class="contact-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($ticket->id); ?>" name="ticket_id">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="inputMessage"><?php echo e(__('Message')); ?> *</label>
                                <textarea name="message" class="form-control" id="inputMessage" placeholder="<?php echo e(__('Message')); ?>" rows="6"></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button class="btn btn-primary btn-sm" type="submit"><span><?php echo e(__('Reply')); ?></span></button>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
            </div>

          </div>
        </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/core/resources/views/user/dashboard/ticket-view.blade.php ENDPATH**/ ?>