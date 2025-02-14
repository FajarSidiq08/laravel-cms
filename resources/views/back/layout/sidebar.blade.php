            {{-- panggil section content --}}
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('dashboard') }}">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('article') }}">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Articles
                            </a>
                        </li>

                        @if (auth()->user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('categories') }}">
                                    <span data-feather="list" class="align-text-bottom"></span>
                                    Categories
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('users') }}">
                                    <span data-feather="users" class="align-text-bottom"></span>
                                    Users
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('users') }}">
                                    <span data-feather="user" class="align-text-bottom"></span>
                                    Profile
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span data-feather="log-out" class="align-text-bottom"></span>
                                Logout
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ url('/') }}">
                                <span data-feather="arrow-left" class="align-text-bottom text-danger"></span>
                                Back
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
