<?php $__env->startSection('content'); ?>
    
    <div class="container">

        <div class="col-lg-7">

            <form action="<?php echo e(route('create_motivi')); ?>" method="post">
              <fieldset>
     
                <h2>Nuovo Motivo</h2>                 
                     
                  <div class="form-group">
                    <label for="descrizione">Descrizione</label>
                    <input type="text" class="form-control" name="descrizione" placeholder="Inserisci la descrizione...">
                  </div>
                  
                  <?php echo e(csrf_field()); ?>


                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                  <button type="submit" class="btn btn-primary">Aggiungi</button>

                 </fieldset>

              
              
            </form>


            <br><br>

            <table class="table table-bordered table-hover table-condensed table-striped">

                <thead>

                    <th>Descrizione</th>
                    <th>Info</th>
                    <th>Elimina</th>
                    
                </thead>

                <tbody>
                    <?php $__currentLoopData = $motivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>

                            <td><?php echo e($motivo->descrizione); ?></td>

                            
                            <td class="text-center">
                                <a href="<?php echo e(route('info_motivi', $motivo->id)); ?>">
                                    <button class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="<?php echo e(route('delete_motivi', $motivo->id)); ?>">
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