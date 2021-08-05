<?php $__env->startSection('content'); ?>
<?php if(session('create')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes!</strong> <?php echo e(session('create')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?php if(session('update')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes!</strong> <?php echo e(session('update')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?php if(session('delete')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes!</strong> <?php echo e(session('delete')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
       

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periode_create')): ?>
    <div style="margin-bottom: 10px;" class="row  float-right">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route("admin.periodes.create")); ?>">
                <i class="fas fa-plus"></i>
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
                           Nom
                        </th>
                        <th>
                            <?php echo e(trans('global.periode.fields.date_debut')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('global.periode.fields.date_fin')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('global.periode.fields.niveau_id')); ?>

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $periodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $periode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($periode->id); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($periode->name ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($periode->date_debut ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($periode->date_fin ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($periode->niveau->liblle ?? ''); ?>

                            </td>
                            <td>
                              <center>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periode_show')): ?>
                                    <a class="btn btn-xs btn-primary mr-2" href="<?php echo e(route('admin.periodes.show', $periode->id)); ?>">
                                       <i class="fas fa-eye"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periode_edit')): ?>
                                    <a class="btn btn-xs btn-info mr-2" href="<?php echo e(route('admin.periodes.edit', $periode->id)); ?>">
                                         <i class="fas fa-edit"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periode_delete')): ?>
                                    
                                    <button class="btn btn-xs btn-danger remove-periode" data-id="<?php echo e($periode->id); ?>" data-action="<?php echo e(route('admin.periodes.destroy', $periode->id)); ?>"> <i class="fas fa-trash "></i></button>

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
    url: "<?php echo e(route('admin.periodes.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        swal.fire('<?php echo e(trans('global.datatables.zero_selected')); ?>','','warning')

        return
      }
// 
Swal.fire({
       title: "Vous êtes sûr?",
        text: "Vous ne pourrez pas récupérer cette ligne!",
        type: "error",
        icon: 'warning',
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',cancelButtonText:'Annuler',
        confirmButtonText: 'Supprimer!',
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
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periode_delete')): ?>
  dtButtons.push(deleteButton)
<?php endif; ?>

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script type="text/javascript">
  $("body").on("click",".remove-periode",async  function(){
    var current_object = $(this);
    // console.log(current_object);
    // return;
  const WillDelete = await  swal.fire({
        title: "Vous êtes sûr?",
        text: "Vous ne pourrez pas récupérer cette ligne!",
        type: "error",
        icon: 'warning',
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',cancelButtonText:'Annuler',
        confirmButtonText: 'Supprimer!',
    });
    if(WillDelete){
        if (WillDelete.isConfirmed) {      console.log(WillDelete.isConfirmed);
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');
          console.log(action);
          // return;
            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/periodes/index.blade.php ENDPATH**/ ?>