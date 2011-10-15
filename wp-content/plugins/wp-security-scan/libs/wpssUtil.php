<?php
/**
 * utility methods
 *
 * @author kos
 */
class wpssUtil
{
    /**
     * @public
     * @static
     * @since v0.1
     * @global WPSS_WSD_BLOG_FEED
     * 
     * Retrieve and display a list of links for an existing RSS feed, limiting the selection to the 5 most recent items.
	 *
	 * @return void
     */
    public static function displayDashboardWidget()
    {
        //@ flag
        $run = false;
        
        //@ check cache
        $optData = get_option('wsd_feed_data');
        if (! empty($optData))
        {
            if (is_object($optData))
            {

                $lastUpdateTime = @$optData->expires;
                // invalid cache
                if (empty($lastUpdateTime)) { $run = true; }
                else
                {
                    $nextUpdateTime = $lastUpdateTime+(24*60*60);
                    if ($nextUpdateTime >= $lastUpdateTime)
                    {
                        $data = @$optData->data;
                        if (empty($data)) { $run = true; }
                        else {
                            // still a valid cache
                            echo $data;
                            return;
                        }
                    }
                    else { $run = true; }
                }
            }
            else { $run = true; }
        }
        else { $run = true; }

        if (!$run) { return; }
        
        $rss = fetch_feed(WPSS_WSD_BLOG_FEED);

        $out = '';
        if (is_wp_error( $rss ) )
        {
            $out = '<li>'.__('An error has occurred while trying to load the rss feed!').'</li>';
            echo $out;
            return;
        }
        else
        {
            // Limit to 5 entries. 
            $maxitems = $rss->get_item_quantity(5); 

            // Build an array of all the items,
            $rss_items = $rss->get_items(0, $maxitems); 

            $out .= '<ul>';
                if ($maxitems == 0)
                {
                    $out.= '<li>'.__('There are no entries for this rss feed!').'</li>';
                }
                else
                {
                    foreach ( $rss_items as $item ) :
                        $url = esc_url($item->get_permalink());
                        $out.= '<li>';
                            $out.= '<h4><a href="'.$url.'" target="_blank" title="Posted on '.$item->get_date('F j, Y | g:i a').'">';
                                $out.= esc_html( $item->get_title() );
                            $out.= '</a></h4>';
                            $out.= '<p>';
                                    $d = $item->get_description();
                                    $p = substr($d, 0, 115).' <a href="'.$url.'" target="_blank" title="Read all article">[...]</a>';
                                $out.= $p;
                            $out.= '</p>';
                        $out.= '</li>';
                    endforeach;
                }
            $out.= '</ul>';
        }
        
        // Update cache
        $obj = new stdClass();
            $obj->expires = time();
            $obj->data = $out;
        update_option('wsd_feed_data', $obj);

        echo $out;
    } 

    /**
     * @public
     * @static
     * @since v0.1
     * 
     * Add the rss widget to dashboard
	 *
     * @return void
     */
    public static function addDashboardWidget()
    {
        wp_add_dashboard_widget('acx_plugin_dashboard_widget', __('WebsiteDefender news and updates'), 'wpssUtil::displayDashboardWidget');
    } 
}