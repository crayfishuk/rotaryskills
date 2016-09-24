<?= $this->Html->css('jqcloud.min.css') ?>
<?= $this->Html->script('jqcloud.min.js') ?>
<style>
    div.cols {
        column-width: 15em;
        column-gap: 2em;   /* shown in yellow */
        column-rule: 1px solid gray;
        padding: 5px;      /* shown in blue */
    }
</style>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clubs index large-9 medium-8 columns content">

    <div id="tagCloud" style="width: 50%; height: 200px; display: block; float: left "></div>



    <div class="cols" style="width: 50%; display: block;float: left">
        <ul>
        <?php foreach ($clubs as $club) : ?>
        <li>
            <?= $this->Html->link($club->name, [ 'controller'=>'clubs', 'action'=>'view', $club->id] ) ?>
        </li>
        <?php endforeach ?>
        </ul>
    </div>



<?= $this->Html->scriptStart(['inline'=>false, 'safe'=>false]) ?>
//<script type="javascript">
<?php
foreach ($count as $id=>$skillCount) {
    $words[] = [
        'text'=>$skillCount['title'],
        'weight'=> $skillCount['count'],
        'link' => $this->Url->build(['controller'=>'skills', 'action'=>'view', $id ]),
        'html' => [ 'title' => $skillCount['count'] . ' club' . ($skillCount['count']==1 ? '' : 's') ]
    ];
}
?>
var words = <?= json_encode($words) ?>;
$(document).ready( function() {
    $("#tagCloud").jQCloud(words);
});
//</script>
<?= $this->Html->scriptEnd() ?>
</div>