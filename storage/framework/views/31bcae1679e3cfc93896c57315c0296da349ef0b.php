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
        
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('global.demande.fields.cne')); ?>

                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                        Prenom
                        </th>
                        <th>
                            <?php echo e(trans('global.groupe.fields.niveau_id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('global.groupe.fields.groupe_tot')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('global.demande.fields.stage')); ?>

                        </th>
                    
                      
                        <th>
                            <?php echo e(trans('global.demande.fields.type')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('global.demande.fields.etat')); ?>

                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $demandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $demande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!is_null($demande->demande_validé)): ?>
                        <tr data-entry-id="<?php echo e($demande->id); ?>">
                            <td>

                            </td>
                            <td  class="text-center">
                                <?php echo e($demande->stagaire->etudiant->cne ?? ''); ?>

                            </td>
                            <td class="text-center">
                                  <?php echo e($demande->stagaire->etudiant->prenom ?? ''); ?>

                            </td>
                            <td class="text-center">
                                  <?php echo e($demande->stagaire->etudiant->nom ?? ''); ?>

                            </td>
                            <td class="text-center">
                                  <?php echo e($demande->stagaire->etudiant->niveau->liblle?? ''); ?>

                            </td>
                            <td class="text-center">
                                  <?php echo e($demande->stagaire->groupe->name ?? ''); ?>

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
                            
                            <td width="100">
                                <center>
                              
                                    <a class="btn btn-xs btn-primary "  href="<?php echo e(route('admin.demandes.show', $demande->id)); ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                  

                                    <button class="btn btn-xs btn-danger remove-demande" data-id="<?php echo e($demande->id); ?>" data-action="<?php echo e(route('admin.demandes.destroy', $demande->id)); ?>"> <i class="fas fa-trash "></i></button>

                                
                                

                                </center>
                            </td>

                        </tr>
                        <?php endif; ?>
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
    url: "<?php echo e(route('admin.demandes.massDestroy')); ?>",
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
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('demande_delete')): ?>
  dtButtons.push(deleteButton)
<?php endif; ?>

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
<script>
async function accept(id,bool) {
    var demande_id=Number(id);
    if (demande_id) {
       const WillDelete=await swal.fire({
            title:"Vous êtes sûr ?",
            type:'warning',
            showCancelButton:true,

        });
       if (WillDelete.isConfirmed){
        $.ajax({
            url:'demandes/accepte/'+demande_id+'/'+bool,
            method:'POST',
            headers:{'x-csrf-token':_token},
            success:function(response){
                if(bool==1){
                var myElement=$("#Etat_"+id);
         myElement.html("<i class='badge badge-success'>acceptée</i>");
         swal.fire('demande acceptée');
                       }
        else{
        var myElement=$("#Etat_"+id);
        myElement.html("<i class='badge badge-danger'>refusée</i>");
        swal.fire('demande refusée');
            }
                    
            }
        })
      } 
    }
    console.log(id);
  }
    

</script>

##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script type="text/javascript">
  $("body").on("click",".remove-demande",async  function(){
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/admin/demandes/indexv.blade.php ENDPATH**/ ?>