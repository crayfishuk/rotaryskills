<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skills view large-9 medium-8 columns content">
    <h3><?= h($skill->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($skill->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($skill->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $skill->has('user') ? $this->Html->link($skill->user->username, ['controller' => 'Users', 'action' => 'view', $skill->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($skill->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($skill->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($skill->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clubs') ?></h4>
        <?php if (!empty($skill->clubs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($skill->clubs as $clubs): ?>
            <tr>
                <td><?= h($clubs->id) ?></td>
                <td><?= h($clubs->name) ?></td>
                <td><?= h($clubs->description) ?></td>
                <td><?= h($clubs->url) ?></td>
                <td><?= h($clubs->created) ?></td>
                <td><?= h($clubs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clubs', 'action' => 'view', $clubs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clubs', 'action' => 'edit', $clubs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clubs', 'action' => 'delete', $clubs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clubs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
