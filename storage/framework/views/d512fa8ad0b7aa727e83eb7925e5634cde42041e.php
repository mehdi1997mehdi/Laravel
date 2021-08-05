<?php $__env->startSection('content'); ?>
<?php if(session('succes')): ?>

<div class="alert alert-success alert-dismissible fade show" etudiant="alert">
    <strong>Succes</strong>    <?php echo e(session('succes')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
<?php if(session('error')): ?>

<div class="alert alert-danger alert-dismissible fade show" etudiant="alert">
    <strong>échec</strong>    <?php echo e(session('error')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
  <div class="card">
      <div class="card-header">
        <div class="container-sm text-center">
</div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_create')): ?>
    <div style="margin-bottom: 10px;" class="row float-right">
      <div class="col-lg-12">
          <a class="btn btn-success" href="<?php echo e(route("stagaire.synchroniser")); ?>">
               Repartir
          </a>
      </div>
  </div>
      <div class="form-group <?php echo e($errors->has('niveau_id') ? 'has-error' : ''); ?>">
        <div class="row ">
          <label class="text-right col-sm-2" for="niveau_id"><strong class="text-secondary"> <?php echo e(trans('global.periode.fields.niveau_id')); ?> :</strong></label>
          <select name="niveau_id" id="niveau_id" class=" col-sm-3 custom-select custom-select-sm " >
              <option value="0" selected> Choisir un niveau</option>
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

     <?php endif; ?>
    


        <div class="text-center "> </div> 
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
                            
                            Stages
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($etudiant->id); ?>">
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
                              <?php if($etudiant->stagaire!=null): ?>
                                <?php $__currentLoopData = $etudiant->stagaire->stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-info"><?php echo e($item->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<script type='text/javascript'>
     $(document).ready(function(){


      $('#but_search').click(function(){
      
            var niveau_id = Number($('#niveau_id').val().trim());
            console.log(niveau_id);
            var action = '/stagaire/getStagaires/'+niveau_id;
            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="get">');
            $('body').find('.remove-form').submit();

});

     });

  </script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/repartition/synch.blade.php ENDPATH**/ ?>