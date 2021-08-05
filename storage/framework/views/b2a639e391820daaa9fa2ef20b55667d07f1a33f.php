<?php $__env->startSection('content'); ?>
<?php if(session('succes')): ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    <?php echo e(session('succes')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
<?php if(session('error')): ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>échec</strong>    <?php echo e(session('error')); ?>!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php endif; ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong > <?php echo e(trans('global.choix')); ?></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <div class="card">
      <div class="card-header">
        <div class="container-sm text-center">
           <h1 class="badge badge-dark text-bold"><?php echo e('Planning  des Stages '); ?>  </h1>
</div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groupe_create')): ?>
    <?php if(Auth::user()->isAdmin()): ?>
        

    <div style="margin-bottom: 10px;" class="row float-right">
      <div class="col-lg-12">
          <a class="btn btn-success" href="<?php echo e(route("stagaire.repartition.choix")); ?>">
              <i class="fas fa-plus"></i> <?php echo e('Planning'); ?>

          </a>
      </div>
  </div>
  <?php endif; ?>
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

<script type='text/javascript'>
     $(document).ready(function(){


      $('#but_search').click(function(){
      
            var niveau_id = Number($('#niveau_id').val().trim());
            console.log(niveau_id);
            var action = '/stagaire/getPeriode/'+niveau_id;
            // var token = jQuery('meta[name="csrf-token"]').attr('content');
            // var id = current_object.attr('data-id');
            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="get">');
            // $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            // $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();

});

     });

  </script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\resources\views/stagaire/repartition/show.blade.php ENDPATH**/ ?>