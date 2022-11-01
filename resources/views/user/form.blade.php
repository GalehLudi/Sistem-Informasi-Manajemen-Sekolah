<x-app2-layout>
  <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
    <form action="{{ route('user.save.update', $user->id) }}" method="post" class="needs-validation" novalidate>
      @csrf
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Form Ubah Data User</h5>
        </div>
        <div class="card-body">
          <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="name" id="nama" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="role" class="form-label">Level</label>
            <select name="role" id="role" class="form-select">
              <option value="" selected disabled hidden>-- Pilih Level --</option>
              @foreach ($role as $item)
                <option value="{{ $item->name }}" @selected($user->getRoleNames()[0] === $item->name)>{{ $item->name }}</option>
              @endforeach
            </select>
            @error('role')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="card-footer">
          <a href="{{ route('user') }}" class="btn btn-sm btn-danger">Kembali</a>
          <button type="submit" class="btn btn-sm btn-primary float-end">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</x-app2-layout>
