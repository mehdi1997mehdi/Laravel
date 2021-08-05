<?php $__env->startSection('content'); ?>

     

<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php echo e(session('success')); ?>

</div>
<?php elseif(session('danger')): ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php echo e(session('danger')); ?>

</div>
<?php elseif(session('dangerr')): ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php echo e(session('dangerr')); ?>

</div>
<?php elseif(session('updatesuccess')): ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php echo e(session('updatesuccess')); ?>

</div>
<?php elseif(session('updatedanger')): ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php echo e(session('updatedanger')); ?>

</div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        
        <div style="margin-bottom: 10px;" class="row float-right">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route("stagaire.demandes.create")); ?>">
                <i class=" fas fa-plus"></i>  <?php echo e(trans('global.demande.title_singular')); ?>

            </a>
        </div>
    </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                       
                        <th>
                            <?php echo e(trans('global.demande.fields.stage')); ?>

                        </th>
                    
                      
                        <th>
                            <?php echo e(trans('global.demande.fields.type')); ?>

                        </th>
                        <th>
                            Etat demande
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $demandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $demande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($demande->id); ?>">
                            <td>

                            </td>
                              <td class="text-center">
                                <?php echo e($demande->stage->name ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($demande->type_dem ?? ''); ?>

                            </td>
                             <td class="text-center">
                                <?php if($demande->demande_validé): ?>
                                <span class="badge badge-success text-bold">Accepté</span>
                                <?php elseif(is_null($demande->demande_validé)): ?>
                                 <span class="badge badge-dark text-bold ">En cours</span>
                                 <?php else: ?>
                                 <span class="badge badge-danger text-bold">Réfusé</span>
                                 <?php endif; ?>
                            </td>
                            
                            <td>
                                <center>
                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('demande_show')): ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('stagaire.demandes.show', $demande->id)); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('demande_edit')): ?>
                                <?php if(is_null($demande->demande_validé)): ?>
                                <a  class="btn btn-xs btn-info" href="<?php echo e(route('stagaire.demandes.edit', $demande->id)); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if(!is_null($demande->demande_validé)): ?>
                                <a  class="btn btn-xs btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                <?php endif; ?>
                                <?php endif; ?>
                                
                                </center>
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
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('stagaire.demandes.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
            return $(entry).data('entry-id')
        });

        if (ids.length === 0) {
            alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

            return
        }

        if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                $.ajax({
                headers: {'x-csrf-token': _token},
                method: 'POST',
                url: config.url,
                data: { ids: ids, _method: 'DELETE' }})
                .done(function () { location.reload() })
         }
        }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('demande_delete')): ?>
  dtButtons.push(deleteButton)
<?php endif; ?>

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script> 
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/demandes/index.blade.php ENDPATH**/ ?>