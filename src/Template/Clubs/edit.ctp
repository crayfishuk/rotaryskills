<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\Club $club */ ?>



<?= $this->Ui->boxStart(__('Edit Club Information'), 7) ?>
<?= $this->Form->create($club) ?>
<fieldset>

    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->input('url', ['label' => 'website']);
    echo $this->Form->input('contact_name');
    echo $this->Form->input('contact_email');
    echo $this->Form->input('contact_phone');

    echo $this->Form->input('skills._ids', ['options' => $skills, 'style' => 'width:100%']);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
<?= $this->Ui->boxEnd(); ?>

<?= $this->Ui->boxStart(__('About Club Information'), 5); ?>
<p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur arcu erat, accumsan id imperdiet et,
    porttitor at sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec
    velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
</p>
<?= $this->Ui->boxEnd(); ?>

<?= $this->Ui->boxStart(__('Users'), 5); ?>

<table class="table">

    <?php foreach ($club->users as $user) : ?>
        <tr>
            <td>
                <?= $this->Html->link($user->full_name,
                                      ['controller' => 'users', 'action' => 'edit', $user->id]) ?>
            </td>
            <td>
                <?php if ($user->approved) {
                    $labels = ['Approved' => 'green'];
                    if ($user->club_admin) $labels += ['ClubAdmin' => 'blue'];
                    echo $this->Ui->label($labels);
                } else {
                    echo $this->Html->link(__('Approve'),
                                           ['controller' => 'users', 'action' => 'approve', $user->id]);
                } ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?= $this->Ui->boxEnd(); ?>


