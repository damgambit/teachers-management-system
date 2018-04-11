<?php $__env->startSection('content'); ?>
    <!-- page content -->
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> <?php echo e(__('views.admin.dashboard.count_0')); ?></span>
            <div class="count green"><?php echo e($counts['users']); ?></div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-address-card"></i> <?php echo e(__('views.admin.dashboard.count_1')); ?></span>
            <div>
                <span class="count green"><?php echo e($counts['users'] - $counts['users_unconfirmed']); ?></span>
                <span class="count">/</span>
                <span class="count red"><?php echo e($counts['users_unconfirmed']); ?></span>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user-times "></i> <?php echo e(__('views.admin.dashboard.count_2')); ?></span>
            <div>
                <span class="count green"><?php echo e($counts['users'] - $counts['users_inactive']); ?></span>
                <span class="count">/</span>
                <span class="count red"><?php echo e($counts['users_inactive']); ?></span>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-lock"></i> <?php echo e(__('views.admin.dashboard.count_3')); ?></span>
            <div>
                <span class="count green"><?php echo e($counts['protected_pages']); ?></span>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="log_activity" class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3><?php echo e(__('views.admin.dashboard.sub_title_0')); ?></h3>
                    </div>
                    <div class="col-md-6">
                        <div class="date_piker pull-right"
                             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span class="date_piker_label">
                                <?php echo e(\Carbon\Carbon::now()->addDays(-6)->format('F j, Y')); ?> - <?php echo e(\Carbon\Carbon::now()->format('F j, Y')); ?>

                            </span>
                            <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="chart demo-placeholder" style="width: 100%; height:460px;"></div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <div class="x_title">
                        <h2><?php echo e(__('views.admin.dashboard.sub_title_1')); ?></h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div>
                            <p><?php echo e(__('views.admin.dashboard.log_level_0')); ?></p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-emergency" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><?php echo e(__('views.admin.dashboard.log_level_1')); ?></p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-alert" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><?php echo e(__('views.admin.dashboard.log_level_2')); ?></p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-critical" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><?php echo e(__('views.admin.dashboard.log_level_3')); ?></p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="asdasdasd"></div>
                                    <div class="progress-bar log-error" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><?php echo e(__('views.admin.dashboard.log_level_4')); ?></p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-warning" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><?php echo e(__('views.admin.dashboard.log_level_5')); ?></p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-notice" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><?php echo e(__('views.admin.dashboard.log_level_6')); ?></p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-info" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><?php echo e(__('views.admin.dashboard.log_level_7')); ?></p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar log-debug" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <br />

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/dashboard.js'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/dashboard.css'))); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>