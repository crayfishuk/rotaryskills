<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\User[] $users */ ?>

<div class="row">

    <?= $this->Ui->boxStart(__('Users'), 8) ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('username') ?></th>
            <th class="hidden-for-medium-down" scope="col"><?= $this->Paginator->sort('last_name') ?></th>
            <th class="hidden-for-medium-down" scope="col"><?= $this->Paginator->sort('first_name') ?></th>
            <th scope="col"><?= __('Status') ?></th>
            <th scope="col" class="visible-lg"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="visible-lg"><?= $this->Paginator->sort('club_id') ?></th>
            <?php if ($Auth['admin']) : ?>
                <th scope="col"><?= __('Actions') ?></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td ><?= $this->Html->link(
                        $user->username,
                        ['action' => ($Auth['club_admin'] || $Auth['admin']) ? 'edit' : 'view', $user->id]) ?></td>
                <td class="hidden-for-medium-down"><?= h($user->last_name) ?></td>
                <td class="hidden-for-medium-down"><?= h($user->first_name) ?></td>
                <td>
                    <?= $user->approved ? $this->Ui->label(['Approved' => 'green']) :
                        $this->Ui->label(['Pending' => 'orange']) ?>
                    <?= $user->club_admin ? $this->Ui->label(['ClubAdmin' => 'lime']) : '' ?>
                    <?= $user->admin ? $this->Ui->label(['Admin' => 'yellow']) : '' ?>
                </td>
                <td class="visible-lg">
                    <?= h($user->modified) ?>
                </td>
                <td class="visible-lg">
                    <?= $user->has('club') ?
                        $this->Html->link($user->club->name, ['controller' => 'Clubs', 'action' => 'view', $user->club->id]) :
                        '' ?></td>
                <?php if ($Auth['admin']) : ?>
                    <td>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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

    <?= $this->Ui->boxStart(__('About Users'), 4); ?>
    <p>
        Users with accounts that are approved can login and get access to club contact details.
    </p>
    <p> A user marked as 'ClubAdmin' here can create and edit Skills and their own Club skills.
    </p>
    <?= $this->Ui->boxEnd(); ?>

</div>
