<?php $__env->startSection('content'); ?>
    
    <div class="container">

        <div class="col-lg-12">

            <form action="" method="post">
              <fieldset>
     
                <h2>Sostituzioni</h2> 

                <h3>Orari scoperti data: <?php echo e($date); ?></h3>                
                    
            
                  
                  <table class="table table-bordered table-hover table-condensed fixed table-striped">
                        <thead>
                            
                            <th>Classe</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                                
                        </thead>

                        <tbody >
                          <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td width="5%">
                                <br><br><br>
                                <?php echo e($k); ?>

                              </td>
                              <?php $__currentLoopData = [1,2,3,4,5,6,7]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($ora == $elem->ora): ?>
                                    <td width="13.5%">
                                      <strong>Docente: </strong><?php echo e($elem->cognome); ?> <br>
                                      <strong>Motivo: </strong><?php echo e($elem->motivo->descrizione); ?> <br><br>
                                      <strong>Sostituzione: </strong>
                                      <form action="<?php echo e(route('add_sostituzione')); ?>" method="post">
                                        <select name="docente_id">
                                          <?php $__currentLoopData = $docs[$elem->anno.$elem->sigla][$ora]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <option value="<?php echo e($doc->docente_id); ?>">
                                                <?php echo e($doc->cognome); ?> (<?php echo e($doc->descrizione); ?>)
                                            </option>
                                            
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <button type="submit" class="btn btn-info">
                                          Crea Sostituzione
                                        </button>
                                      </form>
                                    </td>
                                  <?php else: ?>
                                    <td width="13.5%"></td>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                  </table>  




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