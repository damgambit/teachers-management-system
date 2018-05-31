<?php $__env->startSection('content'); ?>
    
    <div class="container">

        <div class="col-lg-7">

            <form action="<?php echo e(route('create_permessi')); ?>" method="post">
              <fieldset>
     
                <h2>Nuovo Permesso</h2>                 
                     
                  <div class="form-group">
                    <label for="giorno">Giorno</label>
                    <select class="form-control" name="giorno" required>
                        <option value="lun">lun</option>
                        <option value="mar">mar</option>
                        <option value="mer">mer</option>
                        <option value="gio">gio</option>
                        <option value="ven">ven</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="ora">Ora</label>
                    <select class="form-control" name="ora" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                  </div>
                     
                  <div class="form-group">
                    <label for="data">Data</label>
                    <input type="date" class="form-control" name="data" placeholder="Inserisci il data ..." required>
                  </div> 
                     
                  
                  <div class="form-group">
                    <label for="docente_id">Docente</label>
                    <select class="form-control" name="docente_id" required>
                        <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($docente->id); ?>">
                                <?php echo e($docente->cognome); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>  

                  <div class="form-group">
                    <label for="motivo_id">Motivo</label>
                    <select class="form-control" name="motivo_id" required>
                        <?php $__currentLoopData = $motivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($motivo->id); ?>">
                                <?php echo e($motivo->descrizione); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>  

                  <div class="form-group">
                    <label for="recupero">Recupero necessario</label>
                    <input type="checkbox"  name="recupero">

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
                    <th>Giorno</th>
                    <th>Ora</th>
                    <th>Data</th>
                    <th>Docente</th>
                    <th>Motivo</th>
                    <th>Recupero</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $permessos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permesso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($permesso->giorno); ?></td>
                            <td><?php echo e($permesso->ora); ?></td>
                            <td><?php echo e($permesso->data); ?></td>
                            <td><?php echo e($permesso->nome); ?></td>
                            <td><?php echo e($permesso->descrizione); ?></td>
                            <?php if($permesso->recupero === 1): ?>
                                <td>
                                    
                                    <form method="post" action="<?php echo e(route('update_recupero', $permesso->id)); ?>">
                                        <input type='hidden' value='0' name='recupero'>
                                        Recupero Necessario
                                        <button type="submit" class="btn btn-success">Conferma Recupero</button>

                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </td>


                            <?php else: ?>
                                <td>Recupero Non Necessario o Recuperato</td>
                            <?php endif; ?>

                            
                        

                            <td class="text-center">
                                <a href="<?php echo e(route('delete_permessi', $permesso->id)); ?>">
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