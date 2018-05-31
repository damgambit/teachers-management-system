<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <h2>Classe concorso: <?php echo e($cc->sigla); ?></h2>
        <div class="col-lg-7">

            <form action="<?php echo e(route('add_ccmateria')); ?>" method="post">
              <h3>Aggiungi materia a classe concorso</h3>

              <div class="form-group">
                <label for="materia_id">Seleziona materia</label>
                <select name="materia_id" class="form-control" id="materia_id" >
                    <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($materia->id); ?>"><?php echo e($materia->nome); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <input type="hidden" value="<?php echo e($cc->id); ?>" name="classi_concorso_id">
              <?php echo e(csrf_field()); ?>

              <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>


            <br><br>

            <table class="table table-bordered table-hover table-condensed table-striped">

                <thead>
                    <th>Nome Materia</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $cc_materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc_materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cc_materia->nome); ?></td>
                            


                            <td class="text-center">
                                <a href="<?php echo e(route('delete_ccmateria', [$cc->id, $cc_materia->id])); ?>">
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