<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\Skill $skill */ ?>

<?php $this->assign('title', __('Skill') . ': ' . $skill->title) ?>

<?= $this->Ui->boxStart(null, 6) ?>

    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td>
                <?= h($skill->title) ?>
                <?= $skill->approved ? $this->Ui->label('Approved') : $this->Ui->label('Pending', 'orange') ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= $this->Text->autoParagraph($skill->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created by') ?></th>
            <td>
                <?php if ($skill->has('user')) {
                    echo $skill->user->full_name;
                    if ($skill->user->has('club')) {
                        echo ' (' .
                            $this->Html->link(
                                $skill->user->club->name,
                                ['controller' => 'Clubs', 'action' => 'view', $skill->user->club->id]) .
                            ')';
                    }
                }
                ?>
                <?= $this->Time->nice($skill->created) ?>
            </td>
        </tr>
    </table>
<?php if ($authIsAdmin) : ?>
    <?= !$skill->approved ? $this->Ui->button('Approve', ['action' => 'approve', $skill->id]) : '' ?>
<?php endif; ?>
<?php if ($authIsAdmin || $Auth['id'] == $skill->user_id) : ?>
    <?= $this->Ui->button(__('Edit'), ['action' => 'edit', $skill->id]); ?>
<?php endif ?>
<?= $this->Ui->boxEnd() ?>

<?= $this->Ui->boxStart(__('Associated Clubs'), 6) ?>

    <p>The following Clubs are associated with this Skill. </p>
    <p>Click/tap on a club for more information on, or to contact, that club.</p>

<?php if (empty($skill->clubs)): ?>
    <em><?= __("No clubs associated yet.") ?></em>
<?php else: ?>
    <?php foreach ($skill->clubs as $club): ?>
        <?= $this->Html->link(
            $club->name,
            ['controller' => 'clubs', 'action' => 'view', $club->id],
            ['class' => "btn btn-info", 'style' => 'margin-bottom:1rem']) ?>
    <?php endforeach; ?>
<?php endif; ?>

<?= $this->Ui->boxEnd() ?>