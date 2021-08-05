<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
           
             
         
            <li class="nav-item">
                <a href="<?php echo e(route("admin.home")); ?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    Tableau de bord
                </a>
            </li>
            <?php if( Auth::user()->isAdmin()): ?>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users-cog nav-icon">

                    </i>
                    Gestion utilisateurs
                </a>
                <ul class="nav-dropdown-items">



                    
                    <li class="nav-item">
                        <a href="<?php echo e(route("admin.users.index")); ?>" class="nav-link <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>">
                            <i class="fas fa-user nav-icon">

                            </i>
                            Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route("admin.etudiants.index")); ?>" class="nav-link <?php echo e(request()->is('admin/etudiants') || request()->is('admin/etudiants/*') ? 'active' : ''); ?>">
                            <i class="fas fa-user-md nav-icon">

                            </i>
                           Stagaires
                        </a>
                    </li>
                </ul>
            </li>
            
    <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                            <i class="fas fa-hospital nav-icon">

                            </i>
                            Gestion stages
                  </a>
    <ul class="nav-dropdown-items">
            
            <li class="nav-item">
                <a href="<?php echo e(route("admin.periodes.index")); ?>" class="nav-link <?php echo e(request()->is('admin/periodes') || request()->is('admin/periodes/*') ? 'active' : ''); ?>">
                    <i class="fas fa-calendar nav-icon">

                    </i>
                    <?php echo e(trans('global.periode.title')); ?>

                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?php echo e(route("admin.groupes.index")); ?>" class="nav-link <?php echo e(request()->is('admin/groupes') || request()->is('admin/groupes/*') ? 'active' : ''); ?>">
                    <i class="fas fa-users nav-icon">

                    </i>
                    <?php echo e(trans('global.groupe.title')); ?>

                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?php echo e(route("admin.services.index")); ?>" class="nav-link <?php echo e(request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : ''); ?>">
                    <i class="fas fa-procedures nav-icon">

                    </i>
                    <?php echo e(trans('global.service.title')); ?>

                </a>
            </li>
            
            
            <li class="nav-item">
                <a href="<?php echo e(route("admin.stages.index")); ?>" class="nav-link <?php echo e(request()->is('admin/stages') || request()->is('admin/stages/*') ? 'active' : ''); ?>">
                    <i class="fas fa-stethoscope nav-icon">

                    </i>
                    <?php echo e(trans('global.stage.title')); ?>

                </a>
            </li>
            
            
                       
            
           
            
            <li class="nav-item">
                <a href="<?php echo e(route("affectation.choix")); ?>" class="nav-link <?php echo e(request()->is('stagaire/affectation') || request()->is('stagaire/affectation/*') ? 'active' : ''); ?>">
                    <i class="fas fa-list-alt nav-icon">
                        
                    </i>
                    
                    Liste des Stagaires
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route("stagaire.repartition.show")); ?>" class="nav-link <?php echo e(request()->is('stagaire/repartition') || request()->is('stagaire/repartition/*') ? 'active' : ''); ?>">
                    <i class="far fa-calendar-check nav-icon">

                    </i>
                    
                    Planning 
                </a>
            </li>            
            <li class="nav-item">
                <a href="<?php echo e(route("stagaire.repartition.synch")); ?>" class="nav-link <?php echo e(request()->is('stagaire/getStagaire') || request()->is('stagaire/getStagaires/*') ? 'active' : ''); ?>">
                    <i class="fas fa-sync-alt nav-icon">

                    </i>
                    
                    Répartition 
                </a>
            </li>
              <li class="nav-item">
                <a href="<?php echo e(route("notes.ajax")); ?>" class="nav-link <?php echo e(request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : ''); ?>">
                    <i class="fas fa-plus nav-icon">

                    </i>
                    Notes
                </a>
            </li>     
             </ul>
             

              <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-file-alt nav-icon">

                    </i>
                    <?php echo e(trans('global.demande.title')); ?><?php if(DB::table('demandes')->where('demande_validé',null)->get()->count()!=0): ?>
                    <i class="badge badge-info"><?php echo e(DB::table('demandes')->where('demande_validé',null)->get()->count()); ?></i>
                    <?php endif; ?>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="<?php echo e(route("admin.demandes.indexv")); ?>" class="nav-link <?php echo e(request()->is('admin/demande/demandeverifiees') || request()->is('admin/demande/demandeverifiees/*') ? 'active' : ''); ?>">
                            <i class="fas fa-check nav-icon">

                            </i>
                             verifiées 
                        </a>
                    </li>
                </ul>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="<?php echo e(route("admin.demandes.index")); ?>" class="nav-link <?php echo e(request()->is('admin/demandes') || request()->is('admin/demandes/*') ? 'active' : ''); ?>">
                            <i class="fas fa-eye-slash nav-icon">

                            </i>
                            non  verifiées <i class="badge badge-info"><?php echo e(DB::table('demandes')->where('demande_validé',null)->get()->count()); ?></i>
                        </a>
                    </li>
                </ul>
            </li>    
           
      
            <?php endif; ?>
           
            
            <?php if(Auth::user()->isEtudiant()): ?>
            <li class="nav-item">
                <a href="<?php echo e(route("stagaire.notes.index")); ?>" class="nav-link <?php echo e(request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : ''); ?>">
                    <i class="fas fa-chalkboard-teacher nav-icon">

                    </i>
                    <?php echo e(trans('global.note.title')); ?>

                </a>
            </li>
             
            <li class="nav-item">
                <a href="<?php echo e(route("stagaire.demandes.index")); ?>" class="nav-link <?php echo e(request()->is('stagaire/demandes') || request()->is('stagaire/demandes/*') ? 'active' : ''); ?>">
                    <i class="fas fa-file-alt nav-icon">

                    </i>
                    <?php echo e(trans('global.demande.title')); ?>

                </a>
            </li>
            <?php endif; ?>
            
            <?php if(Auth::user()->isSecretaire()): ?>
                
            
            <li class="nav-item">
                <a href="<?php echo e(route("notes.ajax")); ?>" class="nav-link <?php echo e(request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : ''); ?>">
                    <i class="fas fa-plus nav-icon">

                    </i>
                     Insertion notes
                </a>
            </li>
            <?php endif; ?>
            
                        
                        <?php if(Auth::user()->isEncadrant()): ?>
                
            
                        <li class="nav-item">
                            <a href="<?php echo e(route("notes.ajax")); ?>" class="nav-link <?php echo e(request()->is('stagaire/notes') || request()->is('stagaire/notes`/*') ? 'active' : ''); ?>">
                               
            
                               <i class="fa fa-check-circle-o nav-icon" aria-hidden="true"></i>
                                <?php echo e(trans('global.note.title')); ?>

                            </a>
                        </li>
                        <?php endif; ?>
                        
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    Deconnexion
                </a>
            </li>
            
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><?php /**PATH C:\wamp64\www\laravel\resources\views/partials/menu.blade.php ENDPATH**/ ?>