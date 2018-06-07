<?php $__env->startSection('body_class','nav-md'); ?>

<?php $__env->startSection('page'); ?>
    <div class="container body" style="background-color: white">
        <div class="main_container" style="background-color: white">

<div class="container" style="background-color: white">

        <div class="col-lg-12" style="background-color: white">

              <fieldset>
     
                <h3>Orario classe: <?php echo e($classe->anno." ".$classe->sigla); ?></h3> 

                    
            
                  
                  <table class="table">
                        <thead>
                            
                            <th>Giorno</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
       
                                
                        </thead>

                        <tbody>

                          <?php $__currentLoopData = $giornos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $giorno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td width="4%"><?php echo e($giorno); ?></td>

                              <?php $__currentLoopData = $oras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td width="13.5%">
                                  <div class="panel-group">
                                    <?php $__currentLoopData = $orarios[$ora]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($orario->giorno == $giorno): ?>
                                        <?php if($classe->sigla != 'DDD' && $classe->sigla != 'DDPP'): ?>
                                            

                                                <strong>Docente:</strong>
                                                <?php echo e($orario->docente_nome); ?> <?php echo e($orario->docente_cognome); ?><br>
                                                
                                                  <strong>Materia:</strong>
                                                  <?php echo e($orario->materia_nome); ?> <br>
                                                
                                            
                                        <?php else: ?>
                                              <?php echo e($orario->docente_nome); ?> <?php echo e($orario->docente_cognome); ?>

                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </div>
                                </td>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </tbody>

                  </table>  

                  

                 </fieldset>

              
              


            

        </div>

    </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo e(Html::style(mix('assets/admin/css/admin.css'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo e(Html::script(mix('assets/admin/js/admin.js'))); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>