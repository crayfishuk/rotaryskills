<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('last_name');
            echo $this->Form->input('first_name');
            echo $this->Form->input('approved');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password'); ?>
    </fieldset>
    <?php if ($authIsAdmin) : ?>
    <fieldset>
        <legend>Admin Only</legend>
        <?php
            echo $this->Form->input('club_id', ['options' => $clubs]);
            echo $this->Form->input('club_admin');
            echo $this->Form->input('admin');
        ?>
    </fieldset>
    <?php endif; ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
