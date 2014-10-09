<?php
/**
 * Modify a hex color by the given number of steps (out of 255).
 *
 * Adapted from a solution by Torkil Johnsen.
 *
 * @param string $color
 * @param int $steps
 * @link http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 */
function thanksroy_brighten($color, $steps) {
    $steps = max(-255, min(255, $steps));
    $hex = str_replace('#', '', $color);
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

     return '#'.$r_hex.$g_hex.$b_hex;
}


function thanksroy_exhibit_builder_page_summary($exhibitPage = null, $currentPageId)
{
    if (!$exhibitPage) {
        $exhibitPage = get_current_record('exhibit_page');
    }

    $parents = array();
    $currentPage = get_record_by_id('Exhibit Page', $currentPageId);
    while ($currentPage->parent_id) {        
        $currentPage = $currentPage->getParent();
        array_unshift($parents, $currentPage->id);
    }
    
    $class  = '';
    $class .= ($exhibitPage->id == $currentPageId) ? 'current' : '';
    $parent = (array_search($exhibitPage->id, $parents) !== false) ? ' parent' : '';

    $html = '<li class="' . $class . $parent . '">'
          . '<a href="' . exhibit_builder_exhibit_uri(get_current_record('exhibit'), $exhibitPage) . '">'
          . metadata($exhibitPage, 'title') .'</a>';

    $children = $exhibitPage->getChildPages();
    if ($children) {
        $html .= '<ul>';
        foreach ($children as $child) {
            $html .= thanksroy_exhibit_builder_page_summary($child, $currentPageId);
            release_object($child);
        }
        $html .= '</ul>';
    }
    $html .= '</li>';
    return $html;
}