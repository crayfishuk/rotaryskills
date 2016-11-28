<?php
/** @var $this App\View\AppView */
/** @var $clubs App\Model\Entity\Club[] */
?>


<div class="row">

    <?= $this->Ui->boxStart(__('Clubs'), 8) ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_count', __('Users')) ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <?php if ($authIsAdmin) : ?>
                <th scope="col" class="actions"><?= __('Admin Actions') ?></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clubs as $club): ?>
            <tr>
                <td><?= $this->Html->link(h($club->name), ['action' => 'view', $club->id]) ?></td>
                <td><?= h($club->user_count) ?></td>
                <td><?= $this->Time->nice( $club->modified ) ?></td>
                <?php if ($authIsAdmin) : ?>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $club->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?>
                    </td>
                <?php endif; ?>
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
    <?= $this->Ui->boxEnd(); ?>

    <?= $this->Ui->boxStart(__('About Clubs'), 4); ?>
    <p>This section lists all the Clubs that the system knows about.</p>
    <p>Users associated with a club can add Skills for the Club,
        and the Club Administrator can amend details about the club as well as maintain the Users within the Club.
    </p>
    <?= $this->Ui->boxEnd(); ?>

</div>
