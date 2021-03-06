<?php $__env->startSection('content'); ?>
<?php if(session('create')): ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    <?php echo e(session('create')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
<?php if(session('update')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    <?php echo e(session('update')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<?php if(session('delete')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    <?php echo e(session('delete')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<div class="card">
    <div class="card-header">
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stage_create')): ?>
    <div style="margin-bottom: 10px;" class="row float-right ">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route("admin.stages.create")); ?>">
                <i class="fas  fa-plus"></i>
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
                            <?php echo e(trans('global.stage.fields.services')); ?>

                        </th>
                        <th>
                            
                            Niveau
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($stage->id); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($stage->name ?? ''); ?>

                            </td>
                            <td>
                                    <?php echo e($stage->service->name); ?>

                            </td>
                            <td>
                                <?php echo e($stage->niveau->liblle); ?>

                        </td>
                            <td>
                                 <center>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stage_show')): ?>
                                    <a class="btn btn-xs btn-primary mr-2" href="<?php echo e(route('admin.stages.show', $stage->id)); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stage_edit')): ?>
                                    <a class="btn btn-xs btn-info mr-2" href="<?php echo e(route('admin.stages.edit', $stage->id)); ?>">
                                         <i class="fas fa-edit" ></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stage_delete')): ?>
                                <button class="btn btn-xs btn-danger remove-stage" data-id="<?php echo e($stage->id); ?>" data-action="<?php echo e(route('admin.stages.destroy', $stage->id)); ?>"> <i class="fas fa-trash "></i></button>

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
    url: "<?php echo e(route('admin.stages.massDestroy')); ?>",
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
  title: "Vous ??tes s??r?",
        text: "Vous ne pourrez pas r??cup??rer cette ligne!",
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
      title:'Supprim??',
      text:'Votre ligne a ??t?? supprim??.',
      icon:'success',
      timer:3000
    })
  }
})
// 
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stage_delete')): ?>
  dtButtons.push(deleteButton)
<?php endif; ?>

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script type="text/javascript">
  $("body").on("click",".remove-stage",async  function(){
    var current_object = $(this);
    // console.log(current_object);
    // return;
  const WillDelete = await  swal.fire({
        title: "Vous ??tes s??r?",
        text: "Vous ne pourrez pas r??cup??rer cette ligne!",
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/stages/index.blade.php ENDPATH**/ ?>