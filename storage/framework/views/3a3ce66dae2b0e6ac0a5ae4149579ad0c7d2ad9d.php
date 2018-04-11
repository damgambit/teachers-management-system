<?php $__env->startSection('content'); ?>
    
    <div class="container">

        <div class="col-lg-7">

            <form action="<?php echo e(route('create_classi_concorso')); ?>" method="post">
              <h3>Nuova classe concorso</h3>

              <div class="form-group">
                <label for="sigla">Sigla classe concorso</label>
                <input type="text" name="sigla" class="form-control" id="sigla" aria-describedby="sigla" placeholder="Inserire sigla clase concorso">
              </div>
              <?php echo e(csrf_field()); ?>

              <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>


            <br><br>

            <table class="table table-bordered table-hover table-condensed table-striped">

                <thead>
                    <th>Nome Classe Concorso</th>
                    <th>Materie</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $ccs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cc->sigla); ?></td>
                            
                            <td class="text-center">
                                <a href="<?php echo e(route('materie_classi_concorso', $cc->id)); ?>">
                                    <button class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="<?php echo e(route('delete_classi_concorso', $cc->id)); ?>">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>

        </div>

    </div>
    
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