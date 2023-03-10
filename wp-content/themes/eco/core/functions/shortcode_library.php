<?php

// Make widgets process shortcodes
add_filter('widget_text', 'do_shortcode');


// LAYOUT //////////////////////////////////////////////////

	//Created a container for dynamic html layout
	// USAGE: [container id="mycontainer" class="myclass"] 'cboxes' see shortcode below [/container]
	
		function dynamic_container($atts, $content = null ) {

		 	//extract page name from the shortcode attributes
		 	extract(shortcode_atts(array( 'id' => 'container', 'class' => ''), $atts));

			//$content = remove_filter($content, 'wptexturize');
		
		 		$container = '<div style="width: 100%;" class="container">'.do_shortcode($content).'<div class="clear"></div></div>';

		 	return $container;
		}
		add_shortcode('container', 'dynamic_container');

	//Created a container for dynamic html layout
	// USAGE: [cbox width="50%" leftgutter="15px" rightgutter="0px"] html box content[/cbox]
	
		function dynamic_box($atts, $content = null ) {

		 	//extract page name from the shortcode attributes
		 	extract(shortcode_atts(array( 'width' => '30%', 'leftgutter' => '10px', 'rightgutter' => '0px'), $atts));

		 	$cbox = '<div class="cbox" style="float:left;width:'.$width.';"><div class="cbox_pad" style="margin: 0px '.$rightgutter.' 0px '.$leftgutter.'">'.do_shortcode($content).'</div></div>';
	 	
		return $cbox;
		}
		add_shortcode('cbox', 'dynamic_box');
	
	
	
// GET POST FIELD BY OFFSET //////////////////////////////////////////////////

	// Get a post based on offset from the last post published (0 for last post)
	// USAGE: [postfeed field="post_title"  offset="0" customfield="true" ]
		
			function get_postfeed($atts) {

			 	//extract page name from the shortcode attributes
			 	extract(shortcode_atts(array( 'field' => 'post_title', 'offset' => '0', 'customfield' => ""), $atts));
			
				//returns an array of objects
				$thepost = get_posts('numberposts=1&offset='.$offset);
				
				if($customfield == 'true'){
					$postfield = get_post_meta($thepost[0]->ID, $field, true);
				}else{
			 		$postfield = $thepost[0]->$field;
				}
				return $postfield;
			}
			add_shortcode('postfeed', 'get_postfeed');
	
	
	
	
// GOOGLE CHARTS  //////////////////////////////////////////////////

	// Gets Google charts
	// USAGE 
	//		[chart data="0,12,24,26,32,64,54,24,22,20,8,2,0,0,3" bg="F7F9FA" size="200x100" type="sparkline"]
	//		[chart data="41.52,37.79,20.67,0.03" bg="F7F9FA" labels="Reffering+sites|Search+Engines|Direct+traffic|Other" colors="058DC7,50B432,ED561B,EDEF00" size="488x200" title="Traffic Sources" type="pie"]

		function chart_shortcode( $atts ) {
			extract(shortcode_atts(array(
			    'data' => '',
			    'colors' => '',
			    'size' => '400x200',
			    'bg' => 'ffffff',
			    'title' => '',
			    'labels' => '',
			    'advanced' => '',
			    'type' => 'pie'
			), $atts));
 
			switch ($type) {
				case 'line' :
					$charttype = 'lc'; break;
				case 'xyline' :
					$charttype = 'lxy'; break;
				case 'sparkline' :
					$charttype = 'ls'; break;
				case 'meter' :
					$charttype = 'gom'; break;
				case 'scatter' :
					$charttype = 's'; break;
				case 'venn' :
					$charttype = 'v'; break;
				case 'pie' :
					$charttype = 'p3'; break;
				case 'pie2d' :
					$charttype = 'p'; break;
				default :
					$charttype = $type;
				break;
			}
 
			if ($title) $string .= '&chtt='.$title.'';
			if ($labels) $string .= '&chl='.$labels.'';
			if ($colors) $string .= '&chco='.$colors.'';
			$string .= '&chs='.$size.'';
			$string .= '&chd=t:'.$data.'';
			$string .= '&chf='.$bg.'';
 
			return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" />';
		}
		add_shortcode('chart', 'chart_shortcode');

// GOOGLE MAPS //////////////////////////////////////////////////

    // you can use the default width and height
    // The only requirement is to add the address of the map
    // Example:
    // [googlemap address="san diego, ca"]
    // or with options
    // [googlemap width="200" height="200" address="4000 Ocean Blvd., San Diego, CA 92109"]

    function googleMaps($atts, $content = null) {
       extract(shortcode_atts(array(
          "width"       =>  '480',
          "height"      =>  '480',
          "address"   =>   ''
       ), $atts));
       $src = "http://maps.google.com/maps?f=q&source=s_q&hl=en&q=".$address;
       return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe>';
    }

    add_shortcode("googlemap", "googleMaps");

// CONSTANTS 
	//Function for getting template path
	// USAGE: [themeurl]
	
	function get_themeurl($atts){ return get_bloginfo('template_url');	 }
	add_shortcode('themeurl', 'get_themeurl');	
	
// LINKS IN POSTS AND PAGES

	// Function for creating a link from a page name
	// USAGE : [link pagename="My Example Page" linktext="Link Text"]

	function create_pagelink($atts) {

	 	//extract page name from the shortcode attributes
	 	extract(shortcode_atts(array( 'pagename' => 'home', 'linktext' => ''), $atts));

	 	//convert the page name to a page ID
	 	$page = get_page_by_title($pagename);

	 	//use page ID to get the permalink for the page
	 	$link = get_permalink($page->ID);

	 	//create the link and output
	 	$pagelink = "<a href=\"".$link."\">".$linktext."</a>";

	 	return $pagelink;
	}
	add_shortcode('link', 'create_pagelink');


	// Return link in page based on Bookmark
	// USAGE : [bookmark id="21" text="Link Text"]

	function bookmark_link($atts) {

	 	//extract page name from the shortcode attributes
	 	extract(shortcode_atts(array( 'id' => '0', 'text' => ''), $atts));

	 	//convert the page name to a page ID
	 	$bookmark = get_bookmark($id);
	
		if(isset($text)) $ltext = $text;
		else $ltext = $bookmark->link_name;; 


		$pagelink = "<a href=\"".$bookmark->link_url."\" target=\"".$bookmark->link_target."\">".$ltext."</a>";
	 	return $pagelink;
	}
	add_shortcode('bookmark', 'bookmark_link');




?>