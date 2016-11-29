<?php if (!empty($Auth)) : ?>
<div class="user-panel" style="height: 4em">
    <div class="pull-left info">
        <p><?= $Auth['full_name'] ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Logged In</a>
    </div>
</div>
<?php endif; ?>