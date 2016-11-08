<?= $this->Html->css('jqcloud.min.css', ['block' => true]) ?>
<?= $this->Html->script('jqcloud.min.js', ['block' => true]) ?>

<style>
    div.cols {
        column-width: 15em;
        column-gap: 2em; /* shown in yellow */
        column-rule: 1px solid gray;
        padding: 5px; /* shown in blue */
    }
</style>

<div class="clubs index large-9 medium-8 columns content">

    <div id="tagCloud" style="width: 50%; height: 600px; display: block; float: left "></div>


    <div class="cols" style="width: 50%; display: block;float: left">
        <ul>
            <?php foreach ($clubs as $club) : ?>
                <li>
                    <?= $this->Html->link($club->name, ['controller' => 'clubs', 'action' => 'view', $club->id]) ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>

    <?= $this->Html->scriptStart(['block'=>true]) ?>
        <?php
        // See http://mistic100.github.io/jQCloud/index.html
        foreach ($count as $id => $skillCount) {
            $words[] = [
                'text' => $skillCount['title'],
                'weight' => $skillCount['count'],
                'link' => $this->Url->build(['controller' => 'skills', 'action' => 'view', $id]),
                'html' => ['title' => $skillCount['count'] . ' club' . ($skillCount['count'] == 1 ? '' : 's')]
            ];
        }

        ?>
        var words = <?= json_encode($words) ?>;
        jQuery(document).ready(function () {
            jQuery("#tagCloud").jQCloud(words);
        });
    <?= $this->Html->scriptEnd() ?>

</div>
