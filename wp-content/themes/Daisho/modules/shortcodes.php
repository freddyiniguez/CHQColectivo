<?php
// Add shortcodes for backwards compatibility
add_shortcode( 'toggle', 'symple_toggle_shortcode' );
add_shortcode( 'accordion_group', 'symple_accordion_main_shortcode' );
add_shortcode( 'accordion', 'symple_accordion_section_shortcode' );
add_shortcode( 'tabs', 'symple_tabgroup_shortcode' );
add_shortcode( 'tab', 'symple_tab_shortcode' );

/**
 * SuperSlide [slide] shortcode.
 * 
 * It is deprecated since Daisho 1.9.5, WordPress 3.6 and August 2013.
 * It is left here to maintain backwards compatibility. It should be removed
 * sometime in 2014 or 2015.
 *
 * @param array Shortcode attributes.
 * @param string Inner content of the shortcode.
 * @return string Slide output.
 *
 */
function flow_superslide_slide_shortcode($atts, $content = null){
	$class = shortcode_atts( array('text_color' => '#ffffff', 'image' => '', 'image_alt' => '', 'video_vimeo' => '', 'video_youtube' => '', 'video_mp4' => '', 'video_ogg' => '', 'video_webm' => '', 'video_poster' => '', 'slide_desc' => '', 'slide_horizontal' => '', 'slide_fitscreen' => '', 'slide_noresize' => '', 'custom' => ''), $atts );

	/* Slide Description */
	if(($class['slide_desc'] != '') && ($class['slide_desc'] != '<h4></h4>')){ 
		$slide_desc = $class['slide_desc']; 
		//$slide_desc = "data-title=\"".$slide_desc."\"";
	}else{
		$slide_desc = false;
	}
	
	if($content && ($content != '') && ($content != '<h4></h4>')){ 
		$slide_desc = $content; 
		//$slide_desc = "data-title=\"".$slide_desc."\"";
	}else{
		$slide_desc = false;
	}
			
	
	if((isset($class['image_alt'])) && ($class['image_alt'] != '')){
		$image_alt = $class['image_alt'];
	}else{
		$image_alt = '';
	}
	
	/* Slide Text/Cursor Color */
	if($class['text_color'] == '#ffffff'){
		$text_color = 'text_white'; 
	}else{
		$text_color = 'text_black'; 
	}
	
	/* ------------------------------------*/
	/* -------->>> IMAGE SLIDE <<<---------*/
	/* ------------------------------------*/
	if((isset($class['image'])) && ($class['image'] != '')){
		$image = $class['image'];
		if($class['slide_horizontal'] == 'true'){ $horizontal = 'slide_horizontal '; }else{ $horizontal = ''; }
		if($class['slide_horizontal'] == 'true' || $class['slide_fitscreen'] == 'true'){ $slide_fitscreen = 'slide_fitscreen'; }else{ $slide_fitscreen = ''; }
		
		$the_slide = '<div class="project-slide project-slide-image wp-caption">';
			$the_slide .= '<img class="myimage" src="' . $image . '" alt="' . $image_alt . '" />';
			if($slide_desc){
				$the_slide .= '<div class="wp-caption-text superslide-caption-text">' . $slide_desc . '</div>';
			}
		$the_slide .= '</div>';
		
		return $the_slide;

	/* ------------------------------------*/
	/* ----->>> HTML5 VIDEO SLIDE <<<------*/
	/* ------------------------------------*/
	}elseif(($class['video_mp4'] != '' or $class['video_ogg'] != '' or $class['video_webm'] != '')){
		$video_mp4 = $class['video_mp4'];
		$video_ogg = $class['video_ogg'];
		$video_webm = $class['video_webm'];
		
		if($class['video_poster'] != ''){ 
			$video_poster = 'poster="'.$class['video_poster'].'"'; 
		}else{ 
			$video_poster = ""; 
		}
		
		$the_slide = '<div class="project-slide project-slide-video">';
			$the_slide .= do_shortcode('[video mp4="'.$video_mp4.'" ogg="'.$video_ogg.'" webm="'.$video_webm.'" '.$video_poster.' preload="true"]');
			if($slide_desc){
				$the_slide .= '<div class="wp-caption-text superslide-caption-text">' . $slide_desc . '</div>';
			}
		$the_slide .= '</div>';
		
		return $the_slide;
		
	/* ------------------------------------*/
	/* ------->>> YOUTUBE SLIDE <<<--------*/
	/* ------------------------------------*/
	}elseif($class['video_youtube'] != ''){
		$video_youtube = $class['video_youtube'];
		if($class['slide_noresize'] = 'true'){ $video_noresize = 'height="360" width="640"'; }else{ $video_noresize = 'height="100%" width="100%"'; }
		$strText = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', 'link', $video_youtube );
		if($strText == 'link'){ $array_link_explode = explode('v=', $video_youtube); $array_link_explode = explode('&', $array_link_explode[1]); $video_youtube =$array_link_explode[0]; }
		$video_poster = $class['video_poster'];
		
		$the_slide = '<div class="project-slide project-slide-youtube">';
			$the_slide .= '<div class="youtube_container">';
				$the_slide .= '<iframe class="youtube-player" type="text/html" width="1120" height="660" src="http://www.youtube.com/embed/'.$video_youtube.'?wmode=opaque&amp;hd=1&amp;rel=0" frameborder="0"></iframe>';
			$the_slide .= '</div>';
			if($slide_desc){
				$the_slide .= '<div class="wp-caption-text superslide-caption-text">' . $slide_desc . '</div>';
			}
		$the_slide .= '</div>';
		
		return $the_slide;

	/* ------------------------------------*/
	/* -------->>> VIMEO SLIDE <<<---------*/
	/* ------------------------------------*/
	}elseif($class['video_vimeo'] != ''){
		$video_vimeo = $class['video_vimeo'];
		if($class['slide_noresize'] = 'true'){ $video_noresize = 'height="360" width="640"'; }else{ $video_noresize = 'height="100%" width="100%"'; }
		$strText = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', 'link', $video_vimeo );
		if($strText == 'link'){ $array_link_explode = explode('.com/', $video_vimeo); $video_vimeo = $array_link_explode[1]; }
		$video_poster = $class['video_poster'];
		
		$the_slide = '<div class="project-slide project-slide-vimeo">';
			$the_slide .= '<div class="youtube_container">';
				$the_slide .= '<iframe src="http://player.vimeo.com/video/'.$video_vimeo.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;hd=1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
			$the_slide .= '</div>';
			if($slide_desc){
				$the_slide .= '<div class="wp-caption-text superslide-caption-text">' . $slide_desc . '</div>';
			}
		$the_slide .= '</div>';
		
		return $the_slide;

	/* -------------------------------------*/
	/* -------->>> CUSTOM SLIDE <<<---------*/
	/* -------------------------------------*/
	}elseif($class['custom'] != ''){
		return $class['custom'];
	}else{
		return false;
	}
}
add_shortcode( 'slide', 'flow_superslide_slide_shortcode' );

/**
 * Vimeo video. Deprecated. It is kept here for backwards compatibility.
 * Since WordPress 3.6 there is native [embed] shortcode that does the same thing.
 * 
 * @param array Shortcode attributes.
 * @param string Inner content of the shortcode.
 * @return string Iframe with a video.
 *
 */
function iframe_vimeo_video_shortcode($atts, $content = null){
	$atts = shortcode_atts( array( 'link' => '' ), $atts);

	$video_vimeo = $atts['link'];
	$strText = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', 'link', $video_vimeo );
	if($strText == 'link'){ $array_link_explode = explode('.com/', $video_vimeo); $video_vimeo = $array_link_explode[1]; }

	return '<div class="youtube_container"><iframe src="http://player.vimeo.com/video/'.$video_vimeo.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
}
add_shortcode('vimeo', 'iframe_vimeo_video_shortcode');

/**
 * YouTube video. Deprecated. It is kept here for backwards compatibility.
 * Since WordPress 3.6 there is native [embed] shortcode that does the same thing.
 * 
 * @param array Shortcode attributes.
 * @param string Inner content of the shortcode.
 * @return string Iframe with a video.
 */
function iframe_youtube_video_shortcode($atts, $content = null){
	$atts = shortcode_atts( array( 'link' => '' ), $atts);

	$video_youtube = $atts['link'];
	$strText = preg_replace( '/(http|ftp)+(s)?:(\/\/)((\w|\.)+)(\/)?(\S+)?/i', 'link', $video_youtube );
	if($strText == 'link'){ $array_link_explode = explode('v=', $video_youtube); $array_link_explode = explode('&', $array_link_explode[1]); $video_youtube = $array_link_explode[0]; }

	return '<div class="youtube_container"><iframe class="youtube-player" type="text/html" src="http://www.youtube.com/embed/' . $video_youtube . '?wmode=opaque" frameborder="0"></iframe></div>';
}
add_shortcode('youtube', 'iframe_youtube_video_shortcode');

/**
 * A shortcode that allows inserting widgets in content.
 *
 * @param array Shortcode attributes.
 * @param string Inner content of the shortcode.
 * @return string Iframe with a video.
 */
function flow_shortcode_sidebar( $atts, $content = null ) {
	$atts = shortcode_atts( array( 'id' => '' ), $atts );
	if ( $atts['id'] != '' ) {
		$this_sidebar = '<div class="post-sidebar">';
		
		ob_start();
		dynamic_sidebar( apply_filters( 'flow_sidebar', $atts['id'] ) );
		$this_sidebar .= ob_get_contents();
		ob_end_clean();
		
		$this_sidebar .= '</div>';
		
		return $this_sidebar;
	}
}
add_shortcode( 'flow-sidebar', 'flow_shortcode_sidebar' );

/**
 * A shortcode that displays recent posts.
 *
 * @param array Shortcode attributes.
 * @param string Inner content of the shortcode.
 * @return string HTML output with recent posts.
 */
function flow_shortcode_recent_posts( $atts, $content = null ) {
	$atts = shortcode_atts( array( 'header' => '' ), $atts );

	$blog_page = get_option( 'page_for_posts' );

	if ( $blog_page ) {
		$blog_page_link = get_permalink( $blog_page );
	} else {
		$blog_page_link = get_home_url();
	}

	$args = array(
		'orderby' => 'date',
		'order' => 'DESC',
		'post_type' => array( 'post' ),
		'posts_per_page' => 4,
		'ignore_sticky_posts' => 1 // 0 to show stickies
	);
	
	$recent_posts_query = new WP_Query( $args );
	if ( $recent_posts_query->have_posts() ) {
		$output = '<div class="rbp-container clearfix">';
			if ( $atts['header'] != 'false' ) {
				$output .= '<div class="rbp-header">';
					$output .= '<h2>' . __( 'New Blog Posts', 'flowthemes' ) . '</h2>';
					$output .= '<span class="spacer"></span>';
					$output .= '<a href="' . $blog_page_link . '">' . __( 'View Blog', 'flowthemes' ) . '</a>';
				$output .= '</div>';
			}
			$output .= '<div class="rbp-content clearfix">';
			while ( $recent_posts_query->have_posts() ) {
				$recent_posts_query->the_post();
				
				$date = sprintf( '<span class="rbp-date"><a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a></span>',
					esc_url( get_permalink() ),
					esc_attr( sprintf( __( 'Permalink to %s', 'flowthemes' ), the_title_attribute( 'echo=0' ) ) ),
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() )
				);
				
				$output .= '<div class="rbp-entry">';
					$output .= '<a class="rbp-title" href="' . get_permalink() . '" rel="bookmark">' . get_the_title() . '</a>';
					$output .= $date;
				$output .= '</div>';
			}
			$output .= '</div>';
		$output .= '</div>';
	}
	wp_reset_postdata();
	
	return $output;
}
add_shortcode( 'recent_posts', 'flow_shortcode_recent_posts' );

/**
 * A shortcode that displays recent portfolio posts.
 *
 * @param array Shortcode attributes.
 * @param string Inner content of the shortcode.
 * @return string HTML output with recent portfolio posts.
 */
function flow_shortcode_recent_projects( $atts, $content = null ) {
	$atts = shortcode_atts( array( 'header' => '' ), $atts );
	
	global $post;

	$portfolio_page = get_option('flow_portfolio_page');
	$portfolio_page_link = get_permalink( $portfolio_page );
	
	// Projects Loop
	$args = array(
		'post_type' => array( 'portfolio' ),
		'posts_per_page' => 5,
		'ignore_sticky_posts' => 1 // 0 to show stickies
	);
	
	$recent_projects = new WP_Query( $args );
	
	if ( $recent_projects->have_posts() ) {
		$output = '<div class="rpp-container clearfix">';
			$output .= '<div class="rpp-header">';
				$output .= '<h2>' . __( 'Recent Projects', 'flowthemes' ) . '</h2>';
				$output .= '<span class="spacer"></span>';
				$output .= '<a href="' . $portfolio_page_link . '">' . __( 'View Portfolio', 'flowthemes' ) . '</a>';
			$output .= '</div>';
			$output .= '<div id="content-small" class="clearfix">';
			while ( $recent_projects->have_posts() ) {
				$recent_projects->the_post();
			
				$attachments = get_post_meta($post->ID, '300-160-image', true);
				$thumbnail_hover_color = get_post_meta($post->ID, 'thumbnail_hover_color', true);
				$thumb_title = get_the_title();
				$thumb_client = get_post_meta($post->ID, 'portfolio_client', true);
				
				$project_categories = array();
				$project_categories = wp_get_object_terms($post->ID, 'portfolio_category');
				$project_categories_names_array = array();
				foreach($project_categories as $project_category_index => $project_category_object){
					$project_categories_names_array[] = $project_category_object->name;
				}
				$project_categories_names = implode(", ", $project_categories_names_array);
				
				$tmpdddisplay = get_post_meta($post->ID, 'thumbnail_meta', true);
				if($tmpdddisplay == 1){
					$tmpdddisplay = 'tn-display-meta';
				}else{
					$tmpdddisplay = '';
				}
				
				$tmpddlink = get_post_meta($post->ID, 'thumbnail_link', true);
				if($tmpddlink == ''){
					$tmpddlink = get_permalink();
				}
				$tmpddLinkNewWindow = get_post_meta($post->ID, 'thumbnail_link_newwindow', true);
				if($tmpddLinkNewWindow == 1){
					$tmpddLinkNewWindow = 'target="_blank"';
				}else{
					$tmpddLinkNewWindow = '';
				}
				
				$output .= '<div class="element element-stand-alone ' . $tmpdddisplay . '">';
					if ( $tmpddlink ) {
						$output .= '<a class="thumbnail-link" href="' . $tmpddlink . '" ' . $tmpddLinkNewWindow . '></a>';
					}
					$output .= '<div class="thumbnail-meta-data-wrapper">';
						$output .= '<div class="symbol" style="z-index:3;">' . $thumb_title . '</div>';
					$output .= '</div>';
					$output .= '<div class="name" style="z-index: 3;">' . strip_tags( $thumb_client ) . '</div>';
					$output .= '<div class="categories" style="z-index: 3;">' . $project_categories_names . '</div>';
					$output .= '<div style="background-color: ' . $thumbnail_hover_color . '; width: 100%; height: 100%; z-index: 2;" class="thumbnail-hover"></div>';
					if ( $attachments ) {
						$output .= '<img class="project-img" style="z-index: 1;" src="' . esc_attr( $attachments ) . '" alt="' . esc_attr( $thumb_title ) . '">';
					}
					$output .= '<div style="background-color: ' . $thumbnail_hover_color . '; width: 100%; height: 100%; z-index: 0;"></div>';
				$output .= '</div>';
			}
			$output .= '</div>';
		$output .= '</div>';
	}
	
	wp_reset_postdata();
	
	return $output;
}
add_shortcode( 'recent_projects', 'flow_shortcode_recent_projects' );
