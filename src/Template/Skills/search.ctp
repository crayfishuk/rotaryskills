<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\Skill[] $skills */ ?>

<?= $this->Ui->boxStart('Search Results') ?>

<?= $this->Form->create() ?>

<?= $this->Form->input('needle', ['placeholder' => 'Text to search for...', 'label' => false, 'style' => 'width: 30em; float:left; margin-right:2em']) ?>
<?= $this->Form->submit('Search', ['style' => 'float:left;']) ?>

<div class="clearfix"></div>

<?php if (isset($moreInfo)) : ?>
    <hr/>
    <p>You'll need to enter more text into the search box; the search is too general.</p>
    <?php return; ?>
<?php endif; ?>

<?php if (!count($skills)) : ?>
    <hr/>
    <p>No search results found. Try a different search...</p>
    <?php return; ?>
<?php endif; ?>

<?php foreach ($skills as $skill) : ?>

    <h3>
        <?= $this->Ui->button(__('View Skill info'), ['action' => 'view', $skill->id], ['type' => 'info']) ?>
        <?= $this->Text->highlight(
            $skill->title,
            $needle,
            ['format' => '<b>\1</b>']) ?>
        <?php $clubs = ( (1==($count=count($skill->clubs))) ? "$count club" : "$count clubs" ); ?>
        <?= $this->Ui->label( [$clubs => ($count ? 'green' : 'red')]) ?>
    </h3>
    <p><?= $this->Text->highlight(
            $skill->description,
            $needle,
            ['format' => '<b>\1</b>']) ?></p>

    <hr/>
<?php endforeach; ?>

<?= $this->Ui->boxEnd() ?>
<div class="clearfix"></div>
