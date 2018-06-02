<?php $__env->startSection('content'); ?>
    
    <div class="container">

        <div class="col-lg-7">

            <form action="<?php echo e(route('create_orario_doc')); ?>" method="get">
              <fieldset>
     
                <h2>Orario Docente</h2>                 
                    
            
                  
                  <div class="form-group">
                    <label for="docente_id">Docente</label>
                    <select class="form-control" name="docente_id" required>
                        <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($docente->id); ?>">
                                <?php echo e($docente->cognome); ?> <?php echo e($docente->nome); ?> 
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>  




                  <?php echo e(csrf_field()); ?>



                  <button type="submit" class="btn btn-primary">Orario Docente</button>

                 </fieldset>

            </form>


            <br><hr><br>



            <form action="<?php echo e(route('show_orario_classe')); ?>" method="get">
              <fieldset>
     
                <h2>Orario Classe</h2>                 
                    
            
                  
                  <div class="form-group">
                    <label for="classe_id">Classe</label>
                    <select class="form-control" name="classe_id" required>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($classe->id); ?>">
                                <?php echo e($classe->anno); ?> <?php echo e($classe->sigla); ?> 
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>  




                  <?php echo e(csrf_field()); ?>


         
                  <button type="submit" class="btn btn-primary">Orario Classe</button>

                 </fieldset>

            </form>


            

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