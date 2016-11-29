<div class="row">

    <?= $this->Ui->boxStart(__('Edit Skill Information'), 8) ?>
    <?= $this->Form->create($skill) ?>

    <?= $this->Form->input('title'); ?>
    <?= $this->Form->input('description', ['type' => 'textarea']); ?>

    <?php if ($authIsAdmin) : ?>
        <fieldset>
            <legend>Admin Only</legend>
            <?php
            echo $this->Form->input('approved');
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'Creator']);
            echo $this->Form->input('clubs._ids', ['options' => $clubs, 'style' => 'width:80%']);
            ?>
        </fieldset>
    <?php endif; ?>

    <div class="clearfix"><b>Created by </b> <?= $skill->user->full_name ?> </div>
    <div class="clearfix"><b>Last changed </b> <?= $this->Time->nice($skill->modified) ?> </div>


    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Ui->boxEnd(); ?>

    <?= $this->Ui->boxStart(__('About Skills'), 4); ?>
    <p>
        Only Admin users and the creator of a Skill can amend these details.
    </p>
    <p>
        Please make the description as full as possible. It will be used for searching by users of the site.
    </p>
    <p>
        Skills that are <em>unapproved</em> may only be associated with the skill creator's Club until they have been
        approved by an Admin.
    </p>
    <?= $this->Ui->boxEnd(); ?>

</div>
