<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\Club $club */ ?>
<?php /** @var \App\Model\Entity\User $Auth */ ?>

<div class="col-md-6">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Club Information</h3>
        </div>
        <div class="box-body">
            <div class="">
                <?= $this->Text->autoParagraph(h($club->description)); ?>
            </div>
            <ul class="list-group list-group-unbordered">
                <?php if (!empty($club->url)) : ?>
                    <li class="list-group-item"><i class="fa fa-globe"></i> <?= __('Club Website') ?>
                        <?= $this->Html->link($club->url, 'http://' . $club->url, ['class' => 'pull-right']) ?>
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
                echo $this->Html->link(__('Edit Club'), ['action' => 'edit', $club->id], ['class' => 'btn btn-success']);
            } ?>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Club\'s Skills') ?></h3>
        </div>
        <div class="box-body">
            <p>The club has published the following skills. Click/tap on a skill for more information.</p>
            <?php if (empty($club->skills)): ?>
                <p><?= __("No skills listed yet") ?></p>
            <?php else: ?>
                <?php foreach ($club->skills as $skills): ?>
                    <?= $this->Html->link(
                        $skills->title,
                        ['controller' => 'skills', 'action' => 'view', $skills->id],
                        ['class' => "btn btn-info", 'style' => 'margin-bottom:1rem']) ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
