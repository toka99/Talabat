<li class="nav-item">
    <a href="{{ route('cusines.index') }}"
       class="nav-link {{ Request::is('cusines*') ? 'active' : '' }}">
        <p>Cusines</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>


<!-- 
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li> -->
