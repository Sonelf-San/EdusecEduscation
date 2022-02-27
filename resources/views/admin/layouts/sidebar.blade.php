<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li class="{{ Route::is('admin.dashboard') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="airplay"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li class="{{ Request::is('admin/categories*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        <i data-feather="layers"></i>
                        <span> Catégories </span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/logos*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.logos.index') }}">
                        <i data-feather="image"></i>
                        <span> Logos </span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/articles*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.articles.index') }}">
                        <i data-feather="shopping-bag"></i>
                        <span> Articles </span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/schools*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.schools.index') }}">
                        <i data-feather="award"></i>
                        <span> Ecoles | Facultés </span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/administrator*') ? 'menuitem-active' : '' }}">
                    <a href="{{route('admin.administrator.index')}}">
                        <i data-feather="users"></i>
                        <span> Administrateurs</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/settings*') ? 'menuitem-active' : '' }}">
                    <a href="{{route('admin.settings')}}">
                        <i data-feather="user"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="menu-title mt-2">Contenu de la page</li>

                <li class="{{ Request::is('admin/team_members*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.team_members.index') }}">
                        <i data-feather="users"></i>
                        <span>Votre Équipe</span>
                    </a>
                </li>



                <li class="{{ Request::is('admin/partners*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.partners.index') }}">
                        <i data-feather="users"></i>
                        <span>Partenaires</span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/page*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.pages.index') }}">
                        <i data-feather="file-text"></i>
                        <span>Les pages</span>
                    </a>
                </li>



            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
