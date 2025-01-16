<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwx_CYP4rS-2CG-PLAJgRR_cBC4OgBaTDgXQ&s" alt=""
                class="img-fluid" width="50">
        </div>
        <div class="sidebar-brand-text mx-3"><span>PANEL</span></div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Nav::isRoute('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{ __('Master Data') }}
    </div>
    <li class="nav-item {{ Nav::isRoute('alumni.*') }}">
        <a class="nav-link" href="{{ route('alumni.index') }}">
            <i class="fas fa-user-graduate"></i>
            <span>{{ __('Alumni') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('question.*') }}">
        <a class="nav-link" href="{{ route('question.index') }}">
            <i class="far fa-question-circle"></i>
            <span>{{ __('Kuesioner') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('answer.*') }}">
        <a class="nav-link" href="{{ route('answer.index') }}">
            <i class="far fa-list-alt"></i>
            <span>{{ __('Jawaban') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('questionanswer.*') }}">
        <a class="nav-link" href="{{ route('questionanswer.index') }}">
            <i class="fas fa-fw fa-hands-helping"></i>
            <span>{{ __('Responden') }}</span>
        </a>
    <!-- </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{ __('Blogs') }}
    </div>
    <li class="nav-item {{ Nav::isRoute('category.*') }}">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="far fa-list-alt"></i>
            <span>{{ __('Kategori') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('post.*') }}">
        <a class="nav-link" href="{{ route('post.index') }}">
            <i class="fas fa-blog"></i>
            <span>{{ __('Postingan') }}</span>
        </a>
    </li> -->
    {{-- <li class="nav-item {{ Nav::isRoute('setting.*') }}">
        <a class="nav-link" href="{{ route('setting.index') }}">
            <i class="fas fa-cogs"></i>
            <span>{{ __('Setting') }}</span>
        </a>
    </li> --}}
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
