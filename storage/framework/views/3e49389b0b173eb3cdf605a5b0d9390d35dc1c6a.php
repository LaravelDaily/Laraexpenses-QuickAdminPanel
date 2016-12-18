<?php $request = app('Illuminate\Http\Request'); ?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="<?php echo e($request->segment(1) == 'expenses' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('expenses.index')); ?>">
                    <i class="fa fa-arrow-circle-left"></i>
                    <span class="title">Expenses</span>
                </a>
            </li>
            <li class="<?php echo e($request->segment(1) == 'incomes' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('incomes.index')); ?>">
                    <i class="fa fa-arrow-circle-right"></i>
                    <span class="title">Incomes</span>
                </a>
            </li>
            <li class="<?php echo e($request->segment(1) == 'monthly_reports' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('monthly_reports.index')); ?>">
                    <i class="fa fa-line-chart"></i>
                    <span class="title">Monthly Report</span>
                </a>
            </li>
            <li>
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span class="title">Settings</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="<?php echo e($request->segment(1) == 'expenses_categories' ? 'active active-sub' : ''); ?>">
                                    <a href="<?php echo e(route('expenses_categories.index')); ?>">
                                        <i class="fa fa-list-ul"></i>
                                        <span class="title">
                                            Expenses Categories
                                        </span>
                                    </a>
                                </li>
                                <li class="<?php echo e($request->segment(1) == 'incomes_categories' ? 'active active-sub' : ''); ?>">
                                    <a href="<?php echo e(route('incomes_categories.index')); ?>">
                                        <i class="fa fa-list-ul"></i>
                                        <span class="title">
                                            Incomes Categories
                                        </span>
                                    </a>
                                </li>
                                </ul>
                    </li>
                                    <li>
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span class="title">Manage Users</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="<?php echo e($request->segment(1) == 'roles' ? 'active active-sub' : ''); ?>">
                                    <a href="<?php echo e(route('roles.index')); ?>">
                                        <i class="fa fa-key"></i>
                                        <span class="title">
                                            Roles
                                        </span>
                                    </a>
                                </li>
                                <li class="<?php echo e($request->segment(1) == 'users' ? 'active active-sub' : ''); ?>">
                                    <a href="<?php echo e(route('users.index')); ?>">
                                        <i class="fa fa-gears"></i>
                                        <span class="title">
                                            Users
                                        </span>
                                    </a>
                                </li>
                                <li class="<?php echo e($request->segment(1) == 'user_actions' ? 'active active-sub' : ''); ?>">
                                    <a href="<?php echo e(route('user_actions.index')); ?>">
                                        <i class="fa fa-gears"></i>
                                        <span class="title">
                                            User actions
                                        </span>
                                    </a>
                                </li>
                                </ul>
                    </li>
                                    

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

<button type="submit">Logout</button>
<?php echo Form::close(); ?>