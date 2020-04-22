<?php
if(!is_active_sidebar( 'Main Sidebar' )):
  return;
endif; ?>

<aside id="secondary" class="widget-area">
  <?php dynamic_sidebar( 'Main Sidebar' ); ?>
</aside>
