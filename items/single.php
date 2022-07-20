<div class="item record">
    <?php
    $title = metadata($item, 'rich_title', array('no_escape' => true));
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    $thumbnailSetting = (option('use_square_thumbnail')) ? 'square_thumbnail' : 'thumbnail';
    $itemImage = (record_image($item)) ? record_image($item, $thumbnailSetting, array('class' => 'image')) : '';
    ?>
    <div class="title"><?php echo link_to($this->item, 'show', $itemImage . $title); ?></div>
    <?php if ($description): ?>
        <p class="item-description"><?php echo $description; ?></p>
    <?php endif; ?>
</div>
