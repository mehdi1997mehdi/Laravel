<?php $__env->startSection('content'); ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    Repartition est terminé avec succés!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
  $periodes=App\Periode::where('niveau_id',$niveau_id)->get();
  ?>
  <div class="card">
      <div class="card-header">
        <div class="container-sm text-center">
           <h1 class="badge badge-dark text-bold"><?php echo e('Planing  des Stages '); ?>  </h1>
</div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_create')): ?>
    <div style="margin-bottom: 10px;" class="row float-right">
      <div class="col-lg-12">
          <a class="btn btn-success" href="<?php echo e(route("stagaire.repartition.choix")); ?>">
              <i class="fas fa-plus"></i> Planning 
          </a>
      </div>
  </div>
     <?php endif; ?>
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
<?php $__env->startSection('scripts'); ?> 
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
  $(function () {
let deleteButtonTrans = ''
let deleteButton = {
  text: deleteButtonTrans,
  url: "<?php echo e(route('stagaire.affectation.show')); ?>",
  className: '',
  action: function (e, dt, node, config) {
    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
        return $(entry).data('entry-id')
    });

    if (ids.length === 0) {
      swal.fire('<?php echo e(trans('global.datatables.zero_selected')); ?>','','error')

      return
    }
// 
Swal.fire({
title: 'Vous êtes sûr?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.value) {
  $.ajax({
        headers: {'x-csrf-token': _token},
        method: 'POST',
        url: config.url,
        data: { ids: ids, _method: 'DELETE' }})
        .done(function () { location.reload() })
  Swal.fire({
    title:'Supprimé',
    text:'Votre ligne a été supprimé.',
    icon:'success',
    timer:3000
  })
}
})
// 
  }
}
let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
$('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/repartition/index.blade.php ENDPATH**/ ?>