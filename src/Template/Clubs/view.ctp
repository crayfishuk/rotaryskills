<div class="content">
<div class="clubs view large-9 medium-8 columns col-md-8">
    <h3><?= h($club->name) ?></h3>
    <table class="table vertical-table">

        <!--<tr>-->
        <!--    <th scope="row">--><?//= __('Created') ?><!--</th>-->
        <!--    <td>--><?//= h($club->created) ?><!--</td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <th scope="row">--><?//= __('Modified') ?><!--</th>-->
        <!--    <td>--><?//= h($club->modified) ?><!--</td>-->
        <!--</tr>-->
    </table>
    <div class="">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($club->description)); ?>
    </div>
    <div class="">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($club->url)); ?>
    </div>
    <div class="related">
        <h4><?= __('Created By') ?></h4>
        <?php if (!empty($club->users)): ?>
        <table cellpadding="0" cellspacing="0" class="table">
            <tr>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Approved') ?></th>
                <th scope="col"><?= __('Club Admin') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>

            </tr>
            <?php foreach ($club->users as $users): ?>
            <tr>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->approved ? 'Y':'') ?></td>
                <td><?= h($users->club_admin? 'Y':'') ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->email) ?></td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Skills') ?></h4>
        <?php if (!empty($club->skills)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Creator') ?></th>

            </tr>
            <?php foreach ($club->skills as $skills): ?>
            <tr>
                <td><?= $this->Html->link(h($skills->title), ['controller'=>'skills', 'action'=>'view', $skills->id]) ?></td>
                <td><?= h($skills->description) ?></td>
                <td><?= h($skills->user->username) ?></td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
    <div class="clearfix"></div>
</div>