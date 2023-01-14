
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.kelas.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Kelas</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.pelajaran.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Pelajaran</span></a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user"
       aria-expanded="true" aria-controls="user">
        <i class="fas fa-fw fa-cog"></i>
        <span>Managemen User</span>
    </a>
    <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User :</h6>
            <a class="collapse-item" href="{{ route('admin.user.index') }}">List User</a>
        </div>
    </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#siswa"
       aria-expanded="true" aria-controls="siswa">
        <i class="fas fa-fw fa-cog"></i>
        <span>Managemen Siswa</span>
    </a>
    <div id="siswa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Siswa :</h6>
            <a class="collapse-item" href="{{ route('admin.siswa.index') }}">List Siswa</a>
            <a class="collapse-item" href="{{ route('admin.siswa.create') }}">Tambah Siswa</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#guru"
       aria-expanded="true" aria-controls="guru">
        <i class="fas fa-fw fa-cog"></i>
        <span>Managemen Guru</span>
    </a>
    <div id="guru" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Guru :</h6>
            <a class="collapse-item" href="{{ route('admin.guru.index') }}">List Guru</a>
            <a class="collapse-item" href="{{ route('admin.guru.create') }}">Tambah Guru</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pembelajaran"
       aria-expanded="true" aria-controls="pembelajaran">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pembelajaran</span>
    </a>
    <div id="pembelajaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pembelajaran :</h6>
            <a class="collapse-item" href="{{ route('admin.pembelajaran.index') }}">List Pembelajaran</a>
            <a class="collapse-item" href="{{ route('admin.pembelajaran.create') }}">Tambah Pembelajaran</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tahunajaran"
       aria-expanded="true" aria-controls="tahunajaran">
        <i class="fas fa-fw fa-cog"></i>
        <span>Pengaturan</span>
    </a>
    <div id="tahunajaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengturan :</h6>
            <a class="collapse-item" href="{{ route('admin.tahun-ajaran.index') }}">Tahun Ajaran</a>
        </div>
    </div>
</li>
