<?php

function bbg_change_home_tab_name() {
  global $bp;

  if ( bp_is_group() ) {
    $bp->bp_options_nav[bp_get_current_group_slug()]['home']['name'] = 'Activity';
  }
}
add_action( 'groups_setup_nav', 'bbg_change_home_tab_name' );


function my_bp_search_form_type_select() {
	global $bp;

	$options = array();

	if ( bp_is_active( 'groups' ) )
		$options['groups']  = __( 'Groups',  'buddypress' );
		
	$options['events'] = __( 'Events', 'buddypress' );

	if ( bp_is_active( 'xprofile' ) )
		$options['members'] = __( 'Members', 'buddypress' );

	if ( bp_is_active( 'forums' ) && bp_forums_is_installed_correctly() && bp_forums_has_directory() )
		$options['forums']  = __( 'Forums',  'buddypress' );

	$options['posts'] = __( 'Posts', 'buddypress' );

	// Eventually this won't be needed and a page will be built to integrate all search results.
	$selection_box  = '<label for="search-which" class="accessibly-hidden">' . __( 'Search these:', 'buddypress' ) . '</label>';
	$selection_box .= '<select name="search-which" id="search-which" style="width: auto">';

	$options = apply_filters( 'bp_search_form_type_select_options', $options );
	foreach( (array)$options as $option_value => $option_title ) {
		$selection_box .= sprintf( '<option id="%s" value="%s">%s</option>', $option_value . "-dropdown-option", $option_value, $option_title );

	}

	$selection_box .= '</select>';
	return $selection_box;

}
add_filter('bp_search_form_type_select','my_bp_search_form_type_select');


function add_script() {
   if (!is_admin()) {
       // comment out the next two lines to load the local copy of jQuery
       	// wp_deregister_script('jquery');
       	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js', false, '1.5.2');
		wp_enqueue_script('jquery');
		wp_enqueue_script('toggler', get_bloginfo('url') . '/wp-content/js/hide-form/toggler.js');
		}
	}

add_action('init', 'add_script');

add_action('wp_footer', 'add_search_form_script');

function add_search_form_script() {
	?>
	<script>
	// $(document).ready(function() {
	// 	$('#other').click(function() {
	// 	  $('#target').click();
	// 	});
	// }
	// );
	</script>
	<?php
}




register_sidebar(
	array(
		'name' => 'Sidebar 2',
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
);


register_sidebar(
	array(
		'name' => 'Sidebar 3',
		'id' => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
);

register_sidebar(
	array(
		'name' => 'Sidebar 4',
		'id' => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
	)
);


// register_sidebar(
// 	array(
// 		'name' => 'Widgeted Page',
// 		'id' => 'centerwidget-page',
// 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h3 class="widgettitle">',
// 		'after_title' => '</h3>'
// 	)
// );



	


function change_activity_plus_root_folder() {	
	echo "<script>
	var _bpfbRootUrl = '" . get_stylesheet_directory_uri().  "';
	</script>";
}

add_action('wp_head','change_activity_plus_root_folder');


// add_action('init', 'redirect_to_parent_event_if_on_child');

// function redirect_to_parent_event_if_on_child() {
// 	if(! strpos($_SERVER['REQUEST_URI'], 'my-events/edit'))
// 		return;
// 	$event_id= substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], 'event_id')+9);

// 	global $wpdb;
// 	$recurrence_id = $wpdb->get_results("SELECT recurrence_id, recurrence FROM wp_em_events WHERE event_id='{$event_id}'");

// 	if($recurrence_id[0]->recurrence != "1" ) {
// 		$rewritten_link = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));
// 		$rewritten_link = site_url() . $rewritten_link .'?event_id=' . $event_id;
// 	}
		
// }
	
/* add_filter('em_events_count', 'nycga_limit_group_event_count', 2, 10); */
function nycga_limit_group_event_count ($count, $args)
{
	if ( ! empty($args['group']))
	{
		$args['recurring'] = 1;
		$count = EM_Events::get($args, true);
	}
	return $count;
}

/* add_filter('em_object_build_sql_conditions_args', 'nycga_limit_search_to_year', 1, 10); */
function nycga_limit_search_to_year($args)
{
	if ( empty($args['year']))
	{
		$args['year'] = date('Y', strtotime('1 year'));
	}
/* 	print_r($args); */
	return $args;
}
