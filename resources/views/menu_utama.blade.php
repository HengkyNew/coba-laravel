<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}">Beranda</a></li>
        <li class="{{ request()->is('form-daftar') ? 'active' : '' }}">
            <a href="{{ url('form-daftar') }}">Pendaftaran</a></li>
        <li class="{{ request()->is('form-login') ? 'active' : '' }}">
            <a href="{{ url('form-login') }}">Login</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#team">Team</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li class="drop-down"><a href="">Drop Down</a>
            <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="drop-down"><a href="#">Deep Drop Down</a>
                    <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
            </ul>
        </li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav><!-- .nav-menu -->
