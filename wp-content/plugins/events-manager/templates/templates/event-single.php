<?php
/*
 * This page displays a single event, called during the em_content() if this is an event page.
 * You can override the default display settings pages by copying this file to yourthemefolder/plugins/events-manager/templates/ and modifying it however you need.
 * You can display events however you wish, there are a few variables made available to you:
 * 
 * $args - the args passed onto EM_Events::output() 
 */
global $EM_Event;
/* @var $EM_Event EM_Event */
if( $EM_Event->status == 1 ){
	echo $EM_Event->output_single();
}else{
	echo get_option('dbem_no_events_message');
}

global $wpdb;

$event_owner = $wpdb->get_results("SELECT event_owner FROM wp_em_events WHERE event_id={$EM_Event->id}");

global $current_user;
get_currentuserinfo();

if( current_user_can('administrator') || groups_is_user_admin($current_user->ID, $EM_Event->group_id ) ) {
	
	echo '<a href="http://ga.loudfeed.org/members/' . $current_user->user_login .'/events/my-events/edit/?event_id='. $EM_Event->id .'">Edit this Event</a><BR><BR>';
}


?>