<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Início</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('checkpoint') }}">
                <i class="mdi mdi-check-circle-outline menu-icon"></i>
                <span class="menu-title">Checkpoint</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('commit') }}">
                <i class="mdi mdi-content-save-outline menu-icon"></i>
                <span class="menu-title">Commit</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('checkpoint') }}">
                <i class="mdi mdi-backup-restore menu-icon"></i>
                <span class="menu-title">Rollback</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('log') }}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Logs</span>
            </a>
        </li>
    </ul>
</nav>