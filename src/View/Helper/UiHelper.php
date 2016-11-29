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

    /**
     * Create an (optionally titled) box with n notional columns.
     *
     * Default to 'md' type unless specified otherwise
     *
     * @param null   $title
     * @param int    $cols
     * @param string $size
     * @return string
     */
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
     * Return the HTML to close the boxStart'ed box.
     *
     * @return string
     */
    public function boxEnd()
    {
        return <<< EOT

</div><!-- box-body --> 
</div><!-- box -->
</div><!-- col -->
EOT;

    }

    /**
     * Display one or more labels in coloured tags - return an HTML segment
     *
     * Takes a single pair or an array. So either (text,colour) or [text=>colour,...]
     *
     * @param        $labels
     * @param string $color
     * @return string
     */
    public function label($labels, $color = "green")
    {
        if (($noWrap = !is_array($labels))) {
            $labels = [$labels => $color];
        }

        $op = '';
        foreach ($labels as $label => $color) {
            $op .= "<small class='label pull-right bg-$color' style='margin-left:0.6em'>$label</small>";
        }

        if (!$noWrap) {
            $op = $this->Html->tag('span', $op, ['class' => 'pull-right-container']);
        }
        return $op;
    }

    public function button($text, $url, $options = [])
    {
        // Set the default type and size
        $options = array_merge(['type' => 'default', 'size' => ''], $options);

        // Add any new classes to passed in class
        $class = "btn btn-" . ($options['type']) . ' ' .
            (!empty($options['size']) ? 'btn-' . $options['size'] . ' ' : '') .
            (isset($options['class']) ? $options['class'] : '');

        // Clear the used options - all others get passed through to the Htmlhelper
        unset($options['size'],$options['type']);

        $options['class'] = $class;
        return $this->Html->link($text, $url, $options);
    }

}