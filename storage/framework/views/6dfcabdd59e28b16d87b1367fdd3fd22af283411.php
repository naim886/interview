<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body settings-page">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h3>Recent Post Sent To Buffer</h3>
                <form class="form-inline" method="get" action="<?php echo e(route('post.search')); ?>">
                    <input type="text" name="text" class="form-control" placeholder="Search">
                    <input type="date" name="date" class="form-control custom-field" placeholder="Search">
                    <select class="form-control" name="group">
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option class="form-control" value="<?php echo e($group); ?>"><?php echo e($group); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                </form>
                <table class="table table-bordered custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Group Name</th>
                            <th scope="col">Group Type</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Post Text</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td scope="col"><?php echo e($post->groupInfo->name); ?></td>
                            <td scope="col"><?php echo e($post->groupInfo->type); ?></td>
                            <td scope="col"><img  class="img-circle" src="<?php echo e($post->accountInfo->avatar); ?>" width="48px"></td>
                            <td scope="col"><?php echo e($post->post_text); ?></td>
                            <td scope="col"><?php echo e($post->created_at->toDayDateTimeString()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <?php echo e($posts->appends(Request::except('page'))->links()); ?>

            </div>

        </div>


    </div>

<style>
    @media  screen and (-webkit-min-device-pixel-ratio: 0) {
        input[type="date"].form-control, custom-field, input[type="time"].form-control, input[type="datetime-local"].form-control,  input[type="select"].form-control, input[type="month"].form-control {
            line-height: 18px !important;
        }
    }
</style>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>