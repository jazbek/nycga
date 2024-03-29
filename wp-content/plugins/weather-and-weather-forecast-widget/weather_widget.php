<?php
/*
Plugin Name: GoGadget Weather and Weatherforecast Widget
Plugin URI: http://www.go-gadget-blog.com
Description: Sidebar widget in English, French, German, Hungarian, Italian, Polish and Spanish to show either current weather and forecasts for ten days for any given location or the home location of your site visitors - detailled infotexts for current weather and forecasts on mouseover - multiple installation

Author: Guido Osterwald
Version: 2.1
Author URI: http://www.go-gadget-blog.com
*/

/*

Changes:

= 1.0 =  Initial Version
= 1.1 =  First Update
	*Additional languages (French / Italian / Polish / Spanish
	*�Auto�-Language detection and output
	*Multiple installation � widget can now be installed up to three times
	*Output of system status in widget panel
	*Minor bug fixes (broken links / image location finder / wrong picture �)
= 2.0 =  Second Update
  Layout improvements:
  * Usage of additional sets of Images
  * Images can be adjusted and resized with the control panel
  * Embedded CSS or use of own CSS set
  Technical Improvements:
  * Extended Forecast for further six days (forecast total of ten days possible now
  * Ten day Forecast available with every language selection - text description for further six days in english or german only nevertheless  
  * more detailled weather texts(in english version)
  * Autolocation option - Weather at site visitors home can be shown now  
= 2.1 =  This version
  * Additional language (Hungarian)
  * Country Names shown with the "Auto Location" feature are now translated into all installed languages
  Layout improvements:
  * Optional padding (left and right) to fit widget in wider sidebars as they are often used in "footer" widgetareas
  * Widget title can be shown within the widget or as usually at widget top
  * Some improvements of arranging icons in CSS
  Technical Improvements:
  * addition of further 200 German text phrases for translation of weather texts
  * added some mouseover texts in the control panel with help texts
  * Bugfixed a timeout error if one of the geoip-server are down  
  * Minor bugfixes and slight improvements (location finder / css / German translation)     
*/

//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors','1');
add_action('widgets_init', 'GG_func_widget_weather_and_weather_forecast_init');
register_activation_hook( __FILE__, 'GG_func_activate');
register_deactivation_hook( __FILE__, 'GG_func_deactivate');
function GG_func_activate(){    
    $widget_options = array('title'=>'',
        'title_back'=>'', 
  			'wc_partnerid' => '1235242915', // This Partner ID will be set after the installation - You have to register at weather.com, get one and use it!
  			'wc_licensekey' => 'ae7074c2f70a0439', // The License Key which is linked with the Partner ID - Please change this as well!
  			'ipinfodb_key'=> '',
  			'wc_cache' => '',
  			'wc_cachetime' => '3600',
  			'wc_location' => 'GMXX4590',
  			'wc_location_check' => '',
  			'wc_lastcheck' => 2,
  			'images' => get_bloginfo('wpurl').'/wp-content/plugins/weather-and-weather-forecast-widget/weatherimages/',
  			'imagefolder' => 'WeatherCom_1',
  			'size_padding'=>'0px',
  			'f_size_l' => '150%',
  			'f_size_m' => '130%',
  			'f_size_s' => '110%',
  			'i_size_l' => '1',
  			'i_size_m' => '1',
  			'i_size_s' => '1',
  			'background_color' => '',
  			'font_color' => '',
  			'font_family' => '',
  			'opt_lines' => '',
        'opt_language'  => 'en',
        'opt_language_select'  => 'unchecked',
        'opt_unit' => 'm',
        'opt_css_select'  => 'checked',
        'opt_auto_location_select' => 'unchecked',
        'opt_extended_forecast_select' => 'unchecked',
        'opt_day_night_images_select' => 'checked',
        'opt_title_select' => 'unchecked',
        'opt_layout' => 'large',
        'opt_sunmoon_text' => 'yes',
        'opt_link_to_weather_com' => 'yes', 
  			'format' => '',
  			'time_corr' => '0',
    	);
    if ( ! get_option('GG_func_widget_weather_and_weather_forecast')){
      add_option('GG_func_widget_weather_and_weather_forecast' , $widget_options);
    } else {
      update_option('GG_func_widget_weather_and_weather_forecast' , $widget_options);
    }
}
function GG_func_deactivate(){
    delete_option('GG_func_widget_weather_and_weather_forecast');
}
//**************************init*************************************************
function GG_func_widget_weather_and_weather_forecast_init() {
	  if ( !function_exists('register_sidebar_widget') )
		return;
	  wp_register_sidebar_widget( 'GoGadget_Weather_Widget', 'GoGadget Weather Widget', 'GG_func_widget_weather_and_weather_forecast', array('description' => __('Add Weather and a three Day Forecast (english or german) to your widget area '))) ;
    wp_register_widget_control( 'GoGadget_Weather_Widget', 'GoGadget Weather Widget', 'GG_func_widget_weather_and_weather_forecast_control', array('width' => 350, 'length' => 325));
}
//**************************control**********************************************
function GG_func_widget_weather_and_weather_forecast_control() {    
    $wc_id_check="";
    $wc_loc_check="";
    $wc_connection_check="";
    $ipinfodb_check="";
    $wc_WP="";
    $wc_Theme="";
    $wc_PHP="";
    $wc_MYSQL="";
    $wc_browser="";
    $widget_options = get_option('GG_func_widget_weather_and_weather_forecast');  	
  	if ( $_POST['weather_and_weather_forecast-submit'] ) {
  		$widget_options['title_back'] = strip_tags(stripslashes($_POST['weather_and_weather_forecast-title_back']));
  		$widget_options['wc_location'] = strip_tags(stripslashes($_POST['weather_and_weather_forecast-wc_location']));
  		$widget_options['wc_partnerid'] = strip_tags(stripslashes($_POST['weather_and_weather_forecast-wc_partnerid']));
  		$widget_options['wc_licensekey'] = strip_tags(stripslashes($_POST['weather_and_weather_forecast-wc_licensekey']));
  		$widget_options['ipinfodb_key'] = strip_tags(stripslashes($_POST['weather_and_weather_forecast-ipinfodb_key']));
  		$widget_options['wc_cachetime'] = strip_tags(stripslashes($_POST['weather_and_weather_forecast-wc_cachetime']));
  		$widget_options['images'] = strip_tags(stripslashes($_POST['weather_and_weather_forecast-images']));
  		$widget_options['imagefolder'] = strip_tags(stripslashes($_POST['weather_and_weather_forecast-imagefolder']));
  		$widget_options['opt_unit'] = $_POST['weather_and_weather_forecast-opt_unit'];
  		$widget_options['wc_lastcheck'] = -1;
  		$widget_options['size_padding'] = stripslashes($_POST['weather_and_weather_forecast-size_padding']);
  		$widget_options['f_size_l'] = stripslashes($_POST['weather_and_weather_forecast-f_size_l']);
  		$widget_options['f_size_m'] = stripslashes($_POST['weather_and_weather_forecast-f_size_m']);
  		$widget_options['f_size_s'] = stripslashes($_POST['weather_and_weather_forecast-f_size_s']);
  		$widget_options['i_size_l'] = stripslashes($_POST['weather_and_weather_forecast-i_size_l']);
  		$widget_options['i_size_m'] = stripslashes($_POST['weather_and_weather_forecast-i_size_m']);
  		$widget_options['i_size_s'] = stripslashes($_POST['weather_and_weather_forecast-i_size_s']);
  		$widget_options['background_color'] = stripslashes($_POST['weather_and_weather_forecast-background_color']);
  		$widget_options['font_color'] = stripslashes($_POST['weather_and_weather_forecast-font_color']);
  		$widget_options['font_family'] = stripslashes($_POST['weather_and_weather_forecast-font_family']);
  		$widget_options['opt_lines'] = stripslashes($_POST['weather_and_weather_forecast-opt_lines']);
  		$widget_options['opt_title_select'] = stripslashes($_POST['weather_and_weather_forecast-opt_title_select']);
  		$widget_options['opt_language'] = stripslashes($_POST['weather_and_weather_forecast-opt_language']);
  		$widget_options['opt_language_select'] = stripslashes($_POST['weather_and_weather_forecast-opt_language_select']);
  		$widget_options['opt_auto_location_select'] = stripslashes($_POST['weather_and_weather_forecast-opt_auto_location_select']);
  		$widget_options['opt_day_night_images_select'] = stripslashes($_POST['weather_and_weather_forecast-opt_day_night_images_select']);
  		$widget_options['opt_extended_forecast_select'] = stripslashes($_POST['weather_and_weather_forecast-opt_extended_forecast_select']);
  		$widget_options['opt_css_select'] = stripslashes($_POST['weather_and_weather_forecast-opt_css_select']);
  		$widget_options['time_corr'] = stripslashes($_POST['weather_and_weather_forecast-time_corr']);
      $widget_options['opt_layout']=  stripslashes($_POST['weather_and_weather_forecast-opt_layout']);
  		$widget_options['opt_link_to_weather_com']= stripslashes($_POST['weather_and_weather_forecast-opt_link_to_weather_com']);
  		$widget_options['opt_sunmoon_text']=  stripslashes($_POST['weather_and_weather_forecast-opt_sunmoon_text']);
        
      //update_option('GG_func_widget_weather_and_weather_forecast', $widget_options);
      $size_padding = htmlspecialchars($widget_options['size_padding'], ENT_QUOTES);      
      $f_size_l = htmlspecialchars($widget_options['f_size_l'], ENT_QUOTES);
  	  $f_size_m = htmlspecialchars($widget_options['f_size_m'], ENT_QUOTES);
  	  $f_size_s = htmlspecialchars($widget_options['f_size_s'], ENT_QUOTES);
  	  $i_size_l = htmlspecialchars($widget_options['i_size_l'], ENT_QUOTES);
  	  $i_size_m = htmlspecialchars($widget_options['i_size_m'], ENT_QUOTES);
  	  $i_size_s = htmlspecialchars($widget_options['i_size_s'], ENT_QUOTES);
  	  $font_color = htmlspecialchars($widget_options['font_color'], ENT_QUOTES);
  	  $font_family = htmlspecialchars($widget_options['font_family'], ENT_QUOTES);
  	  $opt_lines = htmlspecialchars($widget_options['opt_lines'], ENT_QUOTES);
  	  $opt_css_select =  htmlspecialchars($widget_options['opt_css_select'], ENT_QUOTES);
  	  $opt_extended_forecast_select =  htmlspecialchars($widget_options['opt_extended_forecast_select'], ENT_QUOTES);
  	  $opt_day_night_images_select =  htmlspecialchars($widget_options['opt_day_night_images_select'], ENT_QUOTES);
  	  $opt_auto_location_select =  htmlspecialchars($widget_options['opt_auto_location_select'], ENT_QUOTES);
      $background_color = htmlspecialchars($widget_options['background_color'], ENT_QUOTES);
      $wc_partnerid =  htmlspecialchars($widget_options['wc_partnerid'], ENT_QUOTES);
      $ipinfodb_key = htmlspecialchars($widget_options['ipinfodb_key'], ENT_QUOTES);
      $opt_layout = htmlspecialchars($widget_options['opt_layout'], ENT_QUOTES);
      $title_back= htmlspecialchars($widget_options['title_back'], ENT_QUOTES);
      //$title= htmlspecialchars($widget_options['title'], ENT_QUOTES);
      $opt_title_select = htmlspecialchars($widget_options['opt_title_select'], ENT_QUOTES);
      $opt_link_to_weather_com  = htmlspecialchars($widget_options['opt_link_to_weather_com'], ENT_QUOTES);
      $term="";
      $term_out="";
      $images="";
      if($opt_css_select == "checked") {  
      $term = $term. "<div id='gogadget_weather_widget' class='widget GG_func_widget_weather_and_weather_forecast'><style type='text/css'>.GG_func_widget_weather_and_weather_forecast {padding-right:".$size_padding.";padding-left:".$size_padding."} .GG_func_widget_weather_and_weather_forecast img {padding: 0; margin: 0;vertical-align:middle}.GG_func_widget_weather_and_weather_forecast table {border:0;margin:0;padding:0;border-collapse:collapse;background-color:".$background_color."}.GG_func_widget_weather_and_weather_forecast hr {display: block;}.GG_func_widget_weather_and_weather_forecast tr td{text-align:center;margin:0;margin-bottom:0;width:0%;height:0%;padding:0;border:0;border-collapse:collapse;}</style>";
      }
      if ($opt_lines=="yes"){
        $term_out=GG_func_widget_format("lines",$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family, $font_color, $images,$wc_partnerid,"");
        $term=$term.$term_out;
      }
      if($opt_auto_location_select =="checked" or $opt_title_select=="checked"){
        $term_out = GG_func_widget_format("auto_location",$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family, $font_color, $images,$wc_partnerid,"");
        $term=$term.$term_out;
      }
      if($opt_title_select=="checked")
      {
       $title="";
      }
      else
      {
        $title=$widget_options['title_back']; 
      }
      $widget_options['title'] = $title;
      $widget_options['title_back'] = $title_back; 
      $term_out = GG_func_widget_format("small",$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family, $font_color, $images,$wc_partnerid,"");
      $term=$term.$term_out;
      if ($opt_layout=="medium" or $opt_layout=="large"){
        $term_out=GG_func_widget_format("medium",$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family, $font_color, $images,$wc_partnerid,"");
        $term=$term.$term_out;
      }
      if ($opt_layout=="large"){
        $term_out=GG_func_widget_format("large",$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family,$font_color, $images,$wc_partnerid,$opt_day_night_images_select);
        $term=$term.$term_out;
      }
      if ($opt_extended_forecast_select=="checked"){
        $term_out=GG_func_widget_format("extended",$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family,$font_color, $images,$wc_partnerid,$term);
        $term=$term.$term_out;
      }
      if ($opt_link_to_weather_com == "yes")
      { $term_out=GG_func_widget_format("link",$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family, $font_color, $images,$wc_partnerid,"");
        $term=$term.$term_out;
      }
       if ($opt_lines=="yes"){
        $term_out=GG_func_widget_format("lines",$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family, $font_color, $images,$wc_partnerid,"");
        $term=$term.$term_out;
      }
      if($opt_css_select == "checked") {  
      $term = $term. "</div>";
      }
      //check for correct data for cache and synchronize time   Replace , by . first! ctype_digit will only operate smoothly if the string doesnt contain . or - !
      $widget_options['time_corr'] = str_replace(",",".",$widget_options['time_corr'] );
      $check_time_1 = str_replace("-","",$widget_options['time_corr'] );
      $check_time_2 = str_replace(".","",$check_time_1 );
      if (ctype_digit($check_time_2)==false) {
      echo "Please choose a number between for 'Synchronize Time'! (Set to 0 now)<br /><br />";
      $widget_options['time_corr'] = "0";
      }
      else
      if ($check_time_1 > 24 or $check_time_1 <0){
        echo "'Synchronize Time: Please choose a number between -24 and 24 (Set to 0 now)<br /><br />";
      $widget_options['time_corr'] = "0";
      }
      $check_time = $widget_options['wc_cachetime'];
      if (ctype_digit($check_time)==false) {
      echo "Cache Time: Please choose a number! (Set to 3.600 now)";
      $widget_options['wc_cachetime'] = "3600";
      }
      //check if data for license key and partner id have changed
      if ($widget_options['wc_partnerid']=="1235242915"){
      echo "Please remember, that you have to get your own and unique Licensekey to run this widget. It's free and just takes two minutes to get at <a href = 'https://registration.weather.com/ursa/xmloap/' target='_blank'>weather.com</a>!<br /><br />";
      }
      else
      {
      echo "Thanks for getting and using your own Licensekey!<br /><br />";
      }
      //$wc_cachetime=$wc_cachetime+1;     
      if( $opt_auto_location_select=="checked" && $widget_options['wc_cachetime']+1 > 2 ){
      echo "Cachetime has to be set 0 or 1, when using 'Auto-Location'!<br /><br />";
      $widget_options['wc_cachetime'] = "0";
      } 
      if( $opt_auto_location_select=="checked" && $widget_options['opt_title_select']=="checked" ){
      echo "If you choose the Auto-Location-Feature, your given widget title has to be shown as a standard widget title! The 'shown-within-widget' selection is set to unchecked!' <br /><br />";
      $widget_options['opt_title_select'] = "unchecked";
      $widget_options['title'] = $title_back;
      
      }    
      $opt_sunmoon_text = htmlspecialchars($widget_options['opt_sunmoon_text'], ENT_QUOTES);
      if ($opt_sunmoon_text == "no"){$term=str_replace("%sunmoon_string_lang%","",$term);}
      $opt_link_to_weather_com  = htmlspecialchars($widget_options['opt_link_to_weather_com'], ENT_QUOTES);   
      $uri = 'http://xoap.weather.com/weather/local/'.htmlspecialchars($widget_options['wc_location'], ENT_QUOTES).'?par='.htmlspecialchars($widget_options['wc_partnerid'], ENT_QUOTES).'&key='.htmlspecialchars($widget_options['wc_licensekey'], ENT_QUOTES);
		  $data = GG_func_get_content($uri);
      $wc_connection_check="Serverconnection to Weather.Com ok!";	
      if($data===false){
      $wc_connection_check="No connection to the weather server! Please check this <a href='".$uri."' target='_blank'> Link</a>! If the link works and you'll see some weired data, the connection to Weather.Com is OK. Is there something with your Server or Installation? <br />";
      }     
      $pos = strpos($data, "<dnam>");
			$wc_location_check = substr($data, $pos, strpos($data,"</dnam>") - $pos);
			$pos = strpos($data, "Invalid License");
      if ($pos<>0 AND $data != false){
      $wc_id_check="Wrong Partner ID or License Key - Please check the IDs ! <br /> ";
      }
      $pos = strpos($data, "Invalid location");
      if ($pos<>0 AND $data != false){
      $wc_loc_check="You have entered an unknown Location key - Please check!  <br />";
      }
      if($ipinfodb_key<>""){
         $uri = 'http://api.ipinfodb.com/v3/ip-city/?key='.$ipinfodb_key.'&format=xml&ip=24.143.194.27';
	       $data = $data = GG_func_get_content($uri);
	       if(!substr_count($data,'ode>ERROR') ){}
            else
            {$ipinfodb_check="You have entered an invalid license key for ipinfodb.com please check!";}
      }
      $wc_MYSQL=mysql_query("select version() as ve");
      echo mysql_error();
      $wc_MYSQL=mysql_fetch_object($wc_MYSQL);
      $wc_browser=GG_func_getBrowser();
      $wc_browser= " - " . $wc_browser['name'] . " " . $wc_browser['version'] . " on " .$wc_browser['platform']; 
      $wc_PHP = " - PHP:".phpversion();
      $wc_MYSQL = " MYSQL:".$wc_MYSQL->ve;
      $wc_WP = " WP:".get_bloginfo('version');
      $wc_Theme = get_template_directory_uri();
      $pos_Theme = strrpos($wc_Theme,"/");
      $wc_Theme = substr($wc_Theme,$pos_Theme+1,strlen($wc_Theme)-$pos_Theme-1);
      $wc_Theme = " - ".$wc_Theme;
      $widget_options['format'] = $term;
      $widget_options['wc_location_check'] = strip_tags(stripslashes($wc_location_check));
      if($title=""){$title="&nbsp";}      
  		update_option('GG_func_widget_weather_and_weather_forecast', $widget_options);
  	}  
  	$title_back = htmlspecialchars($widget_options['title_back'], ENT_QUOTES);
  	$wc_location = htmlspecialchars($widget_options['wc_location'], ENT_QUOTES);
  	$wc_location_check = htmlspecialchars($widget_options['wc_location_check'], ENT_QUOTES);
  	$images = htmlspecialchars($widget_options['images'], ENT_QUOTES);
  	$imagefolder = htmlspecialchars($widget_options['imagefolder'], ENT_QUOTES);
  	$wc_partnerid = htmlspecialchars($widget_options['wc_partnerid'], ENT_QUOTES);
  	$wc_licensekey = htmlspecialchars($widget_options['wc_licensekey'], ENT_QUOTES);
  	$ipinfodb_key = htmlspecialchars($widget_options['ipinfodb_key'], ENT_QUOTES);
  	$wc_cachetime = htmlspecialchars($widget_options['wc_cachetime'], ENT_QUOTES);
  	$f_size_l = htmlspecialchars($widget_options['f_size_l'], ENT_QUOTES);
  	$f_size_m = htmlspecialchars($widget_options['f_size_m'], ENT_QUOTES);
  	$f_size_s = htmlspecialchars($widget_options['f_size_s'], ENT_QUOTES);
  	$i_size_l = htmlspecialchars($widget_options['i_size_l'], ENT_QUOTES);
  	$i_size_m = htmlspecialchars($widget_options['i_size_m'], ENT_QUOTES);
  	$i_size_s = htmlspecialchars($widget_options['i_size_s'], ENT_QUOTES);
  	$background_color = htmlspecialchars($widget_options['background_color'], ENT_QUOTES);
  	$font_color = htmlspecialchars($widget_options['font_color'], ENT_QUOTES);
  	$font_family = htmlspecialchars($widget_options['font_family'], ENT_QUOTES);
  	$opt_language = htmlspecialchars($widget_options['opt_language'], ENT_QUOTES);
  	$opt_language_select = htmlspecialchars($widget_options['opt_language_select'], ENT_QUOTES);
  	$opt_auto_location_select =  htmlspecialchars($widget_options['opt_auto_location_select'], ENT_QUOTES);
  	$opt_extended_forecast_select =  htmlspecialchars($widget_options['opt_extended_forecast_select'], ENT_QUOTES);
  	$opt_day_night_images_select =  htmlspecialchars($widget_options['opt_day_night_images_select'], ENT_QUOTES);
  	$opt_auto_location_select =  htmlspecialchars($widget_options['opt_auto_location_select'], ENT_QUOTES);
  	$opt_css_select = htmlspecialchars($widget_options['opt_css_select'], ENT_QUOTES);
  	$opt_title_select = htmlspecialchars($widget_options['opt_title_select'], ENT_QUOTES);
  	$opt_layout = htmlspecialchars($widget_options['opt_layout'], ENT_QUOTES);
  	$time_corr = htmlspecialchars($widget_options['time_corr'], ENT_QUOTES);
  	$opt_lines = htmlspecialchars($widget_options['opt_lines'], ENT_QUOTES);
  	$opt_sunmoon_text = htmlspecialchars($widget_options['opt_sunmoon_text'], ENT_QUOTES);
  	$opt_link_to_weather_com  = htmlspecialchars($widget_options['opt_link_to_weather_com'], ENT_QUOTES);
  	$format =  htmlspecialchars($widget_options['format'], ENT_QUOTES);
  	$opt_unit = $widget_options['opt_unit'];
    $uri = 'http://xoap.weather.com/weather/local/'.$wc_location.'?cc=*&dayf=4&dayd=10&link=xoap&prod=xoap&unit='.$opt_unit.'&par='.$wc_partnerid.'&key='.$wc_licensekey;
    echo '<table>';
    echo '<tr><td><b>Title:</b></td></tr>';                      
    echo '<tr><td><label><input style="width: 250px;" name="weather_and_weather_forecast-title_back" type="text" value="'.$title_back.'" /></label></td>';
    echo '<td>&nbsp;<input type="checkbox" name="weather_and_weather_forecast-opt_title_select" value="checked" '.(($opt_title_select=='checked')?'checked="checked"' : '').'"><a title="Check if you want to show the title within the widget - if unchecked, the title will be shown like every widget title according to the settings of your theme">&nbsp;shown within widget</a></td></td></tr>';   
    echo '</table>';
    echo '<table>';
    echo '<tr><td><b>Location:</b>&nbsp;&nbsp;<a href="http://www.go-gadget-blog.com"  target="_blank" title="Click here to get your Location Code / Hier klicken um den Code f&uuml;r Ihre Stadt zu bekommen!">Your/Ihr Location Code</a></td></tr>';
    echo '</table>';
    echo '<table>';
    echo '<tr><td><input type="checkbox" name="weather_and_weather_forecast-opt_auto_location_select" value="checked" '.(($opt_auto_location_select=='checked')?'checked="checked"' : '').'"><a title="Check this, if you like to show the weather for the location of each of your visitor! The location on the right will only be used, in case the weather widget isnt able to locate visitors home!"> Auto &nbsp;&nbsp;&nbsp;</a></td><td><label><input style="width: 80px;"  name="weather_and_weather_forecast-wc_location" type="text" value="'.$wc_location.'" /></label></td><td>&nbsp;= '.$wc_location_check.'</td></tr>';
    echo '</table>';
    echo '<table>';
    echo '<td><b>Technical Settings:</b></td><td>&nbsp;&nbsp;<a href="http://www.go-gadget-blog.com/gogadget/wp-content/uploads/Weather_and_Weather_Forecast_Widget_eng_2.1.pdf" target="_blank" style:"font-size:0.5em" title="Click for help!">Help!</a>&nbsp;&nbsp;<a href="http://www.go-gadget-blog.com/gogadget/wp-content/uploads/Weather_and_Weather_Forecast_Widget_ger_2.1.pdf" target="_blank" style:"font-size:0.5em" title="F&uuml;r Einstellungshilfe hier klicken!">Hilfe!</a></td>';
    echo '</table>';
    echo '<table>';
    echo '<tr><td>Partner ID</td><td>License Key</td><td colspan="4">Cache &nbsp;&nbsp;Serv.time</td></tr>';
    echo '<tr><td><label><input style="width: 90px;" name="weather_and_weather_forecast-wc_partnerid" type="text" value="'.$wc_partnerid.'" /></label></td>';
    echo '<td><label><input style="width: 130px;" name="weather_and_weather_forecast-wc_licensekey" type="text" value="'.$wc_licensekey.'" /></label></td>';
    echo '<td><label><input style="width: 40px;" name="weather_and_weather_forecast-wc_cachetime" type="text" value="'.$wc_cachetime.'" /></label></td>';
    echo '<td>sec&nbsp;</td>';
    echo '<td><label><input style="width: 20px;" name="weather_and_weather_forecast-time_corr" type="text" value="'.$time_corr.'" /></label></td>';
    echo '<td>hrs&nbsp;</td></tr>';
    echo '</table>';
    echo '<table>';
    echo '<tr><td>(opt.)Key for Ipinfo:</td><td><label><input style="width: 215px; " name="weather_and_weather_forecast-ipinfodb_key" type="text" value="'.$ipinfodb_key.'" /></label></td></tr>';
    echo '</table>';
    echo '<table>';
    echo '<tr><td>Images:</td><td><label><input style="width: 305px; " name="weather_and_weather_forecast-images" type="text" value="'.$images.'" /></label></td></tr>';
    echo '</table>';
    echo '<table><tr><td><b>Status:</b></td></tr>';
    echo '<tr><td>'.$wc_id_check.'</td></tr>';
    echo '<tr><td>'.$wc_loc_check.'</td></tr>';
    echo '<tr><td>'.$ipinfodb_check.'</td></tr>';
    echo '<tr><td>'.$wc_connection_check.'</td></tr>'; 
    echo '</table>System: ';
    echo $wc_WP.$wc_Theme.$wc_PHP.$wc_MYSQL.$wc_browser;
    echo '<table>';
    echo '<td><b>Layout Settings:</b></td><td>&nbsp;&nbsp;<a href="http://www.go-gadget-blog.com/gogadget/wp-content/uploads/Weather_and_Weather_Forecast_Widget_eng_2.1.pdf" target="_blank" style:"font-size:0.5em" title="Click for help!">Help!</a>&nbsp;&nbsp;<a href="http://www.go-gadget-blog.com/gogadget/wp-content/uploads/Weather_and_Weather_Forecast_Widget_ger_2.1.pdf" target="_blank" style:"font-size:0.5em" title="F&uuml;r Einstellungshilfe hier klicken!">Hilfe!</a></td>';
    echo '</table>';
    echo '<table>';
    echo '<tr><td><label><select style="width: 360px;" name="weather_and_weather_forecast-imagefolder"><option value="WeatherCom_1" '.( ($imagefolder == "WeatherCom_1") ? "selected=\"selected\" " : "" ).'>Images: Weather.Com Images (Set 1)</option><option value="WeatherCom_2" '.( ($imagefolder == "WeatherCom_2") ? "selected=\"selected\" " : "" ).'>Images: Weather.Com Images (Set 2)</option><option value="Custom1" '.( ($imagefolder == "Custom1") ? "selected=\"selected\" " : "" ).'>Images:  Custom 1 ("../weatherimages/Custom1")</option><option value="Custom2" '.( ($imagefolder == "Custom2") ? "selected=\"selected\" " : "" ).'>Images:  Custom 2 ("../weatherimages/Custom2")</option><option value="Custom3" '.( ($imagefolder == "Custom3") ? "selected=\"selected\" " : "" ).'>Images:  Custom 3 ("../weatherimages/Custom3")</option></label></td></tr>';
    echo '<tr><td><label><select style="width: 360px;" name="weather_and_weather_forecast-opt_layout"><option value="small" '.( ($opt_layout == "small") ? "selected=\"selected\" " : "" ).'>Small Layout: Shows only the current conditions</option><option value="medium" '.( ($opt_layout == "medium") ? "selected=\"selected\" " : "" ).'>Medium Layout: Current Conditions and forecast for today</option><option value="large" '.( ($opt_layout == "large") ? "selected=\"selected\" " : "" ).'>Large Layout: Conditions and Forecast for next three days</option></label></td></tr>';
    echo '</table>';
    echo '<table>';
    echo '<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Language selection</td>';
    echo '<td>&nbsp;<input type="checkbox" name="weather_and_weather_forecast-opt_extended_forecast_select" value="checked" '.(($opt_extended_forecast_select=='checked')?'checked="checked"' : '').'"><a title="Available with every language selection, texts will be shown in German (German language selected) or Englisch (all other selections) nevertheless!">&nbsp;Extended Forecast</a></td></td></tr>';
    echo '<tr>';
    echo '<td>&nbsp;<input type="checkbox" name="weather_and_weather_forecast-opt_language_select" value="checked" '.(($opt_language_select=='checked')?'checked="checked"' : '').'"><a title="Check this if you like the widget to decide which language to choose from (see the manual for details!). The chosen language from the box on the right will be used as your default language nevertheless!">&nbsp;Auto&nbsp;</a></td>';
    echo '<td><label><select style="width: 130px;" name="weather_and_weather_forecast-opt_language"></option><option value="de" '.( ($opt_language == "de") ? "selected=\"selected\" " : "" ).'>Deutsch (German) </option><option value="en" '.( ($opt_language == "en") ? "selected=\"selected\" " : "" ).'>English</option><option value="es" '.( ($opt_language == "es") ? "selected=\"selected\" " : "" ).'>Espa&ntilde;ol (Spanish)</option><option value="fr" '.( ($opt_language == "fr") ? "selected=\"selected\" " : "" ).'>Fran&ccedil;ais (French)</option><option value="it" '.( ($opt_language == "it") ? "selected=\"selected\" " : "" ).'>Italiano (Italian)</option><option value="hu" '.( ($opt_language == "hu") ? "selected=\"selected\" " : "" ).'>Magyar (Hungarian)</option><option value="pl" '.( ($opt_language == "pl") ? "selected=\"selected\" " : "" ).'>Polski (Polish)</option></label>&nbsp;</td>';
    echo '<td>&nbsp;<input type="checkbox" name="weather_and_weather_forecast-opt_day_night_images_select" value="checked" '.(($opt_day_night_images_select=='checked')?'checked="checked"' : '').'"><a title="Check if you want to show weather images for day AND night forecasts with the large layout">&nbsp;Night images</a></td></td></tr>';
    echo '</tr>';
    echo '</table>';
    echo '<table>'; 
    echo '<tr><td colspan = 2><a title="Choose YES to show infos about Sunrise, -setting and Moonphase with the actual conditions!">Sun/Moon</a> &nbsp; <a title="Select between metric and imperial units">Units</a></td><td colspan=2> &nbsp;&nbsp;<a title="Coose a different Font and Font Color. For color choose a valid color name or a hexcode! See manual for details!">Font Family / Color (opt.)</a></td></tr>';
    echo '<tr>';
    echo '<td><label><select style="width: 50px;" name="weather_and_weather_forecast-opt_sunmoon_text"><option value="yes" '.( ($opt_sunmoon_text == "yes") ? "selected=\"selected\" " : "" ).'>yes</option><option value="no" '.( ($opt_sunmoon_text == "no") ? "selected=\"selected\" " : "" ).'>no</option></label></td>';
    echo '<td><label><select style="width: 103px;" name="weather_and_weather_forecast-opt_unit"><option value="s" '.( ($opt_unit == "s") ? "selected=\"selected\" " : "" ).'>&deg;F / imperial</option><option value="m" '.( ($opt_unit == "m") ? "selected=\"selected\" " : "" ).'>&deg;C / metric</option></label></td>';
    echo '<td><label><select style="width: 97px;" name="weather_and_weather_forecast-font_family"><option value="(Theme)" '.( ($font_family == "") ? "selected=\"selected\" " : "" ).'>(Theme)</option><option value="Arial" '.( ($font_family == "Arial") ? "selected=\"selected\" " : "" ).'>Arial</option><option value="Avantgarde" '.( ($font_family == "Avantgarde") ? "selected=\"selected\" " : "" ).'>Avantgarde</option><option value="Comic Sans MS" '.( ($font_family == "Comic Sans MS") ? "selected=\"selected\" " : "" ).'>Comic Sans MS</option><option value="Helvetica" '.( ($font_family == "Helvetica") ? "selected=\"selected\" " : "" ).'>Helvetica</option><option value="Times New Roman" '.( ($font_family == "Times New Roman") ? "selected=\"selected\" " : "" ).'>Times New Roman</option><option value="Verdana" '.( ($font_family == "Verdana") ? "selected=\"selected\" " : "" ).'>Verdana</option></label></td>';
    echo '<td><label><input style="width: 97px;" name="weather_and_weather_forecast-font_color" type="text" value="'.$font_color.'" /></label></td>';
    echo '</table>';
    echo '<table>';
    echo '<tr><td></td><td><a title="Settings for all large images and texts. See manual for details!">Size L</a></td><td><a title="Settings for all medium images and texts. See manual for details!">Size M</a></td><td><a title="Settings for all small images and texts. See manual for details!">Size S</a></td></tr>';
    echo '<tr>';
    echo '<td><a title="Use the percentage values to fit font size. See manual for details!">Font&nbsp;</a></td><td><label><select style="width: 99px;" name="weather_and_weather_forecast-f_size_l"><option value="170%" '.( ($f_size_l == "170%") ? "selected=\"selected\" " : "" ).'>170%</option><option value="160%" '.( ($f_size_l == "160%") ? "selected=\"selected\" " : "" ).'>160%</option><option value="150%" '.( ($f_size_l == "150%") ? "selected=\"selected\" " : "" ).'>150%</option><option value="140%" '.( ($f_size_l == "140%") ? "selected=\"selected\" " : "" ).'>140%</option><option value="130%" '.( ($f_size_l == "130%") ? "selected=\"selected\" " : "" ).'>130%</option><option value="120%" '.( ($f_size_l == "120%") ? "selected=\"selected\" " : "" ).'>120%</option><option value="110%" '.( ($f_size_l == "110%") ? "selected=\"selected\" " : "" ).'>110%</option></option><option value="100%" '.( ($f_size_l == "100%") ? "selected=\"selected\" " : "" ).'>100%</option><option value="90%" '.( ($f_size_l == "90%") ? "selected=\"selected\" " : "" ).'>90%</option><option value="80%" '.( ($f_size_l == "80%") ? "selected=\"selected\" " : "" ).'>80%</option></label></td>';
    echo '<td><label><select style="width: 99px;" name="weather_and_weather_forecast-f_size_m"><option value="150%" '.( ($f_size_m == "150%") ? "selected=\"selected\" " : "" ).'>150%</option><option value="140%" '.( ($f_size_m == "140%") ? "selected=\"selected\" " : "" ).'>140%</option><option value="130%" '.( ($f_size_m == "130%") ? "selected=\"selected\" " : "" ).'>130%</option><option value="120%" '.( ($f_size_m == "120%") ? "selected=\"selected\" " : "" ).'>120%</option><option value="110%" '.( ($f_size_m == "110%") ? "selected=\"selected\" " : "" ).'>110%</option><option value="100%" '.( ($f_size_m == "100%") ? "selected=\"selected\" " : "" ).'>100%</option><option value="90%" '.( ($f_size_m == "90%") ? "selected=\"selected\" " : "" ).'>90%</option><option value="80%" '.( ($f_size_m == "80%") ? "selected=\"selected\" " : "" ).'>80%</option><option value="70%" '.( ($f_size_m == "70%") ? "selected=\"selected\" " : "" ).'>70%</option><option value="60%" '.( ($f_size_m == "60%") ? "selected=\"selected\" " : "" ).'>60%</option></label></td>';
    echo '<td><label><select style="width: 99px;" name="weather_and_weather_forecast-f_size_s"><option value="130%" '.( ($f_size_m == "130%") ? "selected=\"selected\" " : "" ).'>130%</option><option value="120%" '.( ($f_size_s == "120%") ? "selected=\"selected\" " : "" ).'>120%</option><option value="110%" '.( ($f_size_s == "110%") ? "selected=\"selected\" " : "" ).'>110%</option><option value="100%" '.( ($f_size_s == "100%") ? "selected=\"selected\" " : "" ).'>100%</option><option value="90%" '.( ($f_size_s == "90%") ? "selected=\"selected\" " : "" ).'>90%</option><option value="80%" '.( ($f_size_s == "80%") ? "selected=\"selected\" " : "" ).'>80%</option><option value="70%" '.( ($f_size_s == "70%") ? "selected=\"selected\" " : "" ).'>70%</option><option value="60%" '.( ($f_size_s == "60%") ? "selected=\"selected\" " : "" ).'>60%</option><option value="50%" '.( ($f_size_s == "50%") ? "selected=\"selected\" " : "" ).'>50%</option><option value="40%" '.( ($f_size_s == "40%") ? "selected=\"selected\" " : "" ).'>40%</option></label></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><a title="Use the percentage values to fit the size of the images. See manual for details!">Images&nbsp;</a></td><td><label><select style="width: 99px;" name="weather_and_weather_forecast-i_size_l"><option value="1.4" '.( ($i_size_l == "1.4") ? "selected=\"selected\" " : "" ).'>140%</option><option value="1.3" '.( ($i_size_l == "1.3") ? "selected=\"selected\" " : "" ).'>130%</option><option value="1.2" '.( ($i_size_l == "1.2") ? "selected=\"selected\" " : "" ).'>120%</option><option value="1.1" '.( ($i_size_l == "1.1") ? "selected=\"selected\" " : "" ).'>110%</option></option><option value="1" '.( ($i_size_l == "1") ? "selected=\"selected\" " : "" ).'>100%</option><option value="0.9" '.( ($i_size_l == "0.9") ? "selected=\"selected\" " : "" ).'>90%</option><option value="0.8" '.( ($i_size_l == "0.8") ? "selected=\"selected\" " : "" ).'>80%</option><option value="0.7" '.( ($i_size_l == "0.7") ? "selected=\"selected\" " : "" ).'>70%</option><option value="0.6" '.( ($i_size_l == "0.6") ? "selected=\"selected\" " : "" ).'>60%</option></label></td>';
    echo '<td><label><select style="width: 99px;" name="weather_and_weather_forecast-i_size_m"><option value="1.4" '.( ($i_size_m == "1.4") ? "selected=\"selected\" " : "" ).'>140%</option><option value="1.3" '.( ($i_size_m == "1.3") ? "selected=\"selected\" " : "" ).'>130%</option><option value="1.2" '.( ($i_size_m == "1.2") ? "selected=\"selected\" " : "" ).'>120%</option><option value="1.1" '.( ($i_size_m == "1.1") ? "selected=\"selected\" " : "" ).'>110%</option></option><option value="1" '.( ($i_size_m == "1") ? "selected=\"selected\" " : "" ).'>100%</option><option value="0.9" '.( ($i_size_m == "0.9") ? "selected=\"selected\" " : "" ).'>90%</option><option value="0.8" '.( ($i_size_m == "0.8") ? "selected=\"selected\" " : "" ).'>80%</option><option value="0.7" '.( ($i_size_m == "0.7") ? "selected=\"selected\" " : "" ).'>70%</option><option value="0.6" '.( ($i_size_m == "0.6") ? "selected=\"selected\" " : "" ).'>60%</option></label></td>';
    echo '<td><label><select style="width: 99px;" name="weather_and_weather_forecast-i_size_s"><option value="1.4" '.( ($i_size_s == "1.4") ? "selected=\"selected\" " : "" ).'>140%</option><option value="1.3" '.( ($i_size_s == "1.3") ? "selected=\"selected\" " : "" ).'>130%</option><option value="1.2" '.( ($i_size_s == "1.2") ? "selected=\"selected\" " : "" ).'>120%</option><option value="1.1" '.( ($i_size_s == "1.1") ? "selected=\"selected\" " : "" ).'>110%</option></option><option value="1" '.( ($i_size_s == "1") ? "selected=\"selected\" " : "" ).'>100%</option><option value="0.9" '.( ($i_size_s == "0.9") ? "selected=\"selected\" " : "" ).'>90%</option><option value="0.8" '.( ($i_size_s == "0.8") ? "selected=\"selected\" " : "" ).'>80%</option><option value="0.7" '.( ($i_size_s == "0.7") ? "selected=\"selected\" " : "" ).'>70%</option><option value="0.6" '.( ($i_size_s == "0.6") ? "selected=\"selected\" " : "" ).'>60%</option></label></td>';
    echo '</tr>';
    echo '</table>';
    echo '<table>';
    echo '<tr><td><a title="Choose YES if you like to separate the widget with additional lines before and after the widget">Lines(opt.)</a></td><td><a title="Name a color name for the background if you like. For color choose a valid color name or a hexcode! See manual for details!">BackColor(opt.)</a></td><td><a title="If your widget area provides more space than the widget needs, you can choose a left and right padding to optimize the look!">Padding(opt.)</a></td><td><a title="Recommended to check!">Embedded</a></td></tr>';
    echo '<tr><td><label><select style="width: 70px;" name="weather_and_weather_forecast-opt_lines"><option value="no" '.( ($opt_lines == "no") ? "selected=\"selected\" " : "" ).'>no</option><option value="yes" '.( ($opt_lines == "yes") ? "selected=\"selected\" " : "" ).'>yes</option></label></td>';
    echo '<td><label><input style="width: 110px;" name="weather_and_weather_forecast-background_color" type="text" value="'.$background_color.'" /></label></td>';
    echo '<td><label><select style="width: 90px;" name="weather_and_weather_forecast-size_padding"><option value="0px" '.( ($size_padding == "0px") ? "selected=\"selected\" " : "" ).'>0px</option><option value="5px" '.( ($size_padding == "5px") ? "selected=\"selected\" " : "" ).'>5px</option><option value="10px" '.( ($size_padding == "10px") ? "selected=\"selected\" " : "" ).'>10px</option><option value="15px" '.( ($size_padding == "15px") ? "selected=\"selected\" " : "" ).'>15px</option><option value="20px" '.( ($size_padding == "20px") ? "selected=\"selected\" " : "" ).'>20px</option><option value="25px" '.( ($size_padding == "25px") ? "selected=\"selected\" " : "" ).'>25px</option><option value="30px" '.( ($size_padding == "30px") ? "selected=\"selected\" " : "" ).'>30px</option><option value="35px" '.( ($size_padding == "35px") ? "selected=\"selected\" " : "" ).'>35px</option><option value="40px" '.( ($size_padding == "40px") ? "selected=\"selected\" " : "" ).'>40px</option><option value="45px" '.( ($size_padding == "45px") ? "selected=\"selected\" " : "" ).'>45px</option><option value="50px" '.( ($size_padding == "50px") ? "selected=\"selected\" " : "" ).'>50px</option></label></td>';  
    echo '<td>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="weather_and_weather_forecast-opt_css_select" value="checked" '.(($opt_css_select=='checked')?'checked="checked"' : '').'">&nbsp;CSS</td>';
    echo '</table>';
    echo '<table><td>&nbsp;&nbsp;&nbsp;Link to weather.com (mandatory!):</td>';
    echo '<td><label><select style="width: 100px;" name="weather_and_weather_forecast-opt_link_to_weather_com"><option value="yes" '.( ($opt_link_to_weather_com == "yes") ? "selected=\"selected\" " : "" ).'>yes</option><option value="no" '.( ($opt_link_to_weather_com == "no") ? "selected=\"selected\" " : "" ).'>no</option></label></td></tr></table>';
  	echo '<input type="hidden" name="weather_and_weather_forecast-submit" value="1" />';
}
//**************************end control******************************************

//**************************widget***********************************************
function GG_func_widget_weather_and_weather_forecast($args) {
   
  extract($args);
  include_once 'gg_funx_.php';
	$fill_in="";    //just to initiate some of the variables
  $fill_out="";
  $icon_layout_middle_check="";
  $pressuretendence_lang="";
  $extended_forecast="";
  for($i=0;$i<10;$i++){ 
    $day[$i]="";
    $cond_day_lang[$i]="";
    $cond_night_lang[$i]="";
    $day_ext[$i]="";
    for($j=0;$j<19;$j++){
      $cond_night_text[$i][$j]="";
      $cond_day_text[$i][$j]="";} }   //end of initialization
  $widget_options = get_option('GG_func_widget_weather_and_weather_forecast');
  $title = htmlspecialchars($widget_options['title'], ENT_QUOTES);
  $title_back = htmlspecialchars($widget_options['title_back'], ENT_QUOTES);
	$wc_location = urlencode($widget_options['wc_location']);
	$wc_location_check = $widget_options['wc_location_check'];
	$wc_partnerid = urlencode($widget_options['wc_partnerid']);
	$wc_licensekey = urlencode($widget_options['wc_licensekey']);
	$ipinfodb_key = htmlspecialchars($widget_options['ipinfodb_key'], ENT_QUOTES);
	$imageloc = $widget_options['images'];
	$imagefolder = $widget_options['imagefolder']."/";
	$imagefolder_check="WeatherCom";
	if(!substr_count($imagefolder,"Weather")){$imagefolder_check="Custom";} 
	$widgettitle = ($widget_options['title'] != "") ? $before_title.$widget_options['title'].$after_title : "";  // ($widget_options['title'] != "") ? $widget_options['title'] : "weather Rankings";
	$wc_cachetime = $widget_options['wc_cachetime'];
	$wc_lastcheck = $widget_options['wc_lastcheck'];
	$opt_unit = $widget_options['opt_unit'];
	$opt_unit = ($opt_unit == "s" || $opt_unit == "m") ? $opt_unit : "m";
	$opt_auto_location_select =  htmlspecialchars($widget_options['opt_auto_location_select'], ENT_QUOTES);
	$opt_title_select = htmlspecialchars($widget_options['opt_title_select'], ENT_QUOTES);
	$opt_language = $widget_options['opt_language'];
	$opt_language_select = $widget_options['opt_language_select'];
	$opt_css_select = $widget_options['opt_css_select'];
  $opt_language = ($opt_language == "de" || $opt_language == "en" || $opt_language == "fr" || $opt_language == "es" || $opt_language == "it" || $opt_language == "pl" || $opt_language == "hu"  ) ? $opt_language : "en";
  $opt_language_2="";
  $opt_language_index=0;
  $pageURL="";
  $auto_loc="";
 
  if ($opt_language_select=="checked") {
      if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
      }
     $pos = strpos($pageURL, "lang=");
     if ($pos >0){
      $opt_language_2 = substr($pageURL, $pos+5, 2);
       }
      else
      {
        $lang = getenv('HTTP_ACCEPT_LANGUAGE');
        if ( $lang != '' ) {
           $lang = preg_replace('/(;q=[0-99]+.[0-99]+)/i','',$lang);
           $lang_array = explode(",", $lang);
           $opt_language_2 = strtolower($lang_array[0]);
        	 $opt_language_2 = substr ($opt_language_2, 0, 2);
        }
      }  
   }
  if($opt_language_2 == "de" || $opt_language_2 == "en" || $opt_language_2 == "fr" || $opt_language_2 == "es" || $opt_language_2 == "it" || $opt_language_2 == "pl" || $opt_language_2 == "hu"){$opt_language=$opt_language_2;}
  if ($opt_language=="de"){$opt_language_index=0;}
  if ($opt_language=="fr"){$opt_language_index=1;}
  if ($opt_language=="es"){$opt_language_index=2;}
  if ($opt_language=="it"){$opt_language_index=3;}
  if ($opt_language=="pl"){$opt_language_index=4;}
  if ($opt_language=="hu"){$opt_language_index=5;}
  
  if($opt_auto_location_select=="checked"){
    list($flag_search,$search_string,$country_code) = GG_func_get_ip_data($ipinfodb_key);
    //echo $flag_search."XXX".$search_string."xxx".$country_code; 
    if($flag_search=="Yes"){
      list($loc_id,$loc_city,$loc_state)= GG_func_get_location_ids($search_string);
      //echo "WW".$loc_id."XX".$loc_city."YY".$loc_state."ZZ";
      if($loc_id=="")
      {
      list($loc_id,$loc_city,$loc_state)= GG_func_get_location_ids(GG_funx_translate_capital($country_code).",".$country_code);
      }
      if($loc_id!=""){  
        if($opt_language!="en"){$loc_state=GG_func_translate_statename(strtolower($country_code),$opt_language_index);}
        $auto_loc=$loc_city.", ".$loc_state;
        $wc_location=$loc_id;
      }
      else
      {
        $auto_loc=$wc_location_check;
      }
    }
    if($flag_search!="Yes"){
    $auto_loc=$wc_location_check;}
  }
  if($opt_title_select=="checked")
    {
    $auto_loc=$title_back;  
    }  
  $opt_layout = $widget_options['opt_layout'];
	$opt_sunmoon_text = $widget_options['opt_sunmoon_text'];
	$opt_link_to_weather_com = $widget_options['opt_link_to_weather_com'];
	$format=  $widget_options['format'];
	$time_corr = $widget_options['time_corr'];
  if(time() - $wc_cachetime < $wc_lastcheck and $widget_options['wc_cache'] != "") {
	echo $before_widget.$widgettitle.$widget_options['wc_cache'].$after_widget;
	}
	else {		
  $uri = 'http://xoap.weather.com/weather/local/'.$wc_location.'?cc=*&dayf=4&dayd=10&link=xoap&prod=xoap&unit='.$opt_unit.'&par='.$wc_partnerid.'&key='.$wc_licensekey;
   
  $data = GG_func_get_content($uri);
    if ($data === false){
      echo "No Data!<br />";
    }
   	if($data != "") {
      $head=GG_func_cutout($data, "<loc", "</loc>");
      $unit_percentage = "&#37;";    
      $unit_temperature = GG_func_cutout($head, "<ut>", "</ut>");
      $unit_pressure = GG_func_cutout($head, "<up>", "</up>");
      $unit_speed = GG_func_cutout($head, "<us>", "</us>");
			$unit_distance = GG_func_cutout($head, "<ud>", "</ud>");
      $unit_rain = GG_func_cutout($head, "<ur>", "</ur>");
	    $loc =  GG_func_cutout($head, "<dnam>", "</dnam>");
      $now = time();    // Get Sunrise and Sunset and calculate daylight time and -left
			$sunrise= GG_func_cutout($head, "<sunr>", "</sunr>");
      $pos = strpos($sunrise, ":");
      $sr_hour=substr($sunrise,0,$pos);
      $sr_minute=substr($sunrise,$pos+1,2);
      $sunrise = mktime($sr_hour,$sr_minute,0,strftime("%m",$now),strftime("%d",$now),strftime("%y",$now));
			$sunset= GG_func_cutout($head, "<suns>", "</suns>");
      $pos = strpos($sunset, ":");			
      if (str_replace("-","",$time_corr) != $time_corr)
      {
        $time_corr_sign="neg";
        $time_corr_flag=-1;
        $time_corr_alt= str_replace("-","",$time_corr);
      }
      else
      {
        $time_corr_sign="pos";
        $time_corr_flag=1;
        $time_corr_alt=$time_corr;
      }
      $check=strpos($time_corr_alt,'.');
      $time_corr_alt = str_replace(".","",$time_corr_alt);
      if ($check===false){
        $time_corr_hrs=$time_corr_alt;
        $time_corr_min=0;
      }
      else
      {
        $time_corr_hrs = substr($time_corr_alt,0,$check);
        $time_corr_min = round((substr($time_corr_alt,$check,strlen($time_corr_alt)-$check))*60/pow(10,strlen($time_corr_alt)-$check),2);
      }      
      $ss_hour=substr($sunset,0,$pos);
			$ss_hour=$ss_hour+12;
			$ss_minute=substr($sunset,$pos+1,2);
      $sunset = mktime($ss_hour,$ss_minute,0,strftime("%m",$now),strftime("%d",$now),strftime("%y",$now));
			$daylight_time=date("H:i",$sunset-$sunrise);
      $daylight_left=date("H:i",$sunset-$now-mktime($time_corr_hrs*$time_corr_flag,$time_corr_min*$time_corr_flag,0,0,0,0));
      $flag_day_night="night";
      $now_min=60*(int)substr(date("H:i",$now),0,2)+$time_corr_hrs*60+$time_corr_min+(int)substr(date("H:i",$now),3,2);
      $ss_min=$ss_hour*60+$ss_minute;
      $sr_min=$sr_hour*60+$sr_minute;
      if($now_min>=$sr_min and $now_min<=$ss_min){$flag_day_night="day";}   
      $night_left=date("H:i",$sunrise-$now-mktime($time_corr_hrs*$time_corr_flag,$time_corr_min*$time_corr_flag,0,0,0,0));
      $sunset =date("H:i",$sunset);
      $sunrise =date("H:i",$sunrise);
      $now =date("H:i",$now);
      $lnks= GG_func_cutout($data, "<lnks>", "</lnks>");
      $lnks = str_replace('"',"",$lnks);  // Replace any of any " in the string! They might cause trouble ... 
      $rand=rand(1,4);
      $link= GG_func_cutout($lnks, "<link pos=".$rand, "</link>");
      $prmo_link= GG_func_cutout($link,"<l>","</l>");
      $prmo_link_description= GG_func_cutout($link,"<t>","</t>");
      $cc = GG_func_cutout($data,"<cc>","</cc>");
      if($cc != "") {        	
  			$temp = GG_func_cutout($cc,"<tmp>","</tmp>").'&deg;'.$unit_temperature;;
  			$feels = GG_func_cutout($cc,"<flik>","</flik>").'&deg;'.$unit_temperature;;
  			$cond = GG_func_cutout($cc,"<t>","</t>");
  			$icon = GG_func_cutout($cc,"<icon>","</icon>");
  		  $cc_bar = GG_func_cutout($cc,"<bar>","</bar>");
  			$pressure = GG_func_cutout($cc_bar,"<r>","</r>");
  			$pressuretendence = GG_func_cutout($cc_bar,"<d>","</d>");
  			$cc_wind = GG_func_cutout($cc,"<wind>","</wind>");
  			$windspeed = GG_func_cutout($cc_wind,"<s>","</s>");
  			$windgust = GG_func_cutout($cc_wind,"<gust>","</gust>");
  			$winddirections = GG_func_cutout($cc_wind,"<d>","</d>");
  			$winddirections_description = GG_func_cutout($cc_wind,"<t>","</t>");
  			$humidity = GG_func_cutout($cc,"<hmid>","</hmid>").''.$unit_percentage;
  			$visibility = GG_func_cutout($cc,"<vis>","</vis>");
  			$cc_uv = GG_func_cutout($cc,"<uv>","</uv>");
  			$uv_index = GG_func_cutout($cc_uv,"<i>","</i>");
  			$uv_description = GG_func_cutout($cc_uv,"<t>","</t>");
  			$dew_point = GG_func_cutout($cc,"<dewp>","</dewp>").'&deg;'.$unit_temperature;;
  			$cc_moon = GG_func_cutout($cc,"<moon>","</moon>"); 
  			$moonphase = GG_func_cutout($cc_moon,"<t>","</t>");
        $flag_cc="";
			}
			else {
        $flag_cc="N/A";      
      }     
      $dayf=GG_func_cutout($data,"<dayf>","</dayf>"); // Prepare String for Forecastdata
      $dayf = str_replace('"',"",$dayf);  // Replace any of any " in the string! They might cause trouble ...
      if ($dayf=="") 
      {$flag_fc="N/A";
      }
      else
      {
        for ($i = 0; $i<=3;$i++){   // Get Forecastdatastring(i))  				
  				$pos = strpos($dayf, '<day d='.$i);
  				$dayf_i_len =  strpos($dayf,'<day d='.($i+1));
  				if ($dayf_i_len == 0){$dayf_i_len = strlen($dayf);}
  				$dayf_i = substr($dayf, $pos, $dayf_i_len - $pos);
          $pos = strpos($dayf_i, "t=") + 2;
          $day[$i]= substr($dayf_i, $pos, strpos($dayf_i, "dt=") - $pos-1); //Get day
  				$temp_hi[$i]=GG_func_cutout($dayf_i,"<hi>","</hi>").'&deg;'.$unit_temperature;
  		    $temp_lo[$i]=GG_func_cutout($dayf_i,"<low>","</low>").'&deg;'.$unit_temperature;
  				$dayf_day=GG_func_cutout($dayf_i,"<part p=d>","<part p=n>");
  				$dayf_day_wind = GG_func_cutout($dayf_day,"<wind>","</wind>");
          $wind_speed_day[$i] = GG_func_cutout($dayf_day_wind,"<s>","</s>");
          $wind_directions_day[$i] = GG_func_cutout($dayf_day_wind,"<t>","</t>");
          $icon_day[$i] = GG_func_cutout($dayf_day,"<icon>","</icon>");
          if($imagefolder_check=="WeatherCom"){
            if ($i==0){$iconhref_day[$i] = $imageloc.$imagefolder."61/".$icon_day[$i].'.png';}
            else{$iconhref_day[$i] = $imageloc.$imagefolder."31/".$icon_day[$i].'.png';}}
          else{
            if ($i==0){$iconhref_day[$i] = $imageloc.$imagefolder.$icon_day[$i].'.png';}
            else{$iconhref_day[$i] = $imageloc.$imagefolder.$icon_day[$i].'.png';}
          } 
          $cond_day[$i] = GG_func_cutout($dayf_day,"<t>","</t>");
  				$ppcp_day[$i] = GG_func_cutout($dayf_day,"<ppcp>","</ppcp>").''.$unit_percentage;
  				$dayf_night =  GG_func_cutout($dayf_i,"<part p=n>","</day>");
          $dayf_night_wind = GG_func_cutout($dayf_night,"<wind>","</wind>");
          $wind_speed_night[$i] = GG_func_cutout($dayf_night_wind,"<s>","</s>");
          $wind_directions_night[$i] = GG_func_cutout($dayf_night_wind,"<t>","</t>");
          $icon_night[$i] = GG_func_cutout($dayf_night,"<icon>","</icon>");
          if($imagefolder_check=="WeatherCom"){
            if ($i==0){$iconhref_night[$i] = $imageloc.$imagefolder."61/".$icon_night[$i].'.png';}
            else{$iconhref_night[$i] = $imageloc.$imagefolder."31/".$icon_night[$i].'.png';}}
          else{
            if ($i==0){$iconhref_night[$i] = $imageloc.$imagefolder.$icon_night[$i].'.png';}
            else{$iconhref_night[$i] = $imageloc.$imagefolder.$icon_night[$i].'.png';}
          }  
          $cond_night[$i] = GG_func_cutout($dayf_night,"<t>","</t>");
  				$ppcp_night[$i] = GG_func_cutout($dayf_night,"<ppcp>","</ppcp>").''.$unit_percentage;
  				} 
        }  
        $dayd = GG_func_cutout($data,"<dayd>","</dayd>");
        $dayd = str_replace('"',"",$dayd);  // Replace any of any " in the string! They might cause trouble ...
        if ($dayd=="") 
        {
          $flag_fc_xl="N/A";
        }
        else
        {
          for($i=0;$i<10;$i++)
          {
            $pos = strpos($dayd, '<day d='.$i);
    				$dayd_i_len =  strpos($dayd,'<day d='.($i+1));    				
            if ($dayd_i_len == 0){$dayd_i_len = strlen($dayd);} 
            $dayd_i = substr($dayd, $pos, $dayd_i_len - $pos);
            $pos = strpos($dayd_i, "t=") + 2;
            if ($day[$i]==""){
              $day[$i]= substr($dayd_i, $pos, strpos($dayd_i, "dt=") - $pos-1); //Get day in case it hasnt been calculated earlier
            }        
            $pos = strpos($dayd_i, "dt=") + 3;
            $date[$i]= substr($dayd_i, $pos, strpos($dayd_i, ">") - $pos);   // produce datestring
            $pos2 = strpos($date[$i], " ");
            $len_date= strlen($date[$i]);
            $month[$i] = substr($date[$i], 0, $len_date - $pos2);             // split date string in month and date_of_day
            $month[$i] = str_replace(" ","",$month[$i]);
            $date_of_day[$i] = substr($date[$i], $len_date-$pos2+1);
            $date_of_day[$i] = str_replace(" ","",$date_of_day[$i]);           // so there is a date which can be handled for all $i = 0 to 9: Wednesday: $day[$i] May: $month[$i] 13: $date_of_day[$i]
            $pos = strpos($dayd_i, "<part p=d>");
            if($pos>0){
              $cond_day_long[$i]=substr($dayd_i, $pos, strpos($dayd_i, "</part>"));  
              $pos2= strpos($dayd_i, "</part>");
              $pos=strpos($cond_day_long[$i],"<t>")+3;
              $pos4=strpos($cond_day_long[$i],"</t>");
              $cond_day_long[$i]=substr($cond_day_long[$i], $pos, $pos4-$pos);
              $cond_day_explode=explode(".",$cond_day_long[$i]);            
              $flag=0;
             for ($j=0;$j<count($cond_day_explode);$j++)
              {
                if($flag==4){$flag=5;} 
                $cond_day_explode[$j]=trim($cond_day_explode[$j]);
                if($j == 0)                     //just at the beginning of for next
                {
                  $cond_day_text[$i][0]= $cond_day_explode[$j];
                  for($k=1;$k<=18;$k++){$cond_day_text[$i][$k]= "";}
                  $flag=1;
                }
                if($flag==1){
                  if(substr($cond_day_explode[$j],0,4)=="High" or substr($cond_day_explode[$j],0,4)=="Low " or substr($cond_day_explode[$j],0,6)=="Temps ")
                  {
                    $cond_day_text[$i][5]= $cond_day_explode[$j];
                    $flag=2;
                    $cond_day_text[$i][5]=str_replace("single digits"," 1 ",$cond_day_text[$i][5]);
                    $cond_day_text[$i][5]=str_replace("teens"," 10 ",$cond_day_text[$i][5]);
                    $pos=strpos($cond_day_text[$i][5],"and");
                    $low="";
                    $high="";
                    if($pos>0){
                    $high=substr($cond_day_text[$i][5],0,$pos);
                    $low= substr($cond_day_text[$i][5],$pos+3,strlen($cond_day_text[$i][5])-$pos-3);}
                    else{
                      if(strpos($cond_day_text[$i][5],"Low "))
                        {$low=$cond_day_text[$i][5];}
                      else
                        {$high=$cond_day_text[$i][5];}}                 
                    if($high<>""){
                      preg_match_all("/\d+/", $high, $matches);
                      $sum=0;
                      for($y=0;$y<count($matches[0]);$y++){
                      $sum=$sum+$matches[0][$y];}
                      $sum=$sum/count($matches[0]);
                      if(strpos($high," -")){$sum=$sum*(-1);}
                      if(strpos($high," upper ")){$sum=$sum+8;}
                      if(strpos($high," low ")){$sum=$sum+2;}
                      if(strpos($high," mid ")){$sum=$sum+5;}
                      $cond_day_text[$i][11]= $sum; 
                    }
                   if($low<>""){
                      preg_match_all("/\d+/", $low, $matches);
                      $sum=0;
                      for($y=0;$y<count($matches[0]);$y++){
                      $sum=$sum+$matches[0][$y];}
                      $sum=$sum/count($matches[0]);
                      if(strpos($low," -")){$sum=$sum*(-1);}
                      if(strpos($low," upper ")){$sum=$sum+8;}
                      if(strpos($low," low ")){$sum=$sum+2;}
                      if(strpos($low," mid ")){$sum=$sum+5;}
                      $cond_day_text[$i][10]= $sum; 
                    } 
                    if($cond_day_text[$i][10]==""){$cond_day_text[$i][10]=$cond_day_text[$i][11];}
                    if($cond_day_text[$i][11]==""){$cond_day_text[$i][11]=$cond_day_text[$i][10];}
                  }
                  else
                  {
                   $cond_day_text[$i][$j]= $cond_day_explode[$j];
                  }
                }
                if($flag==2){
                  if(substr($cond_day_explode[$j],0,5)=="Winds")
                  {
                    $cond_day_text[$i][6]= $cond_day_explode[$j];
                    $flag=3;         
                    preg_match_all("/\d+/", $cond_day_text[$i][6], $matches);
                    if(count($matches[0])>=1){$cond_day_text[$i][12]=$matches[0][0];}
                    if(count($matches[0])>=2){$cond_day_text[$i][13]=$matches[0][1];}
                    $pos=strpos($cond_day_text[$i][6]," ",6);
                    $cond_day_text[$i][14]=substr($cond_day_text[$i][6],6,$pos-6);
                    if(substr($cond_day_text[$i][6],0,11)=="Winds light"){$cond_day_text[$i][14]="VAR";}
                  }
                }
                if($flag>=2){
                  if(substr($cond_day_explode[$j],0,6)=="Chance")
                  {
                    $cond_day_text[$i][7]= $cond_day_explode[$j];
                    $flag=4; 
                    $pos=strpos($cond_day_text[$i][7],"preci",0);
                    if($pos>0){$cond_day_text[$i][15]="";}
                    $pos=strpos($cond_day_text[$i][7],"rain",0);
                    if($pos>0){$cond_day_text[$i][15]="Rain";} 
                    $pos=strpos($cond_day_text[$i][7],"snow",0);
                    if($pos>0){$cond_day_text[$i][15]="Snow";} 
                    preg_match_all("/\d+/", $cond_day_text[$i][7], $matches);
                    if(count($matches[0])>=1){$cond_day_text[$i][16]=$matches[0][0];} 
                  } 
                }
                if($flag==5){
                    $flag_2=0;
                    $cond_day_text[$i][8]= $cond_day_explode[$j];
                    $pos=strpos($cond_day_text[$i][8]," one ",0);
                    if($pos>0 and $flag_2==0){$cond_day_text[$i][17]=1;$flag_2=1;}
                    $pos=strpos($cond_day_text[$i][8]," half ",0);
                    if($pos>0 and $flag_2==0){$cond_day_text[$i][17]=0.5;$flag_2=1;}
                    $pos=strpos($cond_day_text[$i][8]," three quarter ",0);
                    if($pos>0 and $flag_2==0){$cond_day_text[$i][17]=0.75;$flag_2=1;}
                    $pos=strpos($cond_day_text[$i][8]," quarter ",0);
                    if($pos>0 and $flag_2==0){$cond_day_text[$i][17]=0.25;$flag_2=1;}
                    if($flag_2==0)
                    {
                      preg_match_all("/\d+/", $cond_day_text[$i][8], $matches);
                      if(count($matches[0])>=1){$cond_day_text[$i][17]=$matches[0][0];}
                      if(count($matches[0])>=2){$cond_day_text[$i][18]=$matches[0][1];}
                    }    
                }
            }  
            }         
          $pos = strpos($dayd_i, "<part p=n>");
          if($pos>0){
            $pos3= strpos($dayd_i, "</part>",$pos2+1);
            $cond_night_long[$i]=substr($dayd_i, $pos, max($pos2,$pos3)-$pos);
            $pos=strpos($cond_night_long[$i],"<t>")+3;
            $pos4=strpos($cond_night_long[$i],"</t>");
            $cond_night_long[$i]=substr($cond_night_long[$i], $pos, $pos4-$pos);
            $cond_night_explode=explode(".",$cond_night_long[$i]);
            $flag=0;
              for ($j=0;$j<count($cond_night_explode);$j++)
              {
                if($flag==4){$flag=5;} 
                $cond_night_explode[$j]=trim($cond_night_explode[$j]);
                if($j == 0)                     //just at the beginning of for next
                {
                  $cond_night_text[$i][0]= $cond_night_explode[$j];
                  for($k=1;$k<=18;$k++){$cond_night_text[$i][$k]= "";}
                  $flag=1;
                }
                if($flag==1){
                  if(substr($cond_night_explode[$j],0,4)=="High" or substr($cond_night_explode[$j],0,4)=="Low " or substr($cond_night_explode[$j],0,6)=="Temps ")
                  {
                    $cond_night_text[$i][5]= $cond_night_explode[$j];
                    $flag=2;
                    $cond_night_text[$i][5]=str_replace("single digits"," 1 ",$cond_night_text[$i][5]);
                    $cond_night_text[$i][5]=str_replace("teens"," 10 ",$cond_night_text[$i][5]);
                    $pos=strpos($cond_night_text[$i][5],"and");
                    $low="";
                    $high="";
                    if($pos>0){
                    $high=substr($cond_night_text[$i][5],0,$pos);
                    $low= substr($cond_night_text[$i][5],$pos+3,strlen($cond_night_text[$i][5])-$pos-3);}
                    else{
                      if(strpos($cond_night_text[$i][5],"Low "))
                        {$low=$cond_night_text[$i][5];}
                      else
                        {$high=$cond_night_text[$i][5];}}                 
                    if($high<>""){
                      preg_match_all("/\d+/", $high, $matches);
                      $sum=0;
                      for($y=0;$y<count($matches[0]);$y++){
                      $sum=$sum+$matches[0][$y];}
                      $sum=$sum/count($matches[0]);
                      if(strpos($high," -")){$sum=$sum*(-1);}
                      if(strpos($high," upper ")){$sum=$sum+8;}
                      if(strpos($high," low ")){$sum=$sum+2;}
                      if(strpos($high," mid ")){$sum=$sum+5;}
                      $cond_night_text[$i][11]= $sum; 
                    }
                   if($low<>""){
                      preg_match_all("/\d+/", $low, $matches);
                      $sum=0;
                      for($y=0;$y<count($matches[0]);$y++){
                      $sum=$sum+$matches[0][$y];}
                      $sum=$sum/count($matches[0]);
                      if(strpos($low," -")){$sum=$sum*(-1);}
                      if(strpos($low," upper ")){$sum=$sum+8;}
                      if(strpos($low," low ")){$sum=$sum+2;}
                      if(strpos($low," mid ")){$sum=$sum+5;}
                      $cond_night_text[$i][10]= $sum; 
                    } 
                    if($cond_night_text[$i][10]==""){$cond_night_text[$i][10]=$cond_night_text[$i][11];}
                    if($cond_night_text[$i][11]==""){$cond_night_text[$i][11]=$cond_night_text[$i][10];}
                  }
                  else
                  {
                   $cond_night_text[$i][$j]= $cond_night_explode[$j];
                  }
                }
                if($flag==2){
                  if(substr($cond_night_explode[$j],0,5)=="Winds")
                  {
                    $cond_night_text[$i][6]= $cond_night_explode[$j];
                    $flag=3;         
                    preg_match_all("/\d+/", $cond_night_text[$i][6], $matches);
                    if(count($matches[0])>=1){$cond_night_text[$i][12]=$matches[0][0];}
                    if(count($matches[0])>=2){$cond_night_text[$i][13]=$matches[0][1];}
                    $pos=strpos($cond_night_text[$i][6]," ",6);
                    $cond_night_text[$i][14]=substr($cond_night_text[$i][6],6,$pos-6);
                    if(substr($cond_night_text[$i][6],0,11)=="Winds light"){$cond_night_text[$i][14]="VAR";}
                  }
                }
                if($flag>=2){
                  if(substr($cond_night_explode[$j],0,6)=="Chance")
                  {
                    $cond_night_text[$i][7]= $cond_night_explode[$j];
                    $flag=4; 
                    $pos=strpos($cond_night_text[$i][7],"preci",0);
                    if($pos>0){$cond_night_text[$i][15]="";}
                    $pos=strpos($cond_night_text[$i][7],"rain",0);
                    if($pos>0){$cond_night_text[$i][15]="Rain";} 
                    $pos=strpos($cond_night_text[$i][7],"snow",0);
                    if($pos>0){$cond_night_text[$i][15]="Snow";} 
                    preg_match_all("/\d+/", $cond_night_text[$i][7], $matches);
                    if(count($matches[0])>=1){$cond_night_text[$i][16]=$matches[0][0];} 
                  } 
                }
                if($flag==5){
                    $flag_2=0;
                    $cond_night_text[$i][8]= $cond_night_explode[$j];
                    $pos=strpos($cond_night_text[$i][8]," one ",0);
                    if($pos>0 and $flag_2==0){$cond_night_text[$i][17]=1;$flag_2=1;}
                    $pos=strpos($cond_night_text[$i][8]," half ",0);
                    if($pos>0 and $flag_2==0){$cond_night_text[$i][17]=0.5;$flag_2=1;}
                    $pos=strpos($cond_night_text[$i][8]," three quarter ",0);
                    if($pos>0 and $flag_2==0){$cond_night_text[$i][17]=0.75;$flag_2=1;}
                    $pos=strpos($cond_night_text[$i][8]," two ",0);
                    if($pos>0 and $flag_2==0){$cond_night_text[$i][17]=2;$flag_2=1;}
                    $pos=strpos($cond_night_text[$i][8]," three ",0);
                    if($pos>0 and $flag_2==0){$cond_night_text[$i][17]=3;$flag_2=1;}
                    $pos=strpos($cond_night_text[$i][8]," quarter ",0);
                    if($pos>0 and $flag_2==0){$cond_night_text[$i][17]=0.25;$flag_2=1;}
                    if($flag_2==0)
                    {
                      preg_match_all("/\d+/", $cond_night_text[$i][8], $matches);
                      if(count($matches[0])>=1){$cond_night_text[$i][17]=$matches[0][0];}
                      if(count($matches[0])>=2){$cond_night_text[$i][18]=$matches[0][1];}
                    }    
                }
            }
        } 
        }
        }             
    if ($opt_language == "de")  //Translate text for actual weatherconditions to german - text for mouseover on actual main icon
    {
           $day[0]="Heute";
           $day_old=GG_funx_translate_array($day[1],$opt_language); 
           $day[1]="Morgen";
           for($j=2;$j<=9;$j++){$day[$j]=GG_funx_translate_array($day[$j],$opt_language);}        
           if ($flag_cc!= "N/A"){
           $feels_lang="Gef&uuml;hlt";
           }
           else
           {
           $feels_lang="Leider keine aktuellen Wetterdaten verf&uuml;gbar!";
           }                 
           for($j=0; $j<=3;$j++){
            $strto_translate_transfer = GG_funx_translate_text_0_prepare_string(trim(strtolower($cond_day_text[$j][0])));        
            list($stris_translated,$flag_translated) = GG_funx_translate_text_1_translate($strto_translate_transfer);
            if($flag_translated==0 or $stris_translated==""){
                $term_out="";
                $term_array = explode(" ",$cond_day[$j]);
                for ($i=0; $i<count($term_array);$i++){
                  $cond_day_lang[$j]=$cond_day_lang[$j]." ".GG_funx_translate_array($term_array[$i],$opt_language);                 
                }
            }
            else
            {
              $cond_day_lang[$j]=$stris_translated;
              for($k=1;$k<=4;$k++)
              {
                if($cond_day_text[$j][$k]!=""){
                  $strto_translate_transfer = GG_funx_translate_text_0_prepare_string(trim(strtolower($cond_day_text[$j][$k])));        
                  list($stris_translated,$flag_translated) = GG_funx_translate_text_1_translate($strto_translate_transfer);
                  if($flag_translated=1){
                    $cond_day_lang[$j]=$cond_day_lang[$j]." -".$stris_translated;}}
              }  
            }
           $cond_day_lang[$j]=$cond_day_lang[$j]." - Niederschlag: ".$ppcp_day[$j]; 
           if($cond_day_text[$j][17]!="")
           {  if($cond_day_text[$j][18]=="")
              {  $cond_day_lang[$j]=$cond_day_lang[$j]." (ca. ".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_day_lang[$j]=$cond_day_lang[$j]." (ca. ".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." bis ".GG_funx_translate_inch($cond_day_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }           
           }          
           for($j=0; $j<=3;$j++){
            $strto_translate_transfer = GG_funx_translate_text_0_prepare_string(trim(strtolower($cond_night_text[$j][0])));      
            list($stris_translated,$flag_translated) = GG_funx_translate_text_1_translate($strto_translate_transfer); 
            if($flag_translated==0 or $stris_translated==""){
                $term_out="";
                $term_array = explode(" ",$cond_night[$j]);
                for ($i=0; $i<count($term_array);$i++){
                  $cond_night_lang[$j]=$cond_night_lang[$j]." ".GG_funx_translate_array($term_array[$i],$opt_language);                 
                }
            }
            else
            {
              $cond_night_lang[$j]=$stris_translated;
              for($k=1;$k<=4;$k++)
              {
                if($cond_night_text[$j][$k]!=""){
                  $strto_translate_transfer = GG_funx_translate_text_0_prepare_string(trim(strtolower($cond_night_text[$j][$k])));        
                  list($stris_translated,$flag_translated) = GG_funx_translate_text_1_translate($strto_translate_transfer);
                  if($flag_translated=1){
                    $cond_night_lang[$j]=$cond_night_lang[$j]." - ".$stris_translated;}}
              }
            }  
           $cond_night_lang[$j]=$cond_night_lang[$j]."  - Niederschlag: ".$ppcp_night[$j];
           if($cond_night_text[$j][17]!="")
           {  if($cond_night_text[$j][18]=="")
              {  $cond_night_lang[$j]=$cond_night_lang[$j]." (ca. ".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_night_lang[$j]=$cond_night_lang[$j]." (ca. ".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." bis ".GG_funx_translate_inch($cond_night_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }                
           }          
          for ($i=0;$i<=3;$i++){
            if(strlen($wind_directions_day[$i])==1){$wind_directions_day[$i]=$wind_directions_day[$i]."X";} 
            if(strlen($wind_directions_day[$i])==2){$wind_directions_day[$i]=$wind_directions_day[$i]."X";}
            if(strlen($wind_directions_night[$i])==1){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
            if(strlen($wind_directions_night[$i])==2){$wind_directions_night[$i]=$wind_directions_night[$i]."X";}  
            $term_out=GG_funx_translate_windspeed($wind_speed_day[$i],$unit_speed,$opt_language);
            if ($term_out!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." - ".$term_out." aus ".GG_funx_translate_winddirections($wind_directions_day[$i],$opt_language);}
            $term_out=GG_funx_translate_windspeed($wind_speed_night[$i],$unit_speed,$opt_language);
            if ($term_out!=""){$cond_night_lang[$i]=$cond_night_lang[$i]." - ".$term_out." aus ".GG_funx_translate_winddirections($wind_directions_night[$i],$opt_language);} 
          }          
          for ($i=0;$i<=3;$i++){
            $cond_day_lang[$i]="Tags&uuml;ber:".$cond_day_lang[$i]; 
            $cond_night_lang[$i]="Nachts:".$cond_night_lang[$i];
          }             
          $icon_string_lang="Aktuell - ";  
          $pressure_lang=GG_funx_translate_pressure($pressure,$unit_pressure,$opt_language);          
          $pressure = $pressure.$unit_pressure;
          if ($pressure_lang!=""){$icon_string_lang=$icon_string_lang.$pressure_lang."d";}
          else
          { $icon_string_lang=$icon_string_lang."D";}
          $icon_string_lang=$icon_string_lang."ruck: ".$pressure;
          if ($pressuretendence!="steady" and $pressuretendence!="N/A"){$icon_string_lang=$icon_string_lang." (".GG_funx_translate_array($pressuretendence,$opt_language).")";}
          if (GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language)!="") {$fill_in=" (";$fill_out=")";}
          if ($windspeed!="CALM" and $windspeed!="calm")
            {
            $icon_string_lang=$icon_string_lang." - Wind: ".$windspeed.$unit_speed.$fill_in.GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language).$fill_out." aus ".GG_funx_translate_winddirections($winddirections_description,$opt_language);
            }
          else
            {
            $icon_string_lang=$icon_string_lang." - Wind: windstill";
            }
          $icon_string_lang=$icon_string_lang." - Feuchte: ".$humidity;
          $icon_string_lang=$icon_string_lang." - UV-Belastung: ".$uv_index." (".GG_funx_translate_uvindex($uv_index,$opt_language_index).") - ";          
          $sunmoon_string_lang="Sonnenaufgang um ".$sunrise." Uhr";
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "night"){$sunmoon_string_lang=$sunmoon_string_lang." (in ".$night_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Sonnenuntergang um ".$sunset." Uhr"; 
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "day"){$sunmoon_string_lang=$sunmoon_string_lang." (in ".$daylight_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Tagl&auml;nge: ".$daylight_time."h - Mondphase: ".GG_funx_translate_moonphase_lang($moonphase,$opt_language_index);
          $wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index);          
          $j=1;   //create extended forecast
          if($opt_layout=="large" ){$j=4;}
          for($i=$j;$i<count($day);$i++)
          {
          $cond_day_lang[$i]=$day[$i].", ".$date_of_day[$i].". : ";
          if($cond_day_text[$i][0]!="")
           {  $strto_translate_transfer = GG_funx_translate_text_0_prepare_string(trim(strtolower($cond_day_text[$i][0])));        
              list($stris_translated,$flag_translate) = GG_funx_translate_text_1_translate($strto_translate_transfer);
              if($flag_translate=0 or $stris_translated==""){
                $term_out="";
                if($i<=3){
                  $term_array = explode(" ",$cond_day[$i]);
                  for ($i=0; $i<count($term_array);$i++){$cond_day_lang[$i]=$cond_day_lang[$i]." ".GG_funx_translate_array($term_array[$i],$opt_language);}
                  }
                else{$cond_day_lang[$i]=$cond_day_lang[$i]."Keine Daten f&uuml;r diesen Tag!";}
            }
            else
            {
              $cond_day_lang[$i]=$cond_day_lang[$i].$stris_translated;
              for($k=1;$k<=4;$k++)
              {
                if($cond_day_text[$i][$k]!=""){
                  $strto_translate_transfer = GG_funx_translate_text_0_prepare_string(trim(strtolower($cond_day_text[$i][$k])));        
                  list($stris_translated,$flag_translate) = GG_funx_translate_text_1_translate($strto_translate_transfer);
                  if($flag_translate=1){
                    $cond_day_lang[$i]=$cond_day_lang[$i]." - ".$stris_translated;}}
              }  
            }
           }
           else
          {$cond_day_lang[$i]="Keine Daten f&uuml;r diesen Tag!";}
          if($cond_day_text[$i][11]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".GG_funx_translate_fahrenheit($cond_day_text[$i][11],$opt_unit);}
          if($cond_day_text[$i][10]!="" and $cond_day_text[$i][10]<>$cond_day_text[$i][11]){$cond_day_lang[$i]=$cond_day_lang[$i]."/".GG_funx_translate_fahrenheit($cond_day_text[$i][10],$opt_unit)." ";}
          if($cond_day_text[$i][12]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Wind: ".GG_funx_translate_windspeed(1/2*($cond_day_text[$i][12]+$cond_day_text[$i][13]),"mph",$opt_language)." aus ".$cond_day_text[$i][14];}
          if($cond_day_text[$i][15]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Wahrscheinlichkeit f&uuml;r ".GG_funx_translate_array($cond_day_text[$i][15],$opt_language).": ".$cond_day_text[$i][16]."%";}
          }
      for($i=1;$i<9;$i++){$day_ext[$i]="";}
      for($i=4;$i<count($day);$i++){$day_ext[$i]=substr($day[$i],0,3);}
      $day_ext[1]=substr($day_old,0,3);
      $day_ext[2]=substr($day[2],0,3);
      $day_ext[3]=substr($day[3],0,3);
      $extended_forecast="Aussichten:";          
    }      //end translation to german
    if ($opt_language == "fr")     //Translate text for actual weatherconditions to French - text for mouseover on actual main icon
    {
           $day[0]="Aujourd'hui";
           $day_old=GG_funx_translate_array($day[1],$opt_language); 
           $day[1]="Demain";
           for($j=2;$j<=9;$j++){$day[$j]=GG_funx_translate_array($day[$j],$opt_language);}         
           if ($flag_cc!= "N/A"){
            $feels_lang="T.Ressentie";
           }
           else
           {
            $feels_lang="D&Eacute;sol&Eacute;, donn&Eacute;es m&Eacute;t&Eacute;orologiques non disponibles";
           } 
           $term_out_flag_4='';         
           for($j=0; $j<=3;$j++){ 
            $term_out="";
            $term_array = explode(" ",$cond_day[$j]);
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              } 
              if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              } 
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }   
            }
            for ($i=0; $i<count($term_array);$i++){
            $cond_day_lang[$j]=$cond_day_lang[$j]." ".$term_out[$i];
           }
           $cond_day_lang[$j]=$cond_day_lang[$j]." - Pr&eacute;cipitation: ".$ppcp_day[$j];
           if($cond_day_text[$j][17]!="")
           {  if($cond_day_text[$j][18]=="")
              {  $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_day_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
           $cond_day_lang[$j]=str_replace("xx>","",$cond_day_lang[$j]);
           $cond_day_lang[$j]=str_replace("xxf","",$cond_day_lang[$j]); 
           } 
           $term_out_flag_4='';         
           for($j=0; $j<=3;$j++){
           $term_out="";
           $term_out_flag_1=""; 
            $term_array = explode(" ",$cond_night[$j]);
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              } 
              if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              } 
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }    
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_night_lang[$j]=$cond_night_lang[$j]." ".$term_out[$i];
           }
           $cond_night_lang[$j]=$cond_night_lang[$j]."  - Pr&eacute;cipitation: ".$ppcp_night[$j];
           if($cond_night_text[$j][17]!="")
           {  if($cond_night_text[$j][18]=="")
              {  $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_night_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
           $cond_night_lang[$j]=str_replace("xx>","",$cond_night_lang[$j]);
           $cond_night_lang[$j]=str_replace("xxf","",$cond_night_lang[$j]);                 
           }          
          for ($i=0;$i<=3;$i++){ 
          if(strlen($wind_directions_day[$i])==1){$wind_directions_day[$i]=$wind_directions_day[$i]."X";} 
          if(strlen($wind_directions_day[$i])==2){$wind_directions_day[$i]=$wind_directions_day[$i]."X";}
          if(strlen($wind_directions_night[$i])==1){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          if(strlen($wind_directions_night[$i])==2){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          $term_out=GG_funx_translate_windspeed($wind_speed_day[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." - ".$term_out." du ".GG_funx_translate_winddirections($wind_directions_day[$i],$opt_language);}
          $term_out=GG_funx_translate_windspeed($wind_speed_night[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_night_lang[$i]=$cond_night_lang[$i]." - ".$term_out." du ".GG_funx_translate_winddirections($wind_directions_night[$i],$opt_language);} 
          } 
          for ($i=0;$i<=3;$i++){
          $cond_day_lang[$i]="Le jour: ".$cond_day_lang[$i]; 
          $cond_night_lang[$i]="Le nuit: ".$cond_night_lang[$i];
          }             
          $icon_string_lang="Actuelle - ";  
          $pressure_lang=GG_funx_translate_pressure($pressure,$unit_pressure,$opt_language);          
          $pressure = $pressure.$unit_pressure;
          if ($pressure_lang!=""){$icon_string_lang=$icon_string_lang.$pressure_lang."p";}
          else
          { $icon_string_lang=$icon_string_lang."P";}
          $icon_string_lang=$icon_string_lang."ression: ".$pressure;
          if ($pressuretendence!="steady" and $pressuretendence!="N/A"){$icon_string_lang=$icon_string_lang." (".GG_funx_translate_array($pressuretendence,$opt_language).")";}
          if (GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language)!="") {$fill_in=" (";$fill_out=")";}
          if ($windspeed!="CALM" and $windspeed!="calm")
            {
            $icon_string_lang=$icon_string_lang." - Vent: ".$windspeed.$unit_speed.$fill_in.GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language).$fill_out." du ".GG_funx_translate_winddirections($winddirections_description,$opt_language);
            }
          else
            {
            $icon_string_lang=$icon_string_lang." - Vent: Calme";
            }
          $icon_string_lang=$icon_string_lang." - Humidit&eacute;: ".$humidity;
          $icon_string_lang=$icon_string_lang." - UV-Index: ".$uv_index." (".GG_funx_translate_uvindex($uv_index,$opt_language_index).") - ";          
          $sunmoon_string_lang="Lever du soleil &agrave; ".$sunrise." h ";
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "night"){$sunmoon_string_lang=$sunmoon_string_lang." (en ".$night_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Coucher du soleil ".$sunset." h "; 
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "day"){$sunmoon_string_lang=$sunmoon_string_lang." (en ".$daylight_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Dur&eacute;e du jour : ".$daylight_time."h - Phase de la lune: ".GG_funx_translate_moonphase_lang($moonphase,$opt_language_index);
          $wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index);         
          $j=1;             //create extended forecast
          if($opt_layout=="large" ){$j=4;}
          for($i=$j;$i<count($day);$i++)
          {
          $cond_day_lang[$i]=$day[$i].", ".$date_of_day[$i].". : ";
          if($cond_day_text[$i][0]!="")
           {  $cond_day_lang[$i]=$cond_day_lang[$i].$cond_day_text[$i][0];
              if($cond_day_text[$i][1]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][1];}
              if($cond_day_text[$i][2]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][2];}
              if($cond_day_text[$i][3]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][3];}
              if($cond_day_text[$i][4]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][4];}
           }
           else
          {$cond_day_lang[$i]="Pas de donnees pour le jour!";}
          if($cond_day_text[$i][11]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".GG_funx_translate_fahrenheit($cond_day_text[$i][11],$opt_unit);}
          if($cond_day_text[$i][10]!="" and $cond_day_text[$i][10]<>$cond_day_text[$i][11]){$cond_day_lang[$i]=$cond_day_lang[$i]."/".GG_funx_translate_fahrenheit($cond_day_text[$i][10],$opt_unit)." ";}
          if($cond_day_text[$i][12]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Vent: ".GG_funx_translate_windspeed(1/2*($cond_day_text[$i][12]+$cond_day_text[$i][13]),"mph",$opt_language)." from ".$cond_day_text[$i][14];}
          if($cond_day_text[$i][15]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Probabilite  pour ".GG_funx_translate_array($cond_day_text[$i][15],$opt_language).": ".$cond_day_text[$i][16]."%";}
          }
       for($i=1;$i<9;$i++){$day_ext[$i]="";}
      for($i=4;$i<count($day);$i++){$day_ext[$i]=substr($day[$i],0,3);}
      $day_ext[1]=substr($day_old,0,3);
      $day_ext[2]=substr($day[2],0,3);
      $day_ext[3]=substr($day[3],0,3);
      $extended_forecast="Perspectives:";
    }      //end translation to french
    if ($opt_language == "es")
    {
           $day[0]="Hoy";
           $day_old=GG_funx_translate_array($day[1],$opt_language);  
           $day[1]="Ma&ntilde;ana";
           for($j=2;$j<=9;$j++){$day[$j]=GG_funx_translate_array($day[$j],$opt_language);}        
           if ($flag_cc!= "N/A"){
            $feels_lang="T.de sensaci&oacute;n";
           }
           else
           {
            $feels_lang="Perd&oacute;n! Datos del tiempo no disponibles!";
           }          
           for($j=0; $j<=3;$j++){ 
            $term_out="";
            $term_array = explode(" ",$cond_day[$j]);
            $term_out_flag_4=''; 
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              }
               if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              } 
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }     
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_day_lang[$j]=$cond_day_lang[$j]." ".$term_out[$i];
           }
           $cond_day_lang[$j]=$cond_day_lang[$j]." - Precipitaci&oacute;n: ".$ppcp_day[$j];
           if($cond_day_text[$j][17]!="")
           {  if($cond_day_text[$j][18]=="")
              {  $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_day_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
           $cond_day_lang[$j]=str_replace("xx>","",$cond_day_lang[$j]);
           $cond_day_lang[$j]=str_replace("xxf","",$cond_day_lang[$j]); 
           }          
           $term_out_flag_4=''; 
           for($j=0; $j<=3;$j++){
           $term_out="";
           $term_out_flag_1=""; 
            $term_array = explode(" ",$cond_night[$j]);
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              } 
               if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              }
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }     
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_night_lang[$j]=$cond_night_lang[$j]." ".$term_out[$i];
           }
          $cond_night_lang[$j]=$cond_night_lang[$j]."  - Precipitaci&oacute;n: ".$ppcp_night[$j];
          if($cond_night_text[$j][17]!="")
           {  if($cond_night_text[$j][18]=="")
              {  $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_night_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
          $cond_night_lang[$j]=str_replace("xx>","",$cond_night_lang[$j]);
          $cond_night_lang[$j]=str_replace("xxf","",$cond_night_lang[$j]);                 
           } 
          for ($i=0;$i<=3;$i++){ 
          if(strlen($wind_directions_day[$i])==1){$wind_directions_day[$i]=$wind_directions_day[$i]."X";} 
          if(strlen($wind_directions_day[$i])==2){$wind_directions_day[$i]=$wind_directions_day[$i]."X";}
          if(strlen($wind_directions_night[$i])==1){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          if(strlen($wind_directions_night[$i])==2){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          $term_out=GG_funx_translate_windspeed($wind_speed_day[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." - ".$term_out." de ".GG_funx_translate_winddirections($wind_directions_day[$i],$opt_language);}
          $term_out=GG_funx_translate_windspeed($wind_speed_night[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_night_lang[$i]=$cond_night_lang[$i]." - ".$term_out." de ".GG_funx_translate_winddirections($wind_directions_night[$i],$opt_language);} 
          }   
          for ($i=0;$i<=3;$i++){
          $cond_day_lang[$i]="De dia: ".$cond_day_lang[$i]; 
          $cond_night_lang[$i]="De la noche: ".$cond_night_lang[$i];
          }             
          $icon_string_lang="Actualmente - ";  
          $pressure_lang=GG_funx_translate_pressure($pressure,$unit_pressure,$opt_language);          
          $pressure = $pressure.$unit_pressure;
          if ($pressure_lang!=""){$icon_string_lang=$icon_string_lang.$pressure_lang."p";}
          else
          { $icon_string_lang=$icon_string_lang."P";}
          $icon_string_lang=$icon_string_lang."resi&oacute;n: ".$pressure;
          if ($pressuretendence!="steady" and $pressuretendence!="N/A"){$icon_string_lang=$icon_string_lang." (".GG_funx_translate_array($pressuretendence,$opt_language).")";}
          if (GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language)!="") {$fill_in=" (";$fill_out=")";}
          if ($windspeed!="CALM" and $windspeed!="calm")
            {
            $icon_string_lang=$icon_string_lang." - Viento: ".$windspeed.$unit_speed.$fill_in.GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language).$fill_out." del ".GG_funx_translate_winddirections($winddirections_description,$opt_language);
            }
          else
            {
            $icon_string_lang=$icon_string_lang." - Viento: Calma";
            }
          $icon_string_lang=$icon_string_lang." - Humedad: ".$humidity;
          $icon_string_lang=$icon_string_lang." - UV-Indices: ".$uv_index." (".GG_funx_translate_uvindex($uv_index,$opt_language_index).") - ";          
          $sunmoon_string_lang="Amanecer: ".$sunrise." h ";
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "night"){$sunmoon_string_lang=$sunmoon_string_lang." (en ".$night_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Ocaso ".$sunset." h "; 
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "day"){$sunmoon_string_lang=$sunmoon_string_lang." (en ".$daylight_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Duraci&oacute;n del dia : ".$daylight_time."h - Fase Lunar: ".GG_funx_translate_moonphase_lang($moonphase,$opt_language_index);
          $wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index);
          $j=1;           //create extended forecast
          if($opt_layout=="large" ){$j=4;}
          for($i=$j;$i<count($day);$i++)
          {
          $cond_day_lang[$i]=$day[$i].", ".$date_of_day[$i].". : ";
          if($cond_day_text[$i][0]!="")
           {  $cond_day_lang[$i]=$cond_day_lang[$i].$cond_day_text[$i][0];
              if($cond_day_text[$i][1]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][1];}
              if($cond_day_text[$i][2]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][2];}
              if($cond_day_text[$i][3]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][3];}
              if($cond_day_text[$i][4]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][4];}
           }
           else
          {$cond_day_lang[$i]="Perdon! Datos del tiempo no disponibles!";}
          if($cond_day_text[$i][11]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".GG_funx_translate_fahrenheit($cond_day_text[$i][11],$opt_unit);}
          if($cond_day_text[$i][10]!="" and $cond_day_text[$i][10]<>$cond_day_text[$i][11]){$cond_day_lang[$i]=$cond_day_lang[$i]."/".GG_funx_translate_fahrenheit($cond_day_text[$i][10],$opt_unit)." ";}
          if($cond_day_text[$i][12]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Viento: ".GG_funx_translate_windspeed(1/2*($cond_day_text[$i][12]+$cond_day_text[$i][13]),"mph",$opt_language)." from ".$cond_day_text[$i][14];}
          if($cond_day_text[$i][15]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Probabilidad de ".GG_funx_translate_array($cond_day_text[$i][15],$opt_language).": ".$cond_day_text[$i][16]."%";}
          }
      for($i=1;$i<9;$i++){$day_ext[$i]="";}
      for($i=4;$i<count($day);$i++){
        $n=3;
        if(substr($day[$i],1,1)=="&"){$n=7;}
        $day_ext[$i]=substr($day[$i],0,$n);}
      $day_ext[1]=substr($day_old,0,3);
      $day_ext[2]=substr($day[2],0,3);
      $day_ext[3]=substr($day[3],0,3);
      $extended_forecast="Perspectivas:";
    }      //end translation to spanish
     if ($opt_language == "hu")
    {
           $day[0]="Ma";
           $day_old=GG_funx_translate_array($day[1],$opt_language); 
           $day[1]="Holnap";
           for($j=2;$j<=9;$j++){$day[$j]=GG_funx_translate_array($day[$j],$opt_language);}        
           if ($flag_cc!= "nincs adat"){
            $feels_lang="&Eacute;rezhet&ocirc;";
           }
           else
           {
            $feels_lang="Eln&eacute;z&eacute;st! Nincs el&eacute;rhet&ocirc; aktu&aacute;lis id&ocirc;j&aacute;r&aacute;s!";
           }          
           for($j=0; $j<=3;$j++){ 
            $term_out="";
            $term_array = explode(" ",$cond_day[$j]);
            $term_out_flag_4=''; 
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];                                       
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              }
               if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              } 
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }     
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_day_lang[$j]=$cond_day_lang[$j]." ".$term_out[$i];
           }
           $cond_day_lang[$j]=$cond_day_lang[$j]." - Csapad&eacute;k: ".$ppcp_day[$j]; 
           if($cond_day_text[$j][17]!="")
           {  if($cond_day_text[$j][18]=="")
              {  $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_day_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
           $cond_day_lang[$j]=str_replace("xx>","",$cond_day_lang[$j]);
           $cond_day_lang[$j]=str_replace("xxf","",$cond_day_lang[$j]);
           }          
           $term_out_flag_4=''; 
           for($j=0; $j<=3;$j++){
           $term_out="";
           $term_out_flag_1=""; 
            $term_array = explode(" ",$cond_night[$j]);
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              } 
               if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              }
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }     
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_night_lang[$j]=$cond_night_lang[$j]." ".$term_out[$i];
           }
          
            $cond_night_lang[$j]=$cond_night_lang[$j]."  - Csapad&eacute;k ".$ppcp_night[$j];
            if($cond_night_text[$j][17]!="")
           {  if($cond_night_text[$j][18]=="")
              {  $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_night_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
          $cond_night_lang[$j]=str_replace("xx>","",$cond_night_lang[$j]);
           $cond_night_lang[$j]=str_replace("xxf","",$cond_night_lang[$j]);                 
           }          
          for ($i=0;$i<=3;$i++){ 
          if(strlen($wind_directions_day[$i])==1){$wind_directions_day[$i]=$wind_directions_day[$i]."X";} 
          if(strlen($wind_directions_day[$i])==2){$wind_directions_day[$i]=$wind_directions_day[$i]."X";}
          if(strlen($wind_directions_night[$i])==1){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          if(strlen($wind_directions_night[$i])==2){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          $term_out=GG_funx_translate_windspeed($wind_speed_day[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." - ".$term_out." b&oacute;l ".GG_funx_translate_winddirections($wind_directions_day[$i],$opt_language);}
          $term_out=GG_funx_translate_windspeed($wind_speed_night[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_night_lang[$i]=$cond_night_lang[$i]." - ".$term_out." b&oacute;l ".GG_funx_translate_winddirections($wind_directions_night[$i],$opt_language);} 
          }          
          for ($i=0;$i<=3;$i++){
          $cond_day_lang[$i]="Nappal: ".$cond_day_lang[$i]; 
          $cond_night_lang[$i]="&Eacute;jszaka: ".$cond_night_lang[$i];
          }             
          $icon_string_lang="Mostani k&ouml;r&uuml;lm&eacute;nyek - ";  
          $pressure_lang=GG_funx_translate_pressure($pressure,$unit_pressure,$opt_language);          
          $pressure = $pressure.$unit_pressure;
          if ($pressure_lang!=""){$icon_string_lang=$icon_string_lang.$pressure_lang."n";}
          else
          { $icon_string_lang=$icon_string_lang."N";}
          $icon_string_lang=$icon_string_lang."yom&aacute;s: ".$pressure;
          if ($pressuretendence!="steady" and $pressuretendence!="N/A"){$icon_string_lang=$icon_string_lang." (".GG_funx_translate_array($pressuretendence,$opt_language).")";}
          if (GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language)!="") {$fill_in=" (";$fill_out=")";}
          if ($windspeed!="CALM" and $windspeed!="calm")
            {
            $icon_string_lang=$icon_string_lang." - Sz&eacute;l: ".$windspeed.$unit_speed.$fill_in.GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language).$fill_out." b&ouml;l ".GG_funx_translate_winddirections($winddirections_description,$opt_language);
            }
          else
            {
            $icon_string_lang=$icon_string_lang." - Sz&eacute;l: nyugodt";
            }
          $icon_string_lang=$icon_string_lang." - P&aacute;ratartalom: ".$humidity;
          $icon_string_lang=$icon_string_lang." - UV-index: ".$uv_index." (".GG_funx_translate_uvindex($uv_index,$opt_language_index).") - ";          
          $sunmoon_string_lang="Napkelte: ".$sunrise." h ";
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "night"){$sunmoon_string_lang=$sunmoon_string_lang." (este ".$night_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Napnyugta: ".$sunset." h "; 
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "day"){$sunmoon_string_lang=$sunmoon_string_lang." (este ".$daylight_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Nap hossz&uacute;s&aacute;ga: ".$daylight_time."h - Hold f&aacute;zis: ".GG_funx_translate_moonphase_lang($moonphase,$opt_language_index);
          $wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index);
          $j=1;
          if($opt_layout=="large" ){$j=4;}
          for($i=$j;$i<count($day);$i++)
          {
          $cond_day_lang[$i]=$day[$i].", ".$date_of_day[$i].". : ";
          if($cond_day_text[$i][0]!="")
           {  $cond_day_lang[$i]=$cond_day_lang[$i].$cond_day_text[$i][0];
              if($cond_day_text[$i][1]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][1];}
              if($cond_day_text[$i][2]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][2];}
              if($cond_day_text[$i][3]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][3];}
              if($cond_day_text[$i][4]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][4];}
           }
           else
          {$cond_day_lang[$i]="Eln&eacute;z&eacute;st! Nincs el&eacute;rhet&ocirc; aktu&aacute;lis id&ocirc;j&aacute;r&aacute;s!";}
          if($cond_day_text[$i][11]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".GG_funx_translate_fahrenheit($cond_day_text[$i][11],$opt_unit);}
          if($cond_day_text[$i][10]!="" and $cond_day_text[$i][10]<>$cond_day_text[$i][11]){$cond_day_lang[$i]=$cond_day_lang[$i]."/".GG_funx_translate_fahrenheit($cond_day_text[$i][10],$opt_unit)." ";}
          if($cond_day_text[$i][12]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Sz&eacute;l: ".GG_funx_translate_windspeed(1/2*($cond_day_text[$i][12]+$cond_day_text[$i][13]),"mph",$opt_language)." b�l ".$cond_day_text[$i][14];}
          if($cond_day_text[$i][15]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Val&oacute;sz&iacute;n&ucirc;s&eacute;ge ".GG_funx_translate_array($cond_day_text[$i][15],$opt_language).": ".$cond_day_text[$i][16]."%";}
          }
      for($i=1;$i<9;$i++){$day_ext[$i]="";}
      for($i=4;$i<count($day);$i++){$day_ext[$i]=substr($day[$i],0,3);}
      $day_ext[1]=substr($day_old,0,3);
      $day_ext[2]=substr($day[2],0,3);
      $day_ext[3]=substr($day[3],0,3);
      $extended_forecast="El&ocirc;rejelz&eacute;s:";
    }      //end translation to hungarian
     if ($opt_language == "it")
    {
           $day[0]="Oggi";
           $day_old=GG_funx_translate_array($day[1],$opt_language); 
           $day[1]="Domani";
           for($j=2;$j<=9;$j++){$day[$j]=GG_funx_translate_array($day[$j],$opt_language);}        
           if ($flag_cc!= "N/A"){
            $feels_lang="T.percepita";
           }
           else
           {
            $feels_lang="Spiacenti, no dati disponible!";
           }          
           for($j=0; $j<=3;$j++){ 
            $term_out="";
            $term_array = explode(" ",$cond_day[$j]);
            $term_out_flag_4=''; 
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];                                       
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              }
               if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              } 
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }     
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_day_lang[$j]=$cond_day_lang[$j]." ".$term_out[$i];
           }
           $cond_day_lang[$j]=$cond_day_lang[$j]." - Precipitatione: ".$ppcp_day[$j]; 
           if($cond_day_text[$j][17]!="")
           {  if($cond_day_text[$j][18]=="")
              {  $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_day_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
           $cond_day_lang[$j]=str_replace("xx>","",$cond_day_lang[$j]);
           $cond_day_lang[$j]=str_replace("xxf","",$cond_day_lang[$j]);
           }          
           $term_out_flag_4=''; 
           for($j=0; $j<=3;$j++){
           $term_out="";
           $term_out_flag_1=""; 
            $term_array = explode(" ",$cond_night[$j]);
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              } 
               if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              }
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }     
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_night_lang[$j]=$cond_night_lang[$j]." ".$term_out[$i];
           }
          
            $cond_night_lang[$j]=$cond_night_lang[$j]."  - Precipitatione: ".$ppcp_night[$j];
            if($cond_night_text[$j][17]!="")
           {  if($cond_night_text[$j][18]=="")
              {  $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_night_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
          $cond_night_lang[$j]=str_replace("xx>","",$cond_night_lang[$j]);
           $cond_night_lang[$j]=str_replace("xxf","",$cond_night_lang[$j]);                 
           }          
          for ($i=0;$i<=3;$i++){ 
          if(strlen($wind_directions_day[$i])==1){$wind_directions_day[$i]=$wind_directions_day[$i]."X";} 
          if(strlen($wind_directions_day[$i])==2){$wind_directions_day[$i]=$wind_directions_day[$i]."X";}
          if(strlen($wind_directions_night[$i])==1){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          if(strlen($wind_directions_night[$i])==2){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          $term_out=GG_funx_translate_windspeed($wind_speed_day[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." - ".$term_out." da ".GG_funx_translate_winddirections($wind_directions_day[$i],$opt_language);}
          $term_out=GG_funx_translate_windspeed($wind_speed_night[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_night_lang[$i]=$cond_night_lang[$i]." - ".$term_out." da ".GG_funx_translate_winddirections($wind_directions_night[$i],$opt_language);} 
          }          
          for ($i=0;$i<=3;$i++){
          $cond_day_lang[$i]="Durante il giorno: ".$cond_day_lang[$i]; 
          $cond_night_lang[$i]="Di notte: ".$cond_night_lang[$i];
          }             
          $icon_string_lang="Attuale - ";  
          $pressure_lang=GG_funx_translate_pressure($pressure,$unit_pressure,$opt_language);          
          $pressure = $pressure.$unit_pressure;
          if ($pressure_lang!=""){$icon_string_lang=$icon_string_lang.$pressure_lang."p";}
          else
          { $icon_string_lang=$icon_string_lang."P";}
          $icon_string_lang=$icon_string_lang."ressione: ".$pressure;
          if ($pressuretendence!="steady" and $pressuretendence!="N/A"){$icon_string_lang=$icon_string_lang." (".GG_funx_translate_array($pressuretendence,$opt_language).")";}
          if (GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language)!="") {$fill_in=" (";$fill_out=")";}
          if ($windspeed!="CALM" and $windspeed!="calm")
            {
            $icon_string_lang=$icon_string_lang." - Vento: ".$windspeed.$unit_speed.$fill_in.GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language).$fill_out." del ".GG_funx_translate_winddirections($winddirections_description,$opt_language);
            }
          else
            {
            $icon_string_lang=$icon_string_lang." - Vento: Senza vento";
            }
          $icon_string_lang=$icon_string_lang." - Umidit&aacute;: ".$humidity;
          $icon_string_lang=$icon_string_lang." - Indize UV: ".$uv_index." (".GG_funx_translate_uvindex($uv_index,$opt_language_index).") - ";          
          $sunmoon_string_lang="Alba: ".$sunrise." h ";
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "night"){$sunmoon_string_lang=$sunmoon_string_lang." (en ".$night_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Tramonto:".$sunset." h "; 
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "day"){$sunmoon_string_lang=$sunmoon_string_lang." (en ".$daylight_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Durata del giorno : ".$daylight_time."h - Fase Lunar: ".GG_funx_translate_moonphase_lang($moonphase,$opt_language_index);
          $wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index);
          $j=1;
          if($opt_layout=="large" ){$j=4;}
          for($i=$j;$i<count($day);$i++)
          {
          $cond_day_lang[$i]=$day[$i].", ".$date_of_day[$i].". : ";
          if($cond_day_text[$i][0]!="")
           {  $cond_day_lang[$i]=$cond_day_lang[$i].$cond_day_text[$i][0];
              if($cond_day_text[$i][1]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][1];}
              if($cond_day_text[$i][2]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][2];}
              if($cond_day_text[$i][3]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][3];}
              if($cond_day_text[$i][4]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][4];}
           }
           else
          {$cond_day_lang[$i]="Perd�n! Datos del tiempo no disponibles!";}
          if($cond_day_text[$i][11]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".GG_funx_translate_fahrenheit($cond_day_text[$i][11],$opt_unit);}
          if($cond_day_text[$i][10]!="" and $cond_day_text[$i][10]<>$cond_day_text[$i][11]){$cond_day_lang[$i]=$cond_day_lang[$i]."/".GG_funx_translate_fahrenheit($cond_day_text[$i][10],$opt_unit)." ";}
          if($cond_day_text[$i][12]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Viento: ".GG_funx_translate_windspeed(1/2*($cond_day_text[$i][12]+$cond_day_text[$i][13]),"mph",$opt_language)." from ".$cond_day_text[$i][14];}
          if($cond_day_text[$i][15]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Possibilita di ".GG_funx_translate_array($cond_day_text[$i][15],$opt_language).": ".$cond_day_text[$i][16]."%";}
          }
      for($i=1;$i<9;$i++){$day_ext[$i]="";}
      for($i=4;$i<count($day);$i++){$day_ext[$i]=substr($day[$i],0,3);}
      $day_ext[1]=substr($day_old,0,3);
      $day_ext[2]=substr($day[2],0,3);
      $day_ext[3]=substr($day[3],0,3);
      $extended_forecast="Prospettive:";
    }      //end translation to italian
    if ($opt_language == "pl")
    {
           $day[0]="dzisiaj";
           $day_old=GG_funx_translate_array($day[1],$opt_language); 
           $day[1]="jutro";
           for($j=2;$j<=9;$j++){$day[$j]=GG_funx_translate_array($day[$j],$opt_language);}              
           if ($flag_cc!= "N/A"){
            $feels_lang="odczuwalne:";
           }
           else
           {
            $feels_lang="Niestety aktualne dane pogodowe nie s&#261; dost&#281;pne!";
           }          
           for($j=0; $j<=3;$j++){ 
            $term_out="";
            $term_array = explode(" ",$cond_day[$j]);
            $term_out_flag_4=''; 
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              }
               if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              } 
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }     
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_day_lang[$j]=$cond_day_lang[$j]." ".$term_out[$i];
           }
           $cond_day_lang[$j]=$cond_day_lang[$j]." - Prawdopodobie&#324;stwo opad&#243;w: ".$ppcp_day[$j];
           if($cond_day_text[$j][17]!="")
           {  if($cond_day_text[$j][18]=="")
              {  $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_day_lang[$j]=$cond_day_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_day_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }
           $cond_day_lang[$j]=str_replace("xx>","",$cond_day_lang[$j]);
           $cond_day_lang[$j]=str_replace("xxf","",$cond_day_lang[$j]); 
           }          
           $term_out_flag_4=''; 
           for($j=0; $j<=3;$j++){
           $term_out="";
           $term_out_flag_1=""; 
            $term_array = explode(" ",$cond_night[$j]);
            for ($i=0; $i<count($term_array);$i++){
              $term_out[$i]=GG_funx_translate_array($term_array[$i],$opt_language);
              $term_out_flag_3="";
              if($term_out_flag_1 !=""){
                $term_out_flag_2=$term_out[$i];
                $term_out[$i] = $term_out_flag_1;
                $term_out[$i-1] =$term_out_flag_2;
                $term_out_flag_1="";
                $term_out_flag_3="1";
              } 
               if( $i!=0 AND substr($term_out[$i-1],0,3)=='xxf'  ){
                $term_out_flag_4='xxf';
              }
              if( substr($term_out[$i],0,3)=='xx>' AND $term_out_flag_3 != '1'  ){
                $term_out_flag_1=$term_out[$i];
              } 
              if($term_out_flag_4=='xxf'){
               $term_out[$i]=GG_funx_translate_array_mf($term_out[$i]);
               $term_out_flag_4='';
              }     
            }
           for ($i=0; $i<count($term_array);$i++){
            $cond_night_lang[$j]=$cond_night_lang[$j]." ".$term_out[$i];
           }
           $cond_night_lang[$j]=str_replace("xx>","",$cond_night_lang[$j]);
            $cond_night_lang[$j]=str_replace("xxf","",$cond_night_lang[$j]);
           $cond_night_lang[$j]=$cond_night_lang[$j]." - Prawdopodobie&#324;stwo opad&#243;w: ".$ppcp_night[$j]; 
           if($cond_night_text[$j][17]!="")
           {  if($cond_night_text[$j][18]=="")
              {  $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
              else
              { $cond_night_lang[$j]=$cond_night_lang[$j]." (&asymp;".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." - ".GG_funx_translate_inch($cond_night_text[$j][18],$opt_unit)." ".GG_funx_translate_array($cond_day_text[$j][15],$opt_language).")";}
           }                
           } 
          for ($i=0;$i<=3;$i++){
          if(strlen($wind_directions_day[$i])==1){$wind_directions_day[$i]=$wind_directions_day[$i]."X";} 
          if(strlen($wind_directions_day[$i])==2){$wind_directions_day[$i]=$wind_directions_day[$i]."X";}
          if(strlen($wind_directions_night[$i])==1){$wind_directions_night[$i]=$wind_directions_night[$i]."X";} 
          if(strlen($wind_directions_night[$i])==2){$wind_directions_night[$i]=$wind_directions_night[$i]."X";}
          $term_out=GG_funx_translate_windspeed($wind_speed_day[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." - Wiatr: ".$term_out." z".GG_funx_translate_winddirections($wind_directions_day[$i],$opt_language);}
          $term_out=GG_funx_translate_windspeed($wind_speed_night[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_night_lang[$i]=$cond_night_lang[$i]." - Wiatr: ".$term_out." z".GG_funx_translate_winddirections($wind_directions_night[$i],$opt_language);} 
          }  
          for ($i=0;$i<=3;$i++){
          $cond_day_lang[$i]="W dzie&#324;: ".$cond_day_lang[$i]; 
          $cond_night_lang[$i]="W nocy:".$cond_night_lang[$i];
          }             
          $icon_string_lang="Obecnie - ";  
          $pressure_lang=GG_funx_translate_pressure($pressure,$unit_pressure,$opt_language);          
          $pressure = $pressure.$unit_pressure;
          if ($pressure_lang!=""){$icon_string_lang=$icon_string_lang.$pressure_lang."c";}
          else
          { $icon_string_lang=$icon_string_lang."C";}
          $icon_string_lang=$icon_string_lang."i&#347;nienie: ".$pressure;
          if ($pressuretendence!="steady" and $pressuretendence!="N/A"){$icon_string_lang=$icon_string_lang." (".GG_funx_translate_array($pressuretendence,$opt_language).")";}
          if (GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language)!="") {$fill_in=" (";$fill_out=")";}
          if ($windspeed!="CALM" and $windspeed!="calm")
            {
            $icon_string_lang=$icon_string_lang." - Wiatr: ".$windspeed.$unit_speed.$fill_in.GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language).$fill_out." z".GG_funx_translate_winddirections($winddirections_description,$opt_language);
            }
          else
            {
            $icon_string_lang=$icon_string_lang." - bezwietrznie";
            }
          $icon_string_lang=$icon_string_lang." - Wilgotno&#347;&#263; powietrza: ".$humidity;
          $icon_string_lang=$icon_string_lang." - Indeks UV: ".$uv_index." (".GG_funx_translate_uvindex($uv_index,$opt_language_index).") - ";          
          $sunmoon_string_lang="Wsch&#243;d S&#322;o&#324;ca o godz. ".$sunrise." ";
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "night"){$sunmoon_string_lang=$sunmoon_string_lang." (za ".$night_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Zach&#243;d S&#322;o&#324;ca o godz. ".$sunset." "; 
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "day"){$sunmoon_string_lang=$sunmoon_string_lang." (za ".$daylight_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - D&#322;ugo&#347;&#263; dnia: ".$daylight_time."h - Faza Ksi&#281;&#380;yca: ".GG_funx_translate_moonphase_lang($moonphase,$opt_language_index);
          $wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index);
          //create extended forecast
          $j=1;
          if($opt_layout=="large" ){$j=4;}
          for($i=$j;$i<count($day);$i++)
          {
            $cond_day_lang[$i]=$day[$i].", ".$date_of_day[$i].". : ";
            if($cond_day_text[$i][0]!="")
             {  $cond_day_lang[$i]=$cond_day_lang[$i].$cond_day_text[$i][0];
                if($cond_day_text[$i][1]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][1];}
                if($cond_day_text[$i][2]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][2];}
                if($cond_day_text[$i][3]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][3];}
                if($cond_day_text[$i][4]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][4];}
             }
             else
            {$cond_day_lang[$i]="Niestety aktualne dane pogodowe nie s&#261; dost&#281;pne!!";}
            if($cond_day_text[$i][11]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".GG_funx_translate_fahrenheit($cond_day_text[$i][11],$opt_unit);}
            if($cond_day_text[$i][10]!="" and $cond_day_text[$i][10]<>$cond_day_text[$i][11]){$cond_day_lang[$i]=$cond_day_lang[$i]."/".GG_funx_translate_fahrenheit($cond_day_text[$i][10],$opt_unit)." ";}
            if($cond_day_text[$i][12]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Wiatr: ".GG_funx_translate_windspeed(1/2*($cond_day_text[$i][12]+$cond_day_text[$i][13]),"mph",$opt_language)." ".$cond_day_text[$i][14];}
            if($cond_day_text[$i][15]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Prawdopodobie&#324;stwo ".GG_funx_translate_array($cond_day_text[$i][15],$opt_language).": ".$cond_day_text[$i][16]."%";}
            }
          for($i=1;$i<9;$i++){$day_ext[$i]="";}
          for($i=1;$i<count($day);$i++){
            $day_ext[$i]=substr($day[$i],0,3);
            if($day[$i]=="&#347;roda"){$day_ext[$i]="&#347;ro";}
            if($day[$i]=="pi&#261;tek"){$day_ext[$i]="pi&#261;";}
          }
          $extended_forecast="Kolejne dni:";
        }      //end translation to polish
    if ($opt_language == "en")    //start preparing output in english
    {
          $day[0]="Today";
          $day_old=$day[1]; 
          $day[1]="Tomorrow";          
          if ($flag_cc!= "N/A"){
               $feels_lang="Feels like";
           }
           else
           {
           $feels_lang="Sorry! No actual weather data available!";
           }      
          for($j=0; $j<=3;$j++){
           if($cond_day_text[$j][0]!="")
           {  $cond_day_lang[$j]=$cond_day_text[$j][0];
              if($cond_day_text[$j][1]!=""){$cond_day_lang[$j]=$cond_day_lang[$j]." - ".$cond_day_text[$j][1];}
              if($cond_day_text[$j][2]!=""){$cond_day_lang[$j]=$cond_day_lang[$j]." - ".$cond_day_text[$j][2];}
              if($cond_day_text[$j][3]!=""){$cond_day_lang[$j]=$cond_day_lang[$j]." - ".$cond_day_text[$j][3];}
              if($cond_day_text[$j][4]!=""){$cond_day_lang[$j]=$cond_day_lang[$j]." - ".$cond_day_text[$j][4];}
           }
           else
           {  $cond_day_lang[$j]=$cond_day[$j];}  
           $cond_day_lang[$j]=$cond_day_lang[$j]." - Precipitation: ".$ppcp_day[$j];
           if($cond_day_text[$j][17]!="")
           {  if($cond_day_text[$j][18]=="")
              {  $cond_day_lang[$j]=$cond_day_lang[$j]." (about ".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." ".$cond_day_text[$j][15].")";}
              else
              { $cond_day_lang[$j]=$cond_day_lang[$j]." (about ".GG_funx_translate_inch($cond_day_text[$j][17],$opt_unit)." to ".GG_funx_translate_inch($cond_day_text[$j][18],$opt_unit)." ".$cond_day_text[$j][15].")";}
           }
           if($cond_night_text[$j][0]!="")
           {
              //echo $j.$cond_night_text[$j][0];
              $cond_night_lang[$j]=$cond_night_text[$j][0];
              if($cond_night_text[$j][1]!=""){$cond_night_lang[$j]=$cond_night_lang[$j]." - ".$cond_night_text[$j][1];}
              if($cond_night_text[$j][2]!=""){$cond_night_lang[$j]=$cond_night_lang[$j]." - ".$cond_night_text[$j][2];}
              if($cond_night_text[$j][3]!=""){$cond_night_lang[$j]=$cond_night_lang[$j]." - ".$cond_night_text[$j][3];}
              if($cond_night_text[$j][4]!=""){$cond_night_lang[$j]=$cond_night_lang[$j]." - ".$cond_night_text[$j][4];}
           }
           else
           {$cond_night_lang[$j]=$cond_night[$j];}  
           
           $cond_night_lang[$j]=$cond_night_lang[$j]."  - Precipitation: ".$ppcp_night[$j];
            if($cond_night_text[$j][17]!="")
           {  if($cond_night_text[$j][18]=="")
              {  $cond_night_lang[$j]=$cond_night_lang[$j]." (about ".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." ".$cond_night_text[$j][15].")";}
              else
              { $cond_night_lang[$j]=$cond_night_lang[$j]." (about ".GG_funx_translate_inch($cond_night_text[$j][17],$opt_unit)." to ".GG_funx_translate_inch($cond_night_text[$j][18],$opt_unit)." ".$cond_night_text[$j][15].")";}
           } 
           }         
          for ($i=0;$i<=3;$i++){            //add wind_conditions to forecaststring
          $term_out=GG_funx_translate_windspeed($wind_speed_day[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." - ".$term_out." from ".$wind_directions_day[$i];}
          $term_out=GG_funx_translate_windspeed($wind_speed_night[$i],$unit_speed,$opt_language);
          if ($term_out!=""){$cond_night_lang[$i]=$cond_night_lang[$i]." - ".$term_out." from ".$wind_directions_night[$i];} 
          }       
          for ($i=0;$i<=3;$i++){           //add "day" and "night" to the strings
          $cond_day_lang[$i]="Day: ".$cond_day_lang[$i]; 
          $cond_night_lang[$i]="Night: ".$cond_night_lang[$i];
          }             
          $icon_string_lang="Actual Conditions - ";
          $pressure_lang=GG_funx_translate_pressure($pressure,$unit_pressure,$opt_language);
          $pressure = $pressure.$unit_pressure;
          if ($pressure_lang!=""){$icon_string_lang=$icon_string_lang.$pressure_lang." P";}
          else
          { $icon_string_lang=$icon_string_lang."P";}
          $icon_string_lang=$icon_string_lang."ressure: ".$pressure;
          if ($pressuretendence!="steady" and $pressuretendence!="N/A"){$icon_string_lang=$icon_string_lang." (".$pressuretendence.")";}
          if (GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language)!="") {$fill_in=" (";$fill_out=")";}
          if ($windspeed!="CALM" and $windspeed!="calm")
            {
            $icon_string_lang=$icon_string_lang." - Wind: ".$windspeed.$unit_speed.$fill_in.GG_funx_translate_windspeed($windspeed,$unit_speed,$opt_language).$fill_out." from ".$winddirections_description;
           }
          else
            {
            $icon_string_lang=$icon_string_lang." - Wind: calm";
            }
          
          if ($windgust!="N/A"){$icon_string_lang=$icon_string_lang." (Windgusts up to ".$windgust.$unit_speed.")";}
          $icon_string_lang=$icon_string_lang." - Humidity: ".$humidity;
          $icon_string_lang=$icon_string_lang." - UV-Index: ".$uv_index." (".$uv_description.") - ";
          
          $sunmoon_string_lang="Sunrise at ".$sunrise." hrs";
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "night"){$sunmoon_string_lang=$sunmoon_string_lang." (in ".$night_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Sunset at ".$sunset." hrs"; 
          if($opt_auto_location_select<>"checked"){if ($flag_day_night == "day"){$sunmoon_string_lang=$sunmoon_string_lang." (in ".$daylight_left."h) ";}}
          $sunmoon_string_lang=$sunmoon_string_lang." - Length of day: ".$daylight_time."h - Moonphase: ".$moonphase;  
          $wetterlang=$cond; 
          $j=1;             //create extended forecast
          if($opt_layout=="large" ){$j=4;}
          for($i=$j;$i<count($day);$i++)
          {
          $cond_day_lang[$i]=$day[$i].", ".$date_of_day[$i];
          if($date_of_day[$i]==1 or $date_of_day[$i]==21 or $date_of_day[$i]==31){$cond_day_lang[$i]=$cond_day_lang[$i]."st: ";}
              elseif($date_of_day[$i]==2 or $date_of_day[$i]==22){$cond_day_lang[$i]=$cond_day_lang[$i]."nd: ";}
              elseif($date_of_day[$i]==3 or $date_of_day[$i]==23){$cond_day_lang[$i]=$cond_day_lang[$i]."rd: ";}
          else {$cond_day_lang[$i]=$cond_day_lang[$i]."th: ";}
          if($cond_day_text[$i][0]!="")
           {  $cond_day_lang[$i]=$cond_day_lang[$i].$cond_day_text[$i][0];
              if($cond_day_text[$i][1]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][1];}
              if($cond_day_text[$i][2]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][2];}
              if($cond_day_text[$i][3]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][3];}
              if($cond_day_text[$i][4]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".$cond_day_text[$i][4];}
           }
           else
          {$cond_day_lang[$i]="No Forecast data for this day!";}
          if($cond_day_text[$i][11]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * ".GG_funx_translate_fahrenheit($cond_day_text[$i][11],$opt_unit);}
          if($cond_day_text[$i][10]!="" and $cond_day_text[$i][10]<>$cond_day_text[$i][11]){$cond_day_lang[$i]=$cond_day_lang[$i]."/".GG_funx_translate_fahrenheit($cond_day_text[$i][10],$opt_unit)." ";}
          if($cond_day_text[$i][12]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Winds: ".GG_funx_translate_windspeed(1/2*($cond_day_text[$i][12]+$cond_day_text[$i][13]),"mph",$opt_language)." from ".$cond_day_text[$i][14];}
          if($cond_day_text[$i][15]!=""){$cond_day_lang[$i]=$cond_day_lang[$i]." * Chance of ".$cond_day_text[$i][15].": ".$cond_day_text[$i][16]."%";}
          }
      for($i=1;$i<9;$i++){$day_ext[$i]="";}
      for($i=1;$i<count($day);$i++){$day_ext[$i]=substr($day[$i],0,3);}
      $day_ext[1]=substr($day_old,0,3);
      $extended_forecast="Next days:";
      
    } 
    }      
    if ($cond_day[0]=="N/A" and ($icon_day[0]=="25" or $icon_day[0]=="44"))      //check if day forecast for actual day (rest of the day) is available, if not, clear variables for day = 0 .. no pic for the day will be shown then, which doesnt matter, because the night is normally coming in short...
      {
      $cond_day_lang[0]="";
      $iconhref_day[0]=$imageloc."1x1.gif";
      $icon_layout_middle_check="xxx";
      }
    else //if the forecastdata is unsufficient (in every 10th case, weather.com commits an "n/a" instead of a weather explanation description in <t></t> after the </icon> ... the mouseover forecast string will be set to the the text, that refers the icon in that case 
      {
      if ($cond_day[0]=="N/A") {    
        $cond_day_lang[0]=str_replace("n/a",$wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index));
        }
      }  
    if ($temp_hi[0]=="N/A&deg;C" or $temp_hi[0]=="N/A&deg;F"){    // sometimes tempearture max isnt available for day = 0 ... set actual temperature as max temperature for the day then
    $temp_hi[0]=$temp;
    }
    if ($cond_night[0]=="N/A")      // special treatment for night = 0 
      {
      $cond_night_lang[0]=str_replace("n/a",$wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index));
      }
    for ($i=1;$i<=3;$i++)     // for all other day and night forecast texts ... same procedure ...
    {
      if ($cond_day[$i]=="N/A"){
        $cond_day_lang[$i]=str_replace("n/a",$wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index));
        }
      if ($cond_night[$i]=="N/A"){
        $cond_night_lang[$i]=str_replace("n/a",$wetterlang=GG_funx_translate_wetter_lang($icon,$opt_language_index));
      }
    }      
		$icon_prmo = $imageloc."TWClogo_31px.png";
    if($prmo_link=="&par=".$wc_partnerid){$prmo_link="http://www.weather.com?par=".$wc_partnerid;}
    if($imagefolder_check=="WeatherCom"){$iconhref = $imageloc.$imagefolder."93/".$icon.'.png';}
    else{$iconhref = $imageloc.$imagefolder.$icon.'.png';}
		$format = $widget_options['format'];
    $content = str_replace(
			array (
				"%loc%", "%temp%", "%feels%", "%cond%", "%icon%", "%iconhref%", "%icon_string_lang%",  "%wetterlang%", "%feels_lang%",
				"%day_0%", "%day_1%", "%day_2%", "%day_3%", "%sunmoon_string_lang%", "%prmo_link%","%prmo_link_description%","%icon_prmo%",
        "%temp_hi_0%", "%temp_lo_0%", "%temp_hi_1%", "%temp_lo_1%", "%temp_hi_2%", "%temp_lo_2%", "%temp_hi_3%", "%temp_lo_3%",
        "%icon_day_0%","%icon_day_1%","%icon_day_2%", "%icon_day_3%", "%icon_night_0%", "%icon_night_1%", "%icon_night_2%", "%icon_night_3%",
        "%iconhref_day_0%","%iconhref_day_1%","%iconhref_day_2%", "%iconhref_day_3%", "%iconhref_night_0%", "%iconhref_night_1%", "%iconhref_night_2%", "%iconhref_night_3%",
        "%cond_day_lang_0%","%cond_day_lang_1%","%cond_day_lang_2%", "%cond_day_lang_3%", "%cond_day_lang_4%","%cond_day_lang_5%","%cond_day_lang_6%", "%cond_day_lang_7%", "%cond_day_lang_8%","%cond_day_lang_9%",
        "%cond_night_lang_0%", "%cond_night_lang_1%", "%cond_night_lang_2%", "%cond_night_lang_3%", 
        "%day_ext_1%","%day_ext_2%","%day_ext_3%","%day_ext_4%","%day_ext_5%","%day_ext_6%","%day_ext_7%","%day_ext_8%","%day_ext_9%","%extendend_forecast%", "%icon_layout_middle_check%","%auto_loc%",
			) ,
			array (
				$loc, $temp, $feels, $cond, $icon, $iconhref, $icon_string_lang,  $wetterlang, $feels_lang,
        $day["0"], $day["1"], $day["2"], $day["3"], $sunmoon_string_lang, $prmo_link, $prmo_link_description,$icon_prmo,
        $temp_hi["0"], $temp_lo["0"], $temp_hi["1"], $temp_lo["1"], $temp_hi["2"], $temp_lo["2"],$temp_hi["3"], $temp_lo["3"],
        $icon_day["0"], $icon_day["1"], $icon_day["2"], $icon_day["3"], $icon_night["0"], $icon_night["1"],$icon_night["2"],$icon_night["3"],
        $iconhref_day["0"], $iconhref_day["1"], $iconhref_day["2"], $iconhref_day["3"], $iconhref_night["0"], $iconhref_night["1"],$iconhref_night["2"],$iconhref_night["3"],
        $cond_day_lang["0"], $cond_day_lang["1"], $cond_day_lang["2"], $cond_day_lang["3"], $cond_day_lang["4"], $cond_day_lang["5"], $cond_day_lang["6"], $cond_day_lang["7"],$cond_day_lang["8"], $cond_day_lang["9"],    
        $cond_night_lang["0"], $cond_night_lang["1"],$cond_night_lang["2"],$cond_night_lang["3"], 
        $day_ext["1"],$day_ext["2"],$day_ext["3"],$day_ext["4"],$day_ext["5"],$day_ext["6"],$day_ext["7"],$day_ext["8"],$day_ext["9"], $extended_forecast, $icon_layout_middle_check,$auto_loc     
			) ,
			$format
		);
    if ($data === false){
     $content = str_replace(
			array (
				"%loc%", "%temp%", "%feels%", "%cond%", "%icon%", "%iconhref%", "%icon_string_lang%",  "%wetterlang%", "%feels_lang%",
				"%day_0%", "%day_1%", "%day_2%", "%day_3%", "%sunmoon_string_lang%", "%prmo_link%","%prmo_link_description%","%icon_prmo%",
        "%temp_hi_0%", "%temp_lo_0%", "%temp_hi_1%", "%temp_lo_1%", "%temp_hi_2%", "%temp_lo_2%", "%temp_hi_3%", "%temp_lo_3%",
        "%icon_day_0%","%icon_day_1%","%icon_day_2%", "%icon_day_3%", "%icon_night_0%", "%icon_night_1%", "%icon_night_2%", "%icon_night_3%",
        "%iconhref_day_0%","%iconhref_day_1%","%iconhref_day_2%", "%iconhref_day_3%", "%iconhref_night_0%", "%iconhref_night_1%", "%iconhref_night_2%", "%iconhref_night_3%",
        "%cond_day_lang_0%","%cond_day_lang_1%","%cond_day_lang_2%", "%cond_day_lang_3%", "%cond_day_lang_4%","%cond_day_lang_5%","%cond_day_lang_6%", "%cond_day_lang_7%", "%cond_day_lang_8%","%cond_day_lang_9%",
        "%cond_night_lang_0%", "%cond_night_lang_1%", "%cond_night_lang_2%", "%cond_night_lang_3%",
        "%icon_ext_1%","%icon_ext_2%","%icon_ext_3%","%icon_ext_4%","%icon_ext_5%","%icon_ext_6%", 
			) ,
			array (
				"", "", "It looks like the Blog-Server or Weather.Com doesn't like a connection at the moment!", "", "", $imageloc.'1x1.gif', "No Weather Data received",  "Error!", "",
         "", "", "", "", "", $uri,  "", $imageloc."TWClogo_31px.png",
         "", "", "", "", "", "",  "", "",
         "", "", "", "", "", "",  "", "",
         $imageloc.'1x1.gif', $imageloc.'1x1.gif', $imageloc.'1x1.gif', $imageloc.'1x1.gif',$imageloc.'1x1.gif', $imageloc.'1x1.gif',  $imageloc.'1x1.gif', $imageloc.'1x1.gif',
         "", "", "", "", "", "",  "", "",
			) ,
			$format
		);
    }		
		$widget_options['wc_cache'] = $content;
		$widget_options['wc_lastcheck'] = time();
		update_option('GG_func_widget_weather_and_weather_forecast',$widget_options);
		echo $before_widget;
		echo $widgettitle;
		echo $content;
		echo $after_widget;
	}
}
//**************************end widget*******************************************
//**************************functions********************************************

function GG_func_cutout($data, $start, $end) {
    $from = strpos($data, $start) + strlen($start);
    if($from === false) {return false;}
    $to = @strpos($data, $end, $from); 
    if($to === false) {return false;} 
    return substr($data, $from, $to-$from);
  }

function GG_func_widget_format($term_in,$term_out,$f_size_s,$f_size_m,$f_size_l,$i_size_s,$i_size_m,$i_size_l,$background_color,$font_family, $font_color, $images,$wc_partnerid,$term){
    $check=$term_in;
    if ($check=="auto_location"){
      $term_out ="<!-- Table0 --><table width='100%' cellpadding='0' cellspacing ='0'><tr><td>&nbsp;</td></tr><tr><td><span style='font-family:".$font_family.";font-size:".$f_size_l.";color:".$font_color."'>%auto_loc%</td></tr></table>";
    }   
    if ($check=="small"){
      $term_out ="<!-- Table1 --><table  width='100%' cellpadding='0' cellspacing ='0'><tr><td><img src='%iconhref%' alt='%cond%' style='float:right;' title='%icon_string_lang% %sunmoon_string_lang%' width='".round($i_size_l*93,0)."'><br /><p style='text-align:center'><span style='font-family:".$font_family."; font-size:".$f_size_l.";color:".$font_color."'>%temp%</span><br /><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'> (%feels_lang%  %feels%)</span><br /><span style='font-family:".$font_family.";font-size:".$f_size_l.";color:".$font_color."'>%wetterlang%</span></p></td></tr></table>";
    }    
    if($check=="medium"){
      $term_out ="<!-- Table2 --><table table  width='100%' cellpadding='0' cellspacing ='0'><tr><td><span style='font-family:".$font_family.";font-size:".$f_size_m.";color:".$font_color."'>%day_0%: <br />%temp_hi_0% / %temp_lo_0% </span></td><td><img src=%iconhref_day_0% title='%cond_day_lang_0%' %icon_layout_middle_check%width='".round($i_size_m*61,0)."'></td><td><img src=%iconhref_night_0% width='".round($i_size_m*61*0.75,0)."' title='%cond_night_lang_0%'></td></tr></table>";
    }    
    if($check=="large"){
      if($term=="checked"){$term_out ="<!-- Table 3 --><table  width='100%' cellpadding='0' cellspacing ='0'><tr><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%day_1% </span></td><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%day_2% </span></td><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%day_3% </span></td></tr><tr><td></td><td></td><td></td></tr><tr><td><img src=%iconhref_day_1% width='".round($i_size_s*31,0)."' title='%cond_day_lang_1%'><img src=%iconhref_night_1% width='".round($i_size_s*31*0.8,0)."' title='%cond_night_lang_1%'></td><td><img src=%iconhref_day_2% width='".round($i_size_s*31,0)."' title='%cond_day_lang_2%'><img src=%iconhref_night_2% width='".round($i_size_s*31*0.8,0)."' title='%cond_night_lang_2%'></td><td> <img src=%iconhref_day_3% width='".round($i_size_s*31,0)."' title='%cond_day_lang_3%'><img src=%iconhref_night_3% width='".round($i_size_s*31*0.8,0)."' title='%cond_night_lang_3%'></td></tr><tr><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%temp_hi_1% / %temp_lo_1% </span> </td><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%temp_hi_2% / %temp_lo_2%  </span></td><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%temp_hi_3% / %temp_lo_3% </span></td></tr></table>"; }
      else{$term_out ="<!-- Table 3 --><table  width='100%' cellpadding='0' cellspacing ='0'><tr><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%day_1% </span></td><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%day_2% </span></td><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%day_3% </span></td></tr><tr><td></td><td></td><td></td></tr><tr><td><img src=%iconhref_day_1% width='".round($i_size_s*31,0)."' title='%cond_day_lang_1% *** %cond_night_lang_1%'></td><td><img src=%iconhref_day_2% width='".round($i_size_s*31,0)."' title='%cond_day_lang_2% *** %cond_night_lang_2%'></td><td> <img src=%iconhref_day_3% width='".round($i_size_s*31,0)."' title='%cond_day_lang_3% *** %cond_night_lang_3%'></td></tr><tr><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%temp_hi_1% / %temp_lo_1% </span> </td><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%temp_hi_2% / %temp_lo_2%  </span></td><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'>%temp_hi_3% / %temp_lo_3% </span></td></tr></table>"; 
      }
    }    
    if($check=="extended"){
      $term_out ="<!-- Table 4 --><table width='100%' cellpadding='0' cellspacing ='0'>";
      if(strpos($term,"Table 3")){$term_out =$term_out."<tr><td colspan=7>&nbsp;</td</tr><tr>";}
      if(!strpos($term,"Table 3")){$term_out =$term_out."<tr><td style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' colspan=9><strong>%extendend_forecast%</strong></td></tr><tr><td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_1%'>%day_ext_1%</a></td><td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_2%'>%day_ext_2%</a></td><td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_3%'>%day_ext_3%</a></td>";}
      if(strpos($term,"Table 3")){$term_out =$term_out."<td style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'><strong>%extendend_forecast%</strong></td>";}
      $term_out =$term_out."<td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_4%'>%day_ext_4%</a></td><td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_5%'>%day_ext_5%</a></td><td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_6%'>%day_ext_6%</a></td><td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_7%'>%day_ext_7%</a></td><td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_8%'>%day_ext_8%</a></td><td><a style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' title='%cond_day_lang_9%'>%day_ext_9%</a></td></tr></table>"; 
    }      
    if($check=="link"){      
      $term_out ="<!-- Table 5 --><table width='100%' cellpadding='0' cellspacing ='0'><tr><td><span style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."'><br />Weather data provided by <a href='http://www.weather.com/?prod=xoap&par=".$wc_partnerid."' style='font-family:".$font_family.";font-size:".$f_size_s.";color:".$font_color."' target ='_blank'>weather.com&reg;</a></span></td><td><br /><a href='%prmo_link%' target='_blank'><img src=%icon_prmo% title='%prmo_link_description%'  width='25' height='25' ></a>&nbsp;&nbsp;&nbsp;</td></tr></table>";
    }    
    if($check=="lines"){
      $term_out ="<hr>"; 
    }        
    //$tst= str_replace("<","{",$term_out);
    //$tst= str_replace(">","}",$tst);
    //echo $tst;
    return $term_out; 
}

function GG_func_get_ip_data($ipinfodb_key)    
    {
    for($i=0;$i<=3;$i++){
    $iplocA[$i]="";
    $iplocB[$i]="";
    $iploc[$i]="";
    }
    $ip_address = $_SERVER['REMOTE_ADDR'];
	  $uri = 'http://freegeoip.net/xml/'.$ip_address;	  
    $data = GG_func_get_content_IP($uri);
   // echo $data; 
	  if($data<>""){
  	  $pos = strpos($data, "<CountryCode>"); 
  		$iplocA[0] = substr($data, $pos+13, strpos($data,"</CountryCode>") - $pos-13);
  		$pos = strpos($data, "<CountryName>"); 
  		$iplocA[1] = substr($data, $pos+13, strpos($data,"</CountryName>") - $pos-13);
  		$pos = strpos($data, "<RegionName>"); 
  		$iplocA[2] = substr($data, $pos+12, strpos($data,"</RegionName>") - $pos-12);
  		$pos = strpos($data, "<City>"); 
  		$iplocA[3] = substr($data, $pos+6, strpos($data,"</City>") - $pos-6);	
    }
    for($j=0;$j<=3;$j++){if($iplocA[$j]=="-"){$iplocA[$j]="";}
    }
	  $uri = 'http://api.ipinfodb.com/v3/ip-city/?key='.$ipinfodb_key.'&format=xml&ip='.$ip_address;
	  $data = GG_func_get_content_IP($uri); 
	  if($data<>"" and !substr_count($data,'Code>ERROR') ){
  	$pos = strpos($data, "<countryCode>"); 
  		$iplocB[0] = substr($data, $pos+13, strpos($data,"</countryCode>") - $pos-13);
  		$pos = strpos($data, "<countryName>"); 
  		$iplocB[1] = substr($data, $pos+13, strpos($data,"</countryName>") - $pos-13);
  		$pos = strpos($data, "<regionName>"); 
  		$iplocB[2] = substr($data, $pos+12, strpos($data,"</regionName>") - $pos-12);
  		$pos = strpos($data, "<cityName>"); 
  		$iplocB[3] = substr($data, $pos+10, strpos($data,"</cityName>") - $pos-10);  
    }                  	  
	  if($iplocB[0]<>""){
        for($j=0;$j<=3;$j++){$iploc[$j]=$iplocB[$j];}
        }
    else{
        for($j=0;$j<=3;$j++){$iploc[$j]=$iplocA[$j];}
        }	  
    $flag_search="Yes";
	  if($iploc[0]=="US"){
        if($iploc[3]=="" or $iploc[3]=="-"){
            $iploc[3]=GG_funx_translate_capital($iploc[0]);
            $iploc[2]=$iploc[1];}            
       $iploc[2]=GG_funx_translate_country(strtolower($iploc[2]));
        $search_string=$iploc[3].",".$iploc[2];    
        } 
	  else 
      {      
        if($iploc[0]=="UK"){$iploc[0]="GB";}
        if($iploc[3]=="" or $iploc[3]=="-"){
           $iploc[3]=GG_funx_translate_capital($iploc[0]);
           $iploc[2]=$iploc[1];}
        $search_string=$iploc[3].",".$iploc[0];  
        }
    if($iploc[0]=="RD" or $iploc[0]==""or $iploc[0]=="-"){
        $flag_search="No";}
    //echo $flag_search.$search_string.$iploc[0];
    return array($flag_search,$search_string,$iploc[0]);
    }

function GG_func_get_location_ids($term_in)
{
    $zeichen=array("ä","ö","ü","�","�","�","�","�","�","�","ae","ue","oe"," ",);
    $zeichen_ersetzen=array("a","o","u","a","u","o","A","U","o","ss","a","u","o","_",);
    $string_in=  strtolower($term_in);
    $string_in = str_replace("&uuml;","u",$string_in);
    $string_in = str_replace($zeichen,$zeichen_ersetzen,$string_in);
    $uri= 'http://xoap.weather.com/search/search?where='.$string_in;
    $data="";
    if ($string_in!=""){$data = GG_func_get_content($uri); }
    //echo $data;
    if($data<>"" and substr_count($data,'<loc id')){
    $data = str_replace('"',"",$data);  // Replace any of any " in the string! They might cause trouble ...
  	$pos_start = strpos($data, "<loc");
		$data = substr($data, $pos_start+4, strlen($data) - $pos_start-4);
		$pos_start =  strpos($data, "id=");
		$pos_end =    strpos($data, " type");
		$loc_id= substr($data,$pos_start+3,$pos_end-$pos_start-3);
		$pos_start =  strpos($data, ">");
		$pos_end =    strpos($data, "</loc");
		$loc_lang= substr($data,$pos_start+1,$pos_end-$pos_start-1);
		$pos_start =  strpos($loc_lang, ",");
		$loc_city= trim(substr($loc_lang,0,$pos_start));
		$loc_state= trim(substr($loc_lang,$pos_start+1,strlen($loc_lang)-$pos_start));
    }	
    //echo $loc_id.$loc_city.$loc_state;
    return array($loc_id,$loc_city,$loc_state);
}

function GG_func_get_content_IP($term_in)
{
    if( ini_get('allow_url_fopen') ) 
      {
      $opts = array('http' => array('method'  => 'POST','timeout' => 2));
      $context  = stream_context_create($opts);
      $term_out=file_get_contents($term_in,false,$context);
    }
    else {
      $ch = curl_init();
      curl_setopt ($ch, CURLOPT_URL, $term_in);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt ($ch, CURLOPT_TIMEOUT, 2);
      $term_out = curl_exec($ch);
      curl_close($ch);  
    }
    return $term_out;
}

function GG_func_get_content($term_in)
{
    if( ini_get('allow_url_fopen') ) 
      {$term_out=file_get_contents($term_in);
    }
    else {
      $ch = curl_init();
      curl_setopt ($ch, CURLOPT_URL, $term_in);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
      $term_out = curl_exec($ch);
      curl_close($ch);  
    }
    return $term_out;
}

function GG_func_getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
    }
    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    if ($version==null || $version=="") {$version="?";}
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'   => $pattern
    );
}
//**************************end functions****************************************
?>