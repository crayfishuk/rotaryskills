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
 * @property Html HtmlHelper
 */
class UiHelper extends Helper
{

    /**
     * @var HtmlHelper
     */
    public $Html;

    public function boxStart($title = null, $cols = 12)
    {
        $op = "<div class='col-md-$cols'><div class='box'>";

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

    public function boxEnd()
    {
        return <<< EOT

</div><!-- boxbody --> 
</div><!-- box -->
</div><!-- col -->
EOT;

    }
}
