<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Skills'), ['controller' => 'Skills', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['controller' => 'Skills', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('last_name');
            echo $this->Form->input('first_name');
            echo $this->Form->input('club_id', ['options' => $clubs]);
            echo $this->Form->input('approved');
            echo $this->Form->input('club_admin');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('admin');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
