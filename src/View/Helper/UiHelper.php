<?php

namespace App\View\Helper;

use Cake\View\View;
use Cake\Utility\Inflector;
use Cake\View\Helper\HtmlHelper;
use Cake\View\Helper;

/**
 * Class UiHelper
 *
 * @package AdminLTE\View\Helper
 * @property HtmlHelper $Html
 */
class UiHelper extends Helper
{

    public $helpers = ['Html'];

    public function boxStart($title = null, $cols = 12, $size = 'md')
    {
        $op = "<div class='col-$size-$cols'><div class='box'>";

        if ($title) {
            $op .= <<< EOT
<div class="box-header with-border">
    <h3 class="box-title">$title</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
EOT;
        }

        $op .= <<< EOT
<div class="box-body" style = "display: block;" >

EOT;

        return $op;
    }

    /**
     * @return string
     */
    public function boxEnd()
    {
        return <<< EOT

</div><!-- boxbody --> 
</div><!-- box -->
</div><!-- col -->
EOT;

    }

    /**
     * @param        $labels
     * @param string $color
     * @return string
     */
    public function label($labels, $color = "green")
    {
        if ( ($noWrap = !is_array($labels)) ) {
            $labels = [$labels => $color];
        }

        $op = '';
        foreach ($labels as $label => $color) {
            $op .= "<small class='label pull-right bg-$color' style='margin-left:0.6em'>$label</small>";
        }

        if (!$noWrap) {
            $op = $this->Html->tag('span', $op, ['class'=>'pull-right-container']);
        }
        return $op;
    }

}