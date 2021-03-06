<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
    ?>
    <ul class="sidebar-menu">
        <!--<li class="header">MAIN NAVIGATION</li>-->

        <li><a href="<?= $this->Url->build('/'); ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>

        <?php if (empty($Auth)) : ?>
            <li><a href="<?= $this->Url->build('/skills/index'); ?>"><i class="fa fa-check-square-o"></i> Skills</a>
        <?php else : ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-check-square-o"></i> <span>Skills</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= $this->Url->build('/skills/index'); ?>"><i class="fa fa-search"></i> View
                            Skills</a>
                    </li>
                    <?php if ($authIsAdmin || $Auth['club_admin']) : ?>
                        <li><a href="<?= $this->Url->build('/skills/index/' . $Auth['id']); ?>">
                                <i class="fa fa-search"></i> My Skills</a></li>
                        <li><a href="<?= $this->Url->build('/skills/add'); ?>"><i class="fa fa-plus"></i> Add a
                                Skill</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if (empty($Auth)) : ?>
            <li><a href="<?= $this->Url->build('/clubs/index'); ?>"><i class="fa fa-users"></i> Clubs</a>
        <?php else : ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Clubs</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= $this->Url->build('/clubs/index'); ?>"><i class="fa fa-search"></i> View Clubs</a>
                    </li>
                    <?php if (!empty($Auth)) : ?>
                        <li><a href="<?= $this->Url->build('/clubs/view/' . $Auth['club_id']); ?>"><i
                                        class="fa fa-search"></i> My Club </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($authIsAdmin) : ?>
                        <li><a href="<?= $this->Url->build('/clubs/add'); ?>"><i class="fa fa-plus"></i> Add</a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if ($authIsAdmin || $Auth['club_admin']) : ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= $this->Url->build('/users/index'); ?>"><i class="fa fa-search"></i> View</a>
                    </li>
                    <li><a href="<?= $this->Url->build('/users/add'); ?>"><i class="fa fa-plus"></i> Add</a></li>
                </ul>
            </li>
        <?php endif; ?>


        <!--<li class="treeview">-->
        <!--    <a href="#">-->
        <!--        <i class="fa fa-files-o"></i>-->
        <!--        <span>Layout Options</span>-->
        <!--        <span class="label label-primary pull-right">4</span>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/layout/top-nav'); ?><!--"><i class="fa fa-circle-o"></i> Top Navigation</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/layout/boxed'); ?><!--"><i class="fa fa-circle-o"></i> Boxed</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/layout/fixed'); ?><!--"><i class="fa fa-circle-o"></i> Fixed</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/layout/collapsed-sidebar'); ?><!--"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li>-->
        <!--    <a href="--><?php //echo $this->Url->build('/pages/widgets'); ?><!--">-->
        <!--        <i class="fa fa-th"></i> <span>Widgets</span>-->
        <!--        <small class="label pull-right bg-green">Hot</small>-->
        <!--    </a>-->
        <!--</li>-->
        <!--<li class="treeview">-->
        <!--    <a href="#">-->
        <!--        <i class="fa fa-pie-chart"></i>-->
        <!--        <span>Charts</span>-->
        <!--        <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/charts/chartjs'); ?><!--"><i class="fa fa-circle-o"></i> ChartJS</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/charts/morris'); ?><!--"><i class="fa fa-circle-o"></i> Morris</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/charts/flot'); ?><!--"><i class="fa fa-circle-o"></i> Flot</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/charts/inline'); ?><!--"><i class="fa fa-circle-o"></i> Inline charts</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li class="treeview">-->
        <!--    <a href="#">-->
        <!--        <i class="fa fa-laptop"></i>-->
        <!--        <span>UI Elements</span>-->
        <!--        <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/ui/general'); ?><!--"><i class="fa fa-circle-o"></i> General</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/ui/icons'); ?><!--"><i class="fa fa-circle-o"></i> Icons</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/ui/buttons'); ?><!--"><i class="fa fa-circle-o"></i> Buttons</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/ui/sliders'); ?><!--"><i class="fa fa-circle-o"></i> Sliders</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/ui/timeline'); ?><!--"><i class="fa fa-circle-o"></i> Timeline</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/ui/modals'); ?><!--"><i class="fa fa-circle-o"></i> Modals</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li class="treeview">-->
        <!--    <a href="#">-->
        <!--        <i class="fa fa-edit"></i> <span>Forms</span>-->
        <!--        <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/forms/general'); ?><!--"><i class="fa fa-circle-o"></i> General Elements</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/forms/advanced'); ?><!--"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/forms/editors'); ?><!--"><i class="fa fa-circle-o"></i> Editors</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li class="treeview">-->
        <!--    <a href="#">-->
        <!--        <i class="fa fa-table"></i> <span>Tables</span>-->
        <!--        <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/tables/simple'); ?><!--"><i class="fa fa-circle-o"></i> Simple tables</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/tables/data'); ?><!--"><i class="fa fa-circle-o"></i> Data tables</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li>-->
        <!--    <a href="--><?php //echo $this->Url->build('/pages/calendar'); ?><!--">-->
        <!--        <i class="fa fa-calendar"></i> <span>Calendar</span>-->
        <!--        <small class="label pull-right bg-red">3</small>-->
        <!--    </a>-->
        <!--</li>-->
        <!--<li class="treeview">-->
        <!--    <a href="#">-->
        <!--        <i class="fa fa-envelope"></i> <span>Mailbox</span>-->
        <!--        <small class="label pull-right bg-yellow">12</small>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/mailbox/mailbox'); ?><!--">Inbox <span class="label label-primary pull-right">13</span></a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/mailbox/compose'); ?><!--">Compose</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/mailbox/read-mail'); ?><!--">Read</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li class="treeview">-->
        <!--    <a href="#">-->
        <!--        <i class="fa fa-folder"></i> <span>Examples</span>-->
        <!--        <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/starter'); ?><!--"><i class="fa fa-circle-o"></i> Starter</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/invoice'); ?><!--"><i class="fa fa-circle-o"></i> Invoice</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/profile'); ?><!--"><i class="fa fa-circle-o"></i> Profile</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/login'); ?><!--"><i class="fa fa-circle-o"></i> Login</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/register'); ?><!--"><i class="fa fa-circle-o"></i> Register</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/lockscreen'); ?><!--"><i class="fa fa-circle-o"></i> Lockscreen</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/404'); ?><!--"><i class="fa fa-circle-o"></i> 404 Error</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/500'); ?><!--"><i class="fa fa-circle-o"></i> 500 Error</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/blank'); ?><!--"><i class="fa fa-circle-o"></i> Blank Page</a></li>-->
        <!--        <li><a href="-->
        <?php //echo $this->Url->build('/pages/examples/pace'); ?><!--"><i class="fa fa-circle-o"></i> Pace Page</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li class="treeview">-->
        <!--    <a href="#">-->
        <!--        <i class="fa fa-share"></i> <span>Multilevel</span>-->
        <!--        <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>-->
        <!--        <li>-->
        <!--            <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>-->
        <!--            <ul class="treeview-menu">-->
        <!--                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>-->
        <!--                <li>-->
        <!--                    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>-->
        <!--                    <ul class="treeview-menu">-->
        <!--                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>-->
        <!--                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>-->
        <!--                    </ul>-->
        <!--                </li>-->
        <!--            </ul>-->
        <!--        </li>-->
        <!--        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li><a href="-->
        <?php //echo $this->Url->build('/pages/documentation'); ?><!--"><i class="fa fa-book"></i> <span>Documentation</span></a></li>-->
        <!--<li class="header">LABELS</li>-->
        <!--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>-->
        <!--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>-->
        <?php if (empty($Auth)) : ?>
            <li><a href="<?= $this->Url->build('/users/login') ?>"><i class="fa fa-unlock"></i>
                    <span>Login</span></a>
            </li>
        <?php else : ?>
            <li><a href="<?= $this->Url->build('/users/logout') ?>"><i class="fa fa-lock"></i>
                    <span>Logout</span></a>
            </li>
        <?php endif; ?>
        <!--<li><a href="-->
        <?php //echo $this->Url->build('/pages/debug'); ?><!--"><i class="fa fa-bug"></i> Debug</a></li>-->
    </ul>
<?php } ?>
