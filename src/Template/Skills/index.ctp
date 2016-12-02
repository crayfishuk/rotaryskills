<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\Skill[] $skills */ ?>

<div class="row">

    <?= $this->Ui->boxStart(__('Skills'), 8) ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('description') ?></th>
            <th scope="col" class="visible-md"><?= $this->Paginator->sort('modified', ['label' => 'Updated']) ?></th>

            <?php if ($authIsAdmin) : ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($skills as $skill): ?>
            <tr>
                <td>
                    <?= $this->Html->link($skill->title, ['action' => 'view', $skill->id]) ?>
                    <?= !$skill->approved ? $this->Ui->label(['Pending' => 'orange']) : '' ?>
                </td>
                <td style="max-width:40rem"><?= $this->Text->truncate($skill->description, 40) ?></td>
                <td class="visible-md"><?= $this->Time->nice($skill->modified) ?></td>

                <?php if ($authIsAdmin) : ?>
                    <td>
                        <?= $this->Ui->button(__('Edit'), ['action' => 'edit', $skill->id], ['size' => 'xs']) ?>
                        <?= $this->Ui->button(__('Approve'), ['action' => 'approve', $skill->id], ['size' => 'xs']) ?>
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

    <?= $this->Ui->boxStart('Available Actions', 4); ?>
    <?= $this->Ui->button(__('Add a New Skill'), ['action' => 'add']) ?>
    <?= $this->Ui->button(__('Search for a Skill'), ['action' => 'search']) ?>
    <?= $this->Ui->boxEnd() ?>

    <?= $this->Ui->boxStart(__('About Skills'), 4); ?>
    <p>The Skills listed have all been offered by clubs within the District as skills that they can use to help Rotary
        and other Rotary Clubs.
    </p>
    <p>Club Administrators can create new Skills entries in the list - and they can be advertised by their own club.
        Once approved by one of the Administrators, these skills can be used by other clubs too.</p>
    <p>Skills marked as<?= $this->Ui->label(['Pending'=>'orange']) ?> are only available to the club that created them.</p>
    <?= $this->Ui->boxEnd(); ?>

</div>
