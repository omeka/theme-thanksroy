<div class="collection record">
    <?php
    $title = metadata($collection, 'rich_title', array('no_escape' => true));
    $description = metadata($collection, array('Dublin Core', 'Description'), array('snippet' => 150));
    $thumbnailSetting = (option('use_square_thumbnail')) ? 'square_thumbnail' : 'thumbnail';
    $collectionImage = (record_image($collection)) ? record_image($collection, $thumbnailSetting, array('class' => 'image')) : '';
    ?>
    <div class="title"><?php echo link_to($this->collection, 'show', $collectionImage . $title); ?></div>
    <?php if ($description): ?>
        <p class="collection-description"><?php echo $description; ?></p>
    <?php endif; ?>
</div>
