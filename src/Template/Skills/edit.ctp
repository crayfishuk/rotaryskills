<div class="row">

    <?= $this->Ui->boxStart(__('Edit Skill Information'), 8) ?>
    <?= $this->Form->create($skill) ?>

    <?= $this->Form->input('title'); ?>
    <?= $this->Form->input('description', ['type' => 'textarea']); ?>

    <fieldset>
        <legend>Admin Only</legend>
        <?php
        if ($authIsAdmin) {
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'Creator']);
            echo $this->Form->input('clubs._ids', ['options' => $clubs, 'style' => 'width:80%']);
        } else {
            echo "<b>Created by</b>" . $skill->User->full_name;
        }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
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
