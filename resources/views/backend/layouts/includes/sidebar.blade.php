<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ asset('ui/backend') }}/index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('all_client.index') }}">
                <i class="bi bi-card-list"></i>
                <span>All Client</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('service.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Service</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('assign_person.index') }}">
                <i class="bi bi-card-list"></i>
                <span>Assign Person</span>
            </a>
        </li><!-- End Register Page Nav -->

    </ul>

</aside>
