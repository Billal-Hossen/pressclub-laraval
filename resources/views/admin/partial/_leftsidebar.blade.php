<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="text-center">
                <img src="{{asset('assets/admin')}}/images/users/avatar-1.jpg" alt="" class="img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Kenny Rigdon</a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"> Profile</a></li>
                        <li><a href="javascript:void(0)"> Settings</a></li>
                        <li><a href="javascript:void(0)"> Lock screen</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)"> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="typography.html" class="waves-effect"><i class="ti-ruler-pencil"></i><span> Typography <span class="badge badge-primary pull-right">6</span></span></a>
                </li>

                <li class="has_sub {{Request::is('admin.roles.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Roles </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.roles.index')}}">Role List</a></li>
                        <li><a href="{{route('admin.roles.create')}}">Role Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.users.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> User </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.users.index')}}">User List</a></li>
                        <li><a href="{{route('admin.users.create')}}">User Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.tag.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Tags </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.tags.index')}}">Tag List</a></li>
                        <li><a href="{{route('admin.tags.create')}}">Tag Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.executives.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Executive Member </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.executives.index')}}">Executive Member List</a></li>
                        <li><a href="{{route('admin.executives.create')}}">Executive Member Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.members.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Members </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.members.index')}}">Members List</a></li>
                        <li><a href="{{route('admin.members.create')}}">Member Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.teachers.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Teachers </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.teachers.index')}}">Teachers List</a></li>
                        <li><a href="{{route('admin.teachers.create')}}">Teachers Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.committees.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Committees </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.committees.index')}}">Committees List</a></li>
                        <li><a href="{{route('admin.committees.create')}}">Committees Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.notices.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Notice Board </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.notices.index')}}">Notice Board List</a></li>
                        <li><a href="{{route('admin.notices.create')}}">Notice Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.campus.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Campus </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.campus.index')}}">Campus Information</a></li>
                        <li><a href="{{route('admin.campus.create')}}">Campus Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.events.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Events </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.events.index')}}">Event List</a></li>
                        <li><a href="{{route('admin.events.create')}}">Event Create</a></li>
                    </ul>
                </li>
{{--
                <li class="has_sub {{Request::is('admin.categories.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Category </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.categories.index')}}">Category List</a></li>
                        <li><a href="{{route('admin.categories.create')}}">Category Create</a></li>
                    </ul>
                </li>--}}

                <li class="has_sub {{Request::is('admin.follower.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Follower </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.follower.index')}}">Follower List</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.social.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> Social Media </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.social.index')}}">Social Media List</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.about.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span> About Us</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.about.index')}}">About Us</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.images.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>Image gallery</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.images.index')}}">Gallery List</a></li>
                        <li><a href="{{route('admin.images.create')}}">Image Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.videos.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>Video gallery</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.videos.index')}}">Gallery List</a></li>
                        <li><a href="{{route('admin.videos.create')}}">Video Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.sliders.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>Slider</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.sliders.index')}}">Slider List</a></li>
                        <li><a href="{{route('admin.sliders.create')}}">Slider Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.posts.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>Post</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.posts.index')}}">Post List</a></li>
                        <li><a href="{{route('admin.posts.create')}}">Post Create</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.contacts.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>Contacts</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.contacts.index')}}">Contacts List</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.comments.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>Comment</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.comments.index')}}">Comment List</a></li>
                    </ul>
                </li>

                <li class="has_sub {{Request::is('admin.settings.*') ? 'active': ''}}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-menu-alt"></i><span>Setting</span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.settings.index')}}">Setting List</a></li>
                    </ul>
                </li>

                <!--<li class="has_sub">-->
                <!--<a href="javascript:void(0);" class="waves-effect"><i class="ti-share"></i><span>Multi Menu </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
                <!--<ul>-->
                <!--<li class="has_sub">-->
                <!--<a href="javascript:void(0);" class="waves-effect"><span>Menu Item 1.1</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
                <!--<ul style="">-->
                <!--<li><a href="javascript:void(0);"><span>Menu Item 2.1</span></a></li>-->
                <!--<li><a href="javascript:void(0);"><span>Menu Item 2.2</span></a></li>-->
                <!--</ul>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="javascript:void(0);"><span>Menu Item 1.2</span></a>-->
                <!--</li>-->
                <!--</ul>-->
                <!--</li>-->
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
