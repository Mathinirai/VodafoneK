    <!-- BREADCRUMBS -->
    <?php if ($breadcrumb): ?>
     <nav class="breadcrumbs breadcrumbs--extrude">
       <div class="spring">
           <!-- BREADCRUMBS LIST -->
           <ol class="breadcrumbs__list hide--sm hide--md">
               <!-- FIRST CRUMB -->
               <?php 
                 $count = count($breadcrumb);
                 $counter = 1;
                 foreach ($breadcrumb as $b_value) {
                   if($counter == 1) $class = 'breadcrumbs__crumb  breadcrumbs__crumb--first';
                   else $class = 'breadcrumbs__crumb';
                   ?>
                   <li class="breadcrumbs__item">
                   <!-- NAME -->
                   <a href="#" class="<?php print $class; ?>">
                       <?php print $b_value ; ?>
                   </a>
                   <?php $counter++; if($count >= $counter ) { ?>
                   <!-- ICON ARROW RIGHT -->
                   <svg focusable="false" aria-hidden="true" class="icon  icon--small  breadcrumbs__chevron">
                       <use xlink:href="#icon-chevron-right" />
                   </svg>
                   <?php }?>
               </li>
               <?php }?>
           </ol>
           <span class="hide--lg">
               <a href="#" class="breadcrumbs__crumb">
                   <?php print $breadcrumb[1]; ?>
               </a>
               <svg focusable="false" aria-hidden="true" class="icon  icon--small  breadcrumbs__chevron">
                   <use xlink:href="#icon-chevron-right" />
               </svg>
           </span>
       </div>
     </nav>
    <?php endif; ?>
