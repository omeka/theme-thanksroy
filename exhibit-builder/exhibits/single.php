<div class="exhibit record">
    <?php 
    $title = metadata($exhibit, 'title', array('no_escape' => true));
    $thumbnailSetting = (option('use_square_thumbnail')) ? 'square_thumbnail' : 'thumbnail';
    $exhibitImage = (record_image($exhibit)) ? record_image($exhibit, $thumbnailSetting, array('class' => 'image')) : '';
    ?>
    <div class="title"><?php echo link_to($this->exhibit, 'show', $exhibitImage . $title); ?></div>
    <p><?php echo snippet_by_word_count(metadata($exhibit, 'description', array('no_escape' => true))); ?></p>
</div>
