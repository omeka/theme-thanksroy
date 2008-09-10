<?php head(array('title'=>collection('Title'))); ?>

<div id="primary" class="show">
    <h1><?php echo collection('Title'); ?></h1>

    <div id="description" class="element">
    <h2>Description</h2>
    <div class="element-text"><?php echo nls2p(collection('Description')); ?></div>
    </div>
    
    <div id="collectors" class="element">
    <h2>Collector(s)</h2> 
        <div class="element-text">
            <ul>
                <li><?php echo collection('Collectors', array('delimiter'=>'</li><li>')); ?></li>
            </ul>
        </div>
    </div>

    <p class="view-items-link"><?php echo link_to_browse_items('View the items in' . collection('Title'), array('collection' => collection('id'))); ?></p>

</div>

<?php foot(); ?>