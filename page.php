<?php get_header(); ?>
    <div class="content">
      <?php
      	if(have_posts()):
  		    while(have_posts()): the_post();
  		    	the_content();
  		    endwhile;
  	    endif;
  	  ?>
    </div>
    <br><br>
<?php get_footer(); ?>
