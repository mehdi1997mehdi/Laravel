<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', Model::class)): ?>
    
<?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(Auth::user()->isEtudiant()): ?>
            <?php
                        $user=Auth::user()->profile;
                        $groupe=$user->groupe;
                        $stages=$groupe->stages;
                        $arrservices=$stages->pluck('service_id')->toArray();
                        $encadants=App\Encadrant::whereIn('service_id',$arrservices);
                        $demandeA=App\Demande::where('id_stagaire',$user->id)->where('demande_validé',1);
                        $demandeR=App\Demande::where('id_stagaire',$user->id)->where('demande_validé',0);
                        $demandeC=App\Demande::where('id_stagaire',$user->id)->where('demande_validé',null);
            ?>

   
<div class="card " style="margin-left: 200px; margin-right: 200px;">
  <table class="table table-borderless table-responsive d-flex justify-content-sm-center " style='font-family: "Comic Sans MS", cursive, sans-serif;'>
    <tr>
        <td>
           <div class="card pr-4 pl-4 mt-3"  style="background-color:#bf56f0;color:white;"> 

                               <div class="d-inline"><p>Stages</span> <i class="badge badge-dark"><?php echo e($stages->count()); ?></i>  <span class="float-right fas fa-stethoscope py-2 pl-2"></span></div> 
                 
            </div>
        </td>
        <td>
            <div class="card pr-4 pl-4 mt-3" style="background-color:#4778d1;color: white;"> 
                
                               <div class="d-inline"><p>Demandes acceptées</span> <i class="badge badge-success"><?php echo e($demandeA->count()); ?></i>  <span class="float-right fas fa-check py-2 pl-2"></span></div> 
                
            </div>
              <div class="card pr-4 pl-4 mt-3" style="background-color:#4778d1;color:white;"> 
                                            
                                               <div class="d-inline"><p>Demandes réfusées</span> <i class="badge badge-danger"><?php echo e($demandeR->count()); ?></i>  <span class="float-right fas fa-close py-2 pl-2"></span></div> 
              </div>
              <div class="card pr-4 pl-4 mt-3" style="background-color:#4778d1;color:white;"> 
                                            
                                               <div class="d-inline"><p>Demandes en cours</span> <i class="badge badge-dark"><?php echo e($demandeC->count()); ?></i>  <span class="float-right fas fa-eye-slash py-2 pl-2"></span></div> 
             </div>

        </td>
        <td>
            <div class="card pr-4 pl-4 mt-3 " style="background:#66c06b;color:white;"> 
                             
                               <div class="d-inline"><p>Encadrants</span> <i class="badge  badge-dark"><?php echo e($encadants->count()); ?></i>  <span class="float-right fas fa-medkit py-2 pl-2"></span></div> 
                  
            </div>
        </td>
    </tr>  
  </table>
  </div>
  <div class="card">
                <div class="card-title" style="background-color:#a05eac;color:white;">
                    <h3 class="card-text text-center text-black text-xl"><?php echo e(trans('global.cursus.title')); ?></h3>
                </div>
                <div class="card-body d-flex">
                <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover  text-center  ">
                            
                                <tr>
                                    <th>
                                        <?php echo e(trans('global.stage.title_singular')); ?>

                                    </th>  
                                    <th >
                                        <?php echo e(trans('global.periode.title_singular')); ?>

                                    </th>
                                     <th>
                                       Service
                                    </th>
                                    <th >
                                        
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </th>

                                   
                                </tr>        
                                <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-entry-id="<?php echo e($stage->id); ?>">
                                    <?php
                                            $periode_id=$stage->pivot->periode_id ;
                                           $periode=App\Periode::find($periode_id);
                                    ?>

                                    <td >
                                       <i class="badge badge-primary"><?php echo e($stage->name ?? ''); ?></i> 
                                    </td>
                                    <td >
                                        <i class="badge badge-info"><?php echo e($periode->name ?? ''); ?></i>
                                    </td>
                                    <td>
                                       <i class="badge badge-warning"><?php echo e($stage->service->name); ?> </i> 
                                    </td>
                                    <td>
                                        <i  class="badge badge-dark"><?php echo e($periode->date_debut ?? ''); ?></i>
                                        <i class=" 	fa fa-long-arrow-right"></i>
                                        <i class="badge badge-dark"><?php echo e($periode->date_fin ?? ''); ?></i>
                                    </td>
 
                                 </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
             </table>    
     </div>
</div>   


 
            
            <?php elseif(Auth::user()->isAdmin()): ?>
          
                 
                 
                 
                <div class="card-columns">
                          <div class="card" style="background-color: #b19f9f;">
                            <div class="card-body text-center">
                                <div class="fa fa-user-md fa-2x "></div>
                              <p class="card-text">Nombre totales des etudiants  <span class="badge badge-light"><?php echo e($stagaire->count()); ?></span></p>
                            </div>
                          </div>
                          <div class="card " style="background-color: #cfa98c;">
                             <div class="card-body text-center">
                                <div class="fas fa-briefcase-medical fa-2x "></div>
                            <p class="card-text">Nombre totales des encadrants  <span class="badge badge-light"><?php echo e(App\Encadrant::count()); ?></span></p>
                            </div>
                          </div>
                          <div class="card " style="background-color: #9a90c5;">
                           <div class="card-body text-center">
                            <div class="fas fa-user-edit md fa-2x"></div>
                            <p class="card-text">Nombre totales des secretaires  <span class="badge badge-light"><?php echo e(App\Secretaire::count()); ?></span></p>
                            </div>
                          </div>
                          <div class="card " style="background-color: #b68989;">
                          <div class="card-body text-center">
                            <div class="fas fa-microscope fa-2x"></div>
                           <p class="card-text">Nombre totales des services d'accueil  <span class="badge badge-light"><?php echo e($service->count()); ?></span></p>
                            </div>
                          </div>
                            <div class="card" style="background-color: #8cc7bf;">
                                <div class="card-body text-center">
                                    <div class="fas fa-file-medical-alt fa-2x"></div>
                                   <p class="card-text">Nombre totales des stages <span class="badge badge-light"><?php echo e($stage->count()); ?></span></p>
                                </div>
                       </div>
                          <div class="card " style="background-color: #7798b3;">
                            <div class="card-body text-center">
                                <div class="fa far fa-hospital fa-2x "></div>
                                   <p class="card-text">Nombre totale des lieus des stages <span class="badge badge-light">
                                   
                                    <?php
                                     $p=\DB::select('select distinct lieu from services');
                                   ?>
                                  <?php echo e(count($p)); ?>

                                </span></p> 
                             </div>
                          </div>
                 </div>

                  


            <?php elseif(Auth::user()->isEncadrant()): ?>
            <?php
                $niveaux=App\Niveau::all();
            ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong > <?php echo e(trans('global.choix')); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="card">
                <div class="card-header">
                  <div class="container-sm text-center">
                     <h1 class="badge badge-dark text-bold"><?php echo e('Planing  des Stages '); ?>  </h1>
           </div>
                <div class="form-group <?php echo e($errors->has('niveau_id') ? 'has-error' : ''); ?>">
                  <div class="row ">
                    <label class="text-right col-sm-2" for="niveau_id"><strong class="text-secondary"> <?php echo e(trans('global.periode.fields.niveau_id')); ?> :</strong></label>
                    <select name="niveau_id" id="niveau_id" class=" col-sm-3 custom-select custom-select-sm " >
                        <option value="0" selected><?php echo e(trans('global.repartition.fields.choix')); ?></option>
                        <?php $__currentLoopData = $niveaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $niveau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="niveau_id" value="<?php echo e($niveau->id); ?>">
                                <?php echo e($niveau->liblle); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p class="helper-block"></p>
                        <?php echo e(trans('global.repartition.fields.niveau_id_helper')); ?>

                    </p>
                    </select>
                   <button  id="but_search" class="btn btn-info mx-3 py-0 px-3" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                  <div class="text-center "> </div> 
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class=" table table-bordered table-striped table-hover ">
                          <thead>
                              <tr>
          
                                  <th class="text-center">
                                      <?php echo e(trans('global.periode.title_singular')); ?>

                                      
                                  </th>
                                  <th class="text-center">
                                      <?php echo e(trans('global.stage.title_singular')); ?>

                                      
                                  </th>
                                  <th class="text-center">
                                    <?php echo e(trans('global.groupe.title_singular')); ?>

          
                                     
                                  </th>
                                 
                                  <th>
                                      &nbsp;
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $periodes=App\Periode::where('niveau_id',$niveau->id)->get();
                            ?>
                              <?php $__currentLoopData = $periodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                              
                                     
                                     <td rowspan="<?php echo e($periode->stages->unique()->count()+1); ?>">
                                      <strong>
                                         <center > <h3 class="badge badge-danger"><?php echo e($periode->name ?? ''); ?></h3> <hr><br> <br> <br><br> </center>
                                         <center ><p class="badge badge-dark"> <?php echo e($periode->date_debut ?? ''); ?> <i class=" 	fa fa-long-arrow-right"></i>
                                         <?php echo e($periode->date_fin ?? ''); ?> </p></center>
                                      </strong>
                                        </td>
                                       <?php $__currentLoopData = $periode->stages->unique(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
                                        <?php
                                              $groupes=\DB::select('select * from groupes g,stage_groupe_periode p where p.periode_id= ? and p.stage_id=? and p.groupe_id=g.id',[$periode->id,$stage->id]);
                                         ?>
                                         <tr>
                                              <td class="text-center">
                                               <strong class="text-bold"> <?php echo e($stage->name?? ''); ?></strong>
                                              </td>
                                          <td class="text-center"> 
                                        <?php $__currentLoopData = $groupes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <span class="badge badge-light"><?php echo e($groupe->name); ?></span><br> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </td>
                                         </tr>    
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                      <td>
                                      
                                      </td>
                                      <td>
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_show')): ?>
                                 
                                          <?php endif; ?>
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_edit')): ?>
          
                                          <?php endif; ?>
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_delete')): ?>
          
                                          <?php endif; ?>
                                      </td>
                                  </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody> 
                      </table>
                  </div>
               </div>
               
              
          </div>
                  
            
                  

            <?php else: ?>
                home

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script type='text/javascript'>
    $(document).ready(function(){


     $('#but_search').click(function(){
     
           var niveau_id = Number($('#niveau_id').val().trim());
           console.log(niveau_id);
           var action = '/stagaire/getPeriode/'+niveau_id;
           $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
           $('body').find('.remove-form').append('<input name="_method" type="hidden" value="get">');
           $('body').find('.remove-form').submit();

});

    });

 </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/home.blade.php ENDPATH**/ ?>