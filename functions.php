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


/**
 * Return the HTML for summarizing a random featured exhibit
 *
 * @return string
 */
function thanksroy_exhibit_builder_display_random_featured_exhibit($count = 2, $hasImage = null)
{
    $exhibits = get_records('Exhibit', array('featured' => 1,
                                     'sort_field' => 'random',
                                     'hasImage' => $hasImage), $count);;
    if ($exhibits) {
        $html = '';
        foreach ($exhibits as $exhibit) {
            $html .= get_view()->partial('exhibit-builder/exhibits/single.php', array('exhibit' => $exhibit));
            release_object($exhibit);
        }
    } else {
        $html .= '<p>' . __('You have no featured exhibits.') . '</p>';
    }
    $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);
    return $html;
}