<?php 

/**
 * @version $Id$
 * @copyright Center for History and New Media, 2007-2010
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package thanksroy
 */

function thanksroy_show_untitled_items($title)
{
    // Remove all whitespace and formatting before checking to see if the title 
    // is empty.
    $prepTitle = trim(strip_formatting($title));
    if (empty($prepTitle)) {
        return '[Untitled]';
    }
    return $title;
}

/**
 * This function checks the Logo theme option, then returns either an
 * image tag with the logo as the src, or returns null.
 *
 **/
function thanksroy_display_logo()
{
    if(function_exists('get_theme_option')) {
        
        $logo = get_theme_option('Logo');
        
        $logoPath = WEB_THEME_UPLOADS.DIRECTORY_SEPARATOR.$logo;
        
	    $siteTitle = $logo ? '<img src="'.$logoPath.'" title="'.settings('site_title').'" />' : null;
	
	    return $siteTitle;
    }
    
    return null;
}

function thanksroy_show_item_metadata(array $options = array(), $item = null)
{
    if (!$item) {
        $item = get_current_item();
    }
	if ($dcFieldsList = get_theme_option('display_dublin_core_fields')) {
	    $html = '';
	    $dcFields = explode(',', $dcFieldsList);
	    foreach ($dcFields as $field) {
	        $field = trim($field);
	        if (element_exists('Dublin Core', $field)) {
    	        if ($fieldValue = item('Dublin Core', $field)) {
    	            $html .= '<h3>'.$field.'</h3>';
    	            $html .= $fieldValue;
    	        }
    	    }
	    }
	    $html .= show_item_metadata(array('show_element_sets' => array('Item Type Metadata')));
	    return $html;
	} else {
	    return show_item_metadata($options, $item); 
    }
}

function thanksroy_public_nav_header()
{    
    if ($customHeaderNavigation = get_theme_option('custom_header_navigation')) {
        $navArray = array();
        $customLinkPairs = explode("\n", $customHeaderNavigation);
        foreach ($customLinkPairs as $pair) {
            $pair = trim($pair);
            if ($pair != '') {
                $pairArray = explode('|', $pair, 2);
                if (count($pairArray) == 2) {
                    $link = trim($pairArray[0]);
                    $url = trim($pairArray[1]); 
                    if (strncmp($url, 'http://', 7) && strncmp($url, 'https://', 8)){                        
                        $url = uri($url);
                    }
                }
                $navArray[$link] = $url;
            }
        }
        return nav($navArray);
    } else {
        $navArray = array('Browse Items' => uri('items'), 'Browse Collections'=>uri('collections'));
        return public_nav_main($navArray);
    }
}

function thanksroy_nav_items($navArray = array())
{
    if (!$navArray) {
        $navArray = array('Browse All' => uri('items/'), 'Browse by Tag' => uri('items/tags'));
    }
    
    // Check to see if the function public_nav_items, introduced in Omeka 1.3, exists.
    if (function_exists('public_nav_items')) {
		return public_nav_items($navArray);
	} else {
	    return nav($navArray);
	}
}