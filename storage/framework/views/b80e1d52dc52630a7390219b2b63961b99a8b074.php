<?php $__env->startSection('content'); ?>
    
    <div class="container">

        <div class="col-lg-12">

              <fieldset>
     
                <h2>Orario</h2> 

                <h3>Orario classe: <?php echo e($classe->anno." ".$classe->sigla); ?></h3>                
                    
            
                  
                  <table class="table table-bordered table-hover table-condensed fixed table-striped">
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

                                        <div class="panel panel-info">
                                          <div class="panel-body">
                                            <strong>Docente:</strong><br>
                                            <?php echo e($orario->docente_nome); ?> <?php echo e($orario->docente_cognome); ?><br><br>
                                            <strong>Materia:</strong><br>
                                            <?php echo e($orario->materia_nome); ?> <br>
                                          </div>
                                        </div>
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