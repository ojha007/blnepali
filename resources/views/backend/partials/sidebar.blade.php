<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('backend/images/admin-logo.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{auth()->user()->user_name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search"
                        id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="{{request()->routeIs('cms.dashboard') ? 'active' :' '}}">
            <a href="{{route('cms.index')}}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview {{request()->routeIs('cms.news.*') ? 'active':''}}">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>News Management</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{request()->routeIs('cms.news.index') ? 'active':''}}">
                    <a href="{{route('cms.news.index')}}">
                        <i class="fa fa-circle-o"></i>
                        All News
                    </a>
                </li>
                <li class="{{request()->routeIs('cms.news.create') ? 'active':''}}">
                    <a href="{{route('cms.news.create')}}">
                        <i class="fa fa-circle-o"></i>
                        Add News
                    </a>
                </li>
            </ul>
        </li>
{{--        <li class="treeview {{request()->routeIs('cms.categories.*') ? 'active':''}}">--}}
{{--            <a href="#">--}}
{{--                <i class="fa fa-files-o"></i>--}}
{{--                <span>News Category</span>--}}
{{--                <span class="pull-right-container">--}}
{{--                 <i class="fa fa-angle-left pull-right"></i>--}}
{{--                </span>--}}
{{--            </a>--}}
{{--            <ul class="treeview-menu">--}}
{{--                <li class="{{request()->routeIs('cms.categories.index') ? 'active': ''}}">--}}
{{--                    <a href="{{route('cms.categories.index')}}">--}}
{{--                        <i class="fa fa-circle-o"></i>--}}
{{--                        All Category--}}
{{--                    </a></li>--}}
{{--                <li class="{{request()->routeIs('cms.categories.create') ?'active':'' }}">--}}
{{--                    <a href="{{route('cms.categories.create')}}">--}}
{{--                        <i class="fa fa-circle-o"></i>--}}
{{--                        Add Category--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        <li class="treeview {{request()->routeIs('cms.reporters.*') ? 'active':''}}">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Contacts</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>

            <ul class="treeview-menu">
                <li class="{{request()->routeIs('cms.reporters.index') ? 'active': ''}}">
                    <a href="{{route('cms.reporters.index')}}">
                        <i class="fa fa-circle-o"></i>
                        Reporters
                    </a>
                </li>

            </ul>
        </li>


        <li class="{{request()->routeIs('cms.advertisements.*') ? 'active' :''}}">
            <a href="{{route('cms.advertisements.index')}}">
                <i class="fa  fa-sliders"></i> <span>Advertisement</span>
            </a>
        </li>

        {{--        <li class="{{request()->is($urlPrefix.'/comments',$urlPrefix.'/comments/*') ? 'active' :''}}">--}}
        {{--            <a href="{{route($routePrefix.'comments.index')}}">--}}
        {{--                <i class="fa fa-comment" aria-hidden="true"></i> <span>Comments</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        <li class="header">SETTINGS</li>
        {{--        @include('auth::partials.sidebar')--}}
        {{--        <li class="treeview {{request()->is($urlPrefix.'/categories',--}}
        {{--                    $urlPrefix.'/categories/create') ? 'active':''}}">--}}
        {{--            <a href="#">--}}
        {{--                <i class="fa fa-cogs"></i>--}}
        {{--                <span>Settings</span>--}}
        {{--                <span class="pull-right-container">--}}
        {{--                      <i class="fa fa-angle-left pull-right"></i>--}}
        {{--                    </span>--}}
        {{--            </a>--}}
        {{--            @php($settings =['site-settings','email-setting','images-setting'])--}}
        {{--            <ul class="treeview-menu">--}}
        {{--                @foreach($settings as $setting)--}}
        {{--                    <li class="{{request()->is($urlPrefix.'/settings/*') ? 'active': ''}}">--}}
        {{--                        <a href="{{route($routePrefix.'settings.index',$setting)}}">--}}
        {{--                            <i class="fa fa-circle-o"></i>--}}
        {{--                            {{ucwords(str_replace('-', ' ' ,$setting))}}--}}
        {{--                        </a>--}}
        {{--                    </li>--}}
        {{--                @endforeach--}}
        {{--            </ul>--}}
        {{--        </li>--}}
        {{--        <li class="header">Media</li>--}}
        {{--        <li class="{{request()->is($urlPrefix.'/file-manager',--}}
        {{--                    $urlPrefix.'/file-manager/*') ? 'active' :''}}">--}}
        {{--            <a href="{{route($routePrefix.'file-manager.index')}}">--}}
        {{--                <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Gallery</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
    </ul>
</section>

<!-- /.sidebar -->
