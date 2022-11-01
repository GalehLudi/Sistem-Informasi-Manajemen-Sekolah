<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center fw-bolder" href="#">
      <img src="https://web.htp.ac.id/asset/images/logouhtp.png" alt="Logo" height="35" class="me-2" style="width: 35px; height: 35px;">
      SIM Sekolah
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="vr"></div>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        @role(['Super Admin', 'Admin'])
          <li class="nav-item">
            <a @class([
                'nav-link',
                'active text-primary fw-semibold' => Request()->is('siswa*'),
            ]) aria-current="page" href="{{ route('siswa') }}">Data Siswa</a>
          </li>

          <li class="nav-item">
            <a @class([
                'nav-link',
                'active text-primary fw-semibold' => Request()->is('guru*'),
            ]) aria-current="page" href="{{ route('guru') }}">Data Guru</a>
          </li>

          <li class="nav-item">
            <a @class([
                'nav-link',
                'active text-primary fw-semibold' => Request()->is('pelajaran*'),
            ]) aria-current="page" href="{{ route('pelajaran') }}">Data Pelajaran</a>
          </li>

          <li class="nav-item">
            <a @class([
                'nav-link',
                'active text-primary fw-semibold' => Request()->is('kurikulum*'),
            ]) aria-current="page" href="{{ route('kurikulum') }}">Data Kurikulum</a>
          </li>

          <li class="nav-item">
            <a @class([
                'nav-link',
                'active text-primary fw-semibold' => Request()->is('jadwal*'),
            ]) aria-current="page" href="{{ route('jadwal') }}">Data Jadwal</a>
          </li>

          <li class="nav-item">
            <a @class([
                'nav-link',
                'active text-primary fw-semibold' => Request()->is('user*'),
            ]) aria-current="page" href="{{ route('user') }}">Data User</a>
          </li>
        @endrole
      </ul>

      <div class="btn-group">
        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a href="{{ route('profile.show') }}" class="dropdown-item">Profil</a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button class="dropdown-item" type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
