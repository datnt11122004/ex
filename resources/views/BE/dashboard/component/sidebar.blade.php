@php
    $segment = request()->segment(1);
@endphp
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('auth.logout')}}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
{{--            {{dd(config('apps.sidebar.module'))}}--}}
            @foreach(config('apps.sidebar.module') as $key => $value)
            <li class="@if($segment==$value['name']) active @endif">
                <a href="#" role="button"> <i class="{{$value['icon']}} "></i> <span class="nav-label">{{$value['title']}}</span> <span class="fa arrow"></span></a>
                @if(isset($value['subModule']))
                <ul class="nav nav-second-level">
                    @foreach($value['subModule'] as $subKey => $subValue)
                    <li><a href="{{route($subValue['route'])}}">{{$subValue['title']}}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>

    </div>
</nav>
