@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'expenses' ? 'active' : '' }}">
                <a href="{{ route('expenses.index') }}">
                    <i class="fa fa-arrow-circle-left"></i>
                    <span class="title">Expenses</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'incomes' ? 'active' : '' }}">
                <a href="{{ route('incomes.index') }}">
                    <i class="fa fa-arrow-circle-right"></i>
                    <span class="title">Income</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'monthly_reports' ? 'active' : '' }}">
                <a href="{{ route('monthly_reports.index') }}">
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
                                <li class="{{ $request->segment(1) == 'expenses_categories' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('expenses_categories.index') }}">
                                        <i class="fa fa-list-ul"></i>
                                        <span class="title">
                                            Expenses Categories
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'incomes_categories' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('incomes_categories.index') }}">
                                        <i class="fa fa-list-ul"></i>
                                        <span class="title">
                                            Income Categories
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
                                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('roles.index') }}">
                                        <i class="fa fa-key"></i>
                                        <span class="title">
                                            Roles
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('users.index') }}">
                                        <i class="fa fa-gears"></i>
                                        <span class="title">
                                            Users
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'user_actions' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('user_actions.index') }}">
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
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}