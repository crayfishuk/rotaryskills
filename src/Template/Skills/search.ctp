<?php /** @var \App\View\AppView $this */ ?>
<?php /** @var \App\Model\Entity\Skill[] $skills */ ?>

<?= $this->Ui->boxStart('Search Results') ?>

<?php foreach ($skills as $skill) : ?>

    <h3><?= $this->Text->highlight(
        $skill->title,
        $needle,
        ['format' => '<b>\1</b>']) ?></h3>
    <p><?= $this->Text->highlight(
        $skill->description,
        $needle,
        ['format' => '<b>\1</b>']) ?></p>

    <hr/>
<?php endforeach; ?>

<?= $this->Ui->boxEnd() ?>
