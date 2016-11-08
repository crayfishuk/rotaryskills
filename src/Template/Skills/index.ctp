
<div class="skills index large-9 medium-8 columns content">
    <h3><?= __('Skills') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('User.username') ?></th>
                <!--<th scope="col">--><?//= $this->Paginator->sort('created') ?><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($skills as $skill): ?>
            <tr>
                <td><?= h($skill->title) ?></td>
                <td><?= h($skill->description) ?></td>
                <td><?= $skill->has('user') ? $this->Html->link($skill->user->username, ['controller' => 'Users', 'action' => 'view', $skill->user->id]) : '' ?></td>
                <!--<td>--><?//= h($skill->created) ?><!--</td>-->
                <td><?= h($skill->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $skill->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skill->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>
