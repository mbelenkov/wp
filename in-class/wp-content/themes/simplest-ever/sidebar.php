	<aside id="sidebar">
	  <section id="categories" class="widget">
	    <h3 class="widget-title"> Categories </h3>
	    <ul>
	    	<?php
	    		// show the top 10 categories with the most posts
	    		wp_list_categories(array(
	    			'title_li'		=>	'',			// hide "categories" title
	    			'orderby'		=>	'count',
	    			'order'			=>	'DESC',
	    			'show_count'	=>	true,
	    			'number'		=>	10,
	    		));
	    	?>
	    </ul>
	  </section>
	  <section id="archives" class="widget">
	    <h3 class="widget-title"> Archives </h3>
	    <ul>
	    	<?php
	    		// get a list of archives by year
	    		wp_get_archives(array(
	    			'type'		=>	'yearly',
	    			'limit'		=>	5,
	    		));
	    	?>
	    </ul>
	  </section>
	  <section id="tags" class="widget">
	    <h3 class="widget-title"> Tags </h3>
	    <ul>
	    	<?php
	    		// show a tag cloud
	    		wp_tag_cloud(array(
	    			'smallest'		=>	1,
	    			'largest'		=>	1,
	    			'unit'			=>	'em',
	    		));
	    	?>
	    </ul>
	  </section>
	  <section id="meta" class="widget">
	    <h3 class="widget-title"> Meta </h3>
	    <ul>
	      <?php wp_register(); // either shows a link to the admin panel or a link to sign up or nothing ?>
	      <li>
	      	<?php
	      		// if the user is not logged in, show a form
	      		if(!is_user_logged_in()){
	      			wp_login_form();
	      		} else {
	      			wp_loginout(); // log out button
	      		}
	      	?>
	      </li>
	    </ul>
	  </section>
	</aside>
	<!-- end #sidebar -->