{{--@dd($routePrefix)--}}
<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="{{asset('backend/images/admin-logo.jpg')}}" class="user-image"
             alt="User Image">
        <img
            src="{{ (Auth::user()->avatar == 'default.jpg') ?
            asset('images/'.Auth::user()->avatar) : asset('storage/avatars/'.Auth::user()->avatar) }}"
            class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        {{--        <span class="hidden-xs">{{ Auth::user()->name }}</span>--}}
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
            <img src="{{asset('backend/images/admin-logo.jpg')}}" class="user-image"
                 alt="User Image">
            <img
                src="{{ (Auth::user()->avatar == 'default.jpg') ?
                                asset('images/'.Auth::user()->avatar) : asset('storage/avatars/'.Auth::user()->avatar) }}"
                class="img-circle"
                alt="User Image">

            <p>
                {{ Auth::user()->name }}
                <small>
                    Member
                    since {{ Carbon\Carbon::parse(Auth::user()->created_at)->format('M. Y') }}</small>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{route('cms.profile.index')}}" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat">
                        Sign out
                    </button>
                </form>
            </div>
        </li>
    </ul>
</li>

