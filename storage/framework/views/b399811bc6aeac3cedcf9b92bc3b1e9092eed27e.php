<?php $__env->startSection('content'); ?>
    
    <div class="container">

        <div class="col-lg-7">

              <fieldset>
     
                <h2>Orario <?php echo e($docente->nome); ?></h2> 

                    <table class="table table-bordered table-hover table-condensed table-striped">
                        <thead>
                            
                            <th>Ora</th>
                            <th>Lunedì</th>
                            <th>Martedì</th>
                            <th>Mercoledì</th>
                            <th>Giovedì</th>
                            <th>Venerdì</th>
                                
                        </thead>

                        <tbody>
                            
                            <?php $__currentLoopData = [1,2,3,4,5,6,7]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($ora); ?></td>

                                    <?php $__currentLoopData = ['lun', 'mar', 'mer', 'gio', 'ven']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td>
                                            <?php $__currentLoopData = $orarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($orario->giorno == $day && $orario->ora == $ora): ?>
                                                    classeeee
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>            
                    
                    <?php $__currentLoopData = ['lun', 'mar', 'mer', 'gio', 'ven']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $giorno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <table class="table table-bordered table-hover table-condensed table-striped">

                            <thead>
                                <th>Ora</th>
                                <th><?php echo e($giorno); ?></th>
                                
                            </thead>

                            <tbody>

                                <?php $__currentLoopData = [1,2,3,4,5,6,7]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e($ora); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('create_orario_doc_add', [$giorno, $ora])); ?>" method="POST">

                                                <input type="hidden" value="<?php echo e($docente->id); ?>" name="docente">

                                                <select name="classe">

                                                    
                                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option value="<?php echo e($classe->id); ?>">
                                                            <?php echo e($classe->anno); ?> <?php echo e($classe->sezione->sigla); ?> 
                                                        </option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>

                                                <select name="materia">

                                                    <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option value="<?php echo e($materia->id); ?>">
                                                            <?php echo e($materia->nome); ?> 
                                                        </option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>

                                                <button type="submit" class="btn btn-success">
                                                    +
                                                </button>

                                                <?php echo e(csrf_field()); ?>


                                            </form>
                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                
                            </tbody>

                        </table>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          




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

                 </fieldset>

              
              


            

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