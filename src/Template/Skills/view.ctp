<div class="content">
<div class="skills view large-9 medium-8 columns content col-md-8">
    <h3><?= h($skill->title) ?></h3>
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($skill->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($skill->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creator') ?></th>
            <td><?= $skill->has('user') ? $this->Html->link($skill->user->username, ['controller' => 'Users', 'action' => 'view', $skill->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($skill->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($skill->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clubs') ?></h4>
        <?php if (!empty($skill->clubs)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Url') ?></th>

            </tr>
            <?php foreach ($skill->clubs as $clubs): ?>
            <tr>
                <td><?= $this->Html->link(h($clubs->name), ['controller'=>'clubs', 'action'=>'view', $clubs->id]) ?></td>
                <td><?= h($clubs->description) ?></td>
                <td><?= h($clubs->url) ?></td>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
    <div class="clearfix"></div>
</div>
