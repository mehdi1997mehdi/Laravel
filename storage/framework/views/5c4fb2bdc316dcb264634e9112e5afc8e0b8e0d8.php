<?php $__env->startSection('content'); ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    affectation de <?php echo e($niveau->liblle); ?> est terminé avec succes
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


 <div class="card">
     <div class="card-header"> 
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_create')): ?>
        <div style="margin-bottom: 10px;" class="row float-right">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route("stagaire.affectation.index")); ?>">
                     Regrouper
                </a>
            </div>
        </div>
         <?php endif; ?>
     </div>
     <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            
                            CNE
                        </th>
                        <th>
                            
                            Nom
                        </th>
                        <th>
                            Prenom

                        </th>
                        <th>
                            
                            <?php echo e(trans('global.groupe.fields.groupe_sh')); ?>


                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e(''); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($etudiant->cne ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($etudiant->nom ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($etudiant->prenom ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($etudiant->stagaire->groupe->name ?? ''); ?>

                            </td>
                            <td>

                              <center>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_show')): ?>

                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_edit')): ?>

                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_delete')): ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/affectation/list.blade.php ENDPATH**/ ?>