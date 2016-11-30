<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\Skill[] $skills */ ?>

<div class="row">

    <?= $this->Ui->boxStart(__('Skills'), 8) ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('description') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Updated']) ?></th>

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
                    <?= !$skill->approved ? $this->Ui->label(['Pending'=>'orange']) : '' ?>
                </td>
                <td style="max-width:40rem"><?= $this->Text->truncate($skill->description, 40) ?></td>
                <td><?= $this->Time->nice($skill->modified) ?></td>

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

    <?= $this->Ui->boxStart(__('About Skills'), 4); ?>
    <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur arcu erat, accumsan id imperdiet et,
        porttitor at sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec
        velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Praesent sapien massa, convallis a
        pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
        cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus
        nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia
        in, elementum id enim. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ante ipsum primis in faucibus
        orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit
        amet ligula.
    </p>
    <?= $this->Ui->boxEnd(); ?>

</div>
