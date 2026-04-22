
<div class="d-flex">
<?php $cats = get_the_category(); ?>
<?php foreach($cats as $cat): ?>
    <div class="p-2"><span><?= $cat->name ?></span></div>
<?php endforeach; ?>
</div>