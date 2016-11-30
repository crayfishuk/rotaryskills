<?php /** @var \App\View\AppView $this */ ?>

<?= $this->Form->create('Search', ['url'=>['controller'=>'skills', 'action'=>'search']]) ?>
    <div class="input-group">
        <input type="text" name="needle" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
        </span>
    </div>
<?= $this->Form->end() ?>
