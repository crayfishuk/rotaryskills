<div class="row">

    <?= $this->Ui->boxStart(__('Edit User Information'), 8) ?>
    <?= $this->Form->create($user) ?>
    <fieldset>

        <?php
            echo $this->Form->input('last_name');
            echo $this->Form->input('first_name');
            echo $this->Form->input('club_id', ['options' => $clubs]);
            echo $this->Form->input('approved');
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            if ($authIsAdmin) {
                echo $this->Form->input('admin');
                echo $this->Form->input('club_admin');
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?= $this->Ui->boxEnd(); ?>

    <?= $this->Ui->boxStart(__('About Users'), 4); ?>
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
