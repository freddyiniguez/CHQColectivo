<?php
	/* Template Name: Portfolio Thumbnail Grid */ 
	
	get_header();
	
	// Data of this page
	$id = $wp_query->queried_object->ID;
	$main_portfolio_page = get_option('flow_portfolio_page');
	
	// Welcome Text
	if(is_singular('portfolio') && ($parent_page = get_post_meta($id, 'portfolio_back_button', true)) && !empty($parent_page) && ($parent_page != 'none')){
		$welcome_text = get_post_meta($parent_page, 'page_portfolio_welcome_text', true);
		$id_to_use = $parent_page;
	}else if(is_singular('portfolio') && $main_portfolio_page != ''){
		$welcome_text = get_post_meta($main_portfolio_page, 'page_portfolio_welcome_text', true);
		$id_to_use = $main_portfolio_page;
	}else if(is_page_template('template-portfolio.php')){
		$welcome_text = get_post_meta($id, 'page_portfolio_welcome_text', true);
		$id_to_use = $id;
	}else{
		$welcome_text = false;
		$id_to_use = false;
	}
	if($welcome_text){ ?>
		<div class="welcome-text"><?php echo stripslashes( $welcome_text ); ?></div>
	<?php }
	/*
	// Optional Page Header
	if(get_the_title($id_to_use) || get_post_meta($id_to_use, 'flow_post_description', true)){ ?>
		<header class="page-header">
			<?php if(get_the_title($id_to_use)){ ?>
				<h1 class="page-title"><?php echo get_the_title($id_to_use); ?></h1>
			<?php } ?>
			<?php if($page_description = get_post_meta($id_to_use, 'flow_post_description', true)){ ?>
				<div class="page-description"><?php echo $page_description; ?></div>
			<?php } ?>
		</header>
	<?php }
	
	// Optional Page Content
	if($id_to_use){
		$page_data = get_page( $id_to_use ); 
		if(!empty($page_data->post_content)){ ?>
			<div class="site-content clearfix"><?php echo apply_filters( 'the_content', $page_data->post_content ); ?></div>
		<?php }
	}
	*/

	get_template_part( 'project', 'container' );
	get_template_part( 'project', 'loop' );
	
	get_footer();
?>