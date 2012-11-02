<?php 

function thanksroy_random_featured_item() 
{
    $html = '<h2>'. __('Featured Item') .'</h2>';
    if ($randomFeaturedItems = get_random_featured_items(1)) {
        $randomItem = $randomFeaturedItems[0];
        $itemTitle = metadata($randomItem, array('Dublin Core', 'Title'));
        if (item_has_thumbnail($randomItem)) {
            $html .= link_to_item(item_image('square_thumbnail', array(), 0, $randomItem), array('class'=>'image'), 'show', $randomItem);
        }
        $html .= '<h3>' . link_to_item($itemTitle, array(), 'show', $randomItem) . '</h3>';
        if ($itemDescription = metadata($randomItem, array('Dublin Core', 'Description'), array('snippet'=>150))) {
            $html .= '<p class="item-description">' . $itemDescription . '</p>';
        }
    } else {
        $html .= '<p>'.__('No featured items are available.').'</p>';
    }
    return $html;
}

?>