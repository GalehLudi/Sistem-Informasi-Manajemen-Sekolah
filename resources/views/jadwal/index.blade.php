  @push('script')
    <script>
      $('.btn-update').click(function() {
        $('#update form').attr('action', $(this).attr('href'))
        $('#kd_jadwal-update').val($(this).closest('tr').find('td:eq(0)').text())
        $(`#id_kurikulum-update option[data-kode="${$(this).closest('tr').find('td:eq(1)').text()}"]`).attr('selected', true)

        return false
      })

      $('.modal').on('hidden.bs.modal', function() {
        $('form').reset()
      })
    </script>
  @endpush

  @push('modal')
    <div class="modal fade {{ !session()->get('previous') && session()->get('previous') !== 'update' && !$errors->any() ?? 'show' }}" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="" method="POST" class="needs-validation" novalidate>
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Form Ubah Data Jadwal</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label for="kd_jadwal-update" class="form-label">Kode Jadwal</label>
                    <input type="text" name="kd_jadwal" id="kd_jadwal-update" class="form-control @error('kd_jadwal') is-invalid @enderror" value="{{ old('kd_jadwal') }}" required>
                    @error('kd_jadwal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="id_kurikulum-update" class="form-label">Tahun</label>
                    <select name="id_kurikulum" id="id_kurikulum-update" class="form-select" required>
                      <option value="" selected disabled hidden>-- Pilih Kurikulum --</option>
                      @foreach ($kurikulum as $item)
                        <option value="{{ $item->id }}" data-kode="{{ $item->kd_kurikulum }}">{{ $item->kd_kurikulum }}</option>
                      @endforeach
                    </select>
                    @error('kurikulum')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  @endpush

  <x-app2-layout>
    <div class="col-4 collapse collapse-horizontal {{ session()->get('previous') && !$errors->any() ?? 'show' }}" id="form-add">
      <form action="{{ route('jadwal.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Form Tambah Jadwal</h5>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="kd_jadwal" class="form-label">Kode Jadwal</label>
              <input type="text" name="kd_jadwal" id="kd_jadwal" class="form-control @error('kd_jadwal') is-invalid @enderror" value="{{ old('kd_jadwal') }}" required>
              @error('kd_jadwal')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="id_kurikulum" class="form-label">Tahun</label>
              <select name="id_kurikulum" id="id_kurikulum" class="form-select" required>
                <option value="" selected disabled hidden>-- Pilih Kurikulum --</option>
                @foreach ($kurikulum as $item)
                  <option value="{{ $item->id }}">{{ $item->kd_kurikulum }}</option>
                @endforeach
              </select>
              @error('kurikulum')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary float-end">Simpan</button>
          </div>
        </div>
      </form>
    </div>

    <div class="col">
      <div class="card">
        <div class="card-header">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto">
              <h5 class="mb-0">Data Master Jadwal</h5>
            </div>
            <div class="col-auto">
              <a href="{{ route('pdf', ['param' => 'jadwal', 'download' => 1]) }}" target="_blank" class="btn btn-sm btn-warning"><i class="bi bi-download"></i> Download PDF</a>
              <a href="{{ route('pdf', ['param' => 'jadwal']) }}" target="_blank" class="btn btn-sm btn-success"><i class="bi bi-printer"></i> Cetak PDF</a>
              <a href="#form-add" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="form-add" class="btn btn-sm btn-primary"><i class="bi bi-person-plus"></i> Tambah Data Jadwal</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th class="text-center" scope="col" style="width: 75px">No</th>
                  <th scope="col">Kode Jadwal</th>
                  <th scope="col">Kode Kurikulum</th>
                  <th scope="col">Semester</th>
                  <th scope="col">Tahun</th>
                  <th class="text-center" scope="col" style="width: 125px">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                @php
                  $no = 1;
                @endphp
                @foreach ($jadwal as $item)
                  <tr>
                    <th class="text-center" scope="row">{{ $no++ }}</th>
                    <td>{{ $item->kd_jadwal }}</td>
                    <td>{{ $item->kurikulum->kd_kurikulum }}</td>
                    <td>{{ $item->kurikulum->semester }}</td>
                    <td>{{ $item->kurikulum->tahun }}</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="{{ route('jadwal.update', $item->id) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-plus-circle"></i></a>
                        <a href="{{ route('jadwal.save.update', $item->id) }}" data-bs-toggle="modal" data-bs-target="#update" class="btn btn-sm btn-outline-warning btn-update"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('jadwal.destroy', $item->id) }}" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </x-app2-layout>
