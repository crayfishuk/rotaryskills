<?php
/**
 * Created by PhpStorm.
 * User: Craig
 * Date: 24/09/16
 * Time: 12:57
 **/?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ></li>
<li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
</ul>
</nav>
<div class="clubs index large-9 medium-8 columns content">
<h3><?= __('Skills') ?></h3>


    <h4>Tag Cloud of Skills</h4>

    <h4>Tag Cloud of Clubs</h4>
</div>
