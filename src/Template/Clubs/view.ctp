<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\User $Auth */ ?>
<?php /** @var \App\Model\Entity\Club $club */ ?>

<?= $this->Ui->boxStart('Club Information', 6) ?>

    <div class="">
        <?= $this->Text->autoParagraph(h($club->description)); ?>
    </div>
    <ul class="list-group list-group-unbordered">
        <?php if (!empty($club->url)) : ?>
            <li class="list-group-item"><i class="fa fa-globe"></i> <?= __('Club Website') ?>
                <?= $this->Html->link($club->url, 'http://' . $club->url, ['class' => 'pull-right', 'target'=>'_blank']) ?>
            </li>
        <?php endif ?>


        <?php if (!empty($Auth)) : ?>
            <li class="list-group-item"><i class="fa fa-phone"></i> <?= __("Phone") ?>
                <?= $this->Html->link($club->contact_phone, 'tel:' . $club->contact_phone, ['class' => 'pull-right']) ?>
            </li>
            <li class="list-group-item"><i class="fa fa-envelope"></i> <?= __("Email") ?>
                <?= $this->Html->link($club->contact_email, 'mailto:' . $club->contact_email, ['class' => 'pull-right']) ?>
            </li>
        <? else: ?>
            <li class="list-group-item"><i class="fa fa-phone"></i> <?= __("Phone") ?>
                <?= $this->Html->link(__('Login to view'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'pull-right']) ?>
            </li>
            <li class="list-group-item"><i class="fa fa-envelope"></i> <?= __("Email") ?>
                <?= $this->Html->link(__('Login to view'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'pull-right']) ?>
            </li>
        <?php endif; ?>

    </ul>

    <strong><i class="fa fa-user-circle-o"></i> <?= __('Administrators') ?></strong>
    <p><?= $clubAdmins ?></p>
    <strong><i class="fa fa-users"></i> <?= __('Users') ?></strong>
    <p><?= $users ?></p>

<?php if ($authIsClubAdmin) {
    echo $this->Ui->button(__('Edit Club'), ['action' => 'edit', $club->id]);
} ?>

<?= $this->Ui->boxEnd() ?>

<?= $this->Ui->boxStart(__("Club's Skills"), 6) ?>

    <p>The club has published the following skills. Click/tap on a skill for more information.</p>
    <p>'Locked' skills are only available to your Club until approved.</p>

<?php if (empty($club->skills)): ?>
    <p><?= __("No skills listed yet") ?></p>
<?php else: ?>
    <?php foreach ($club->skills as $skill): ?>
        <?= $this->Ui->button(
            $skill->approved ? $skill->title : '<i class="fa fa-lock"></i> ' . $skill->title,
            ['controller' => 'skills', 'action' => 'view', $skill->id],
            [
                'escape' => false,
                'type'   => $skill->approved ? 'info' : 'warning',
                'style'  => 'margin-bottom:1rem']) ?>
    <?php endforeach; ?>
<?php endif; ?>

<?= $this->Ui->boxEnd() ?>