<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard')}}" class="brand-link">
        <img src="/asset/dist/img/logo.png" alt="{{config('app.name')}}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">
            {{ config('app.name')}}
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('isAdmin')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>{{ __('Users') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('questions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-question"></i>
                        <p>{{ __('Question') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quizzes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa fa-spinner"></i>
                        <p>{{ __('Quizzes') }}</p>
                    </a>
                </li>
                @endcan
                @can('isUser')
                    <li class="nav-item">
                        <a href="{{ route('userquizzes.index') }}" class="nav-link">
                            <i class="nav-icon fas fa fa-spinner"></i>
                            <p>{{ __('Quizzes') }}</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
