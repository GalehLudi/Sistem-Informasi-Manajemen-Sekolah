  @push('script')
    <script>
      $('.btn-update').click(function() {
        $('#update form').attr('action', $(this).attr('href'))
        $('#mapel-update').val($(this).parents('tr').find('td:eq(1)').text())
        $(`#id_guru-update option[value="${$(this).parents('tr').find('td:eq(2)').data('guru')}"]`).attr('selected', true)
        if ($(this).parents('tr').find('input').prop('checked'))
          $('#status-update').attr('checked', true)

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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Form Ubah Data Pelajaran</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label for="mapel-update" class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mapel" id="mapel-update" class="form-control @error('mapel') is-invalid @enderror" value="{{ old('mapel') }}" required>
                    @error('mapel')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="id_guru-update" class="form-label">Guru</label>
                    <select name="id_guru" id="id_guru-update" class="form-select" required>
                      <option value="" selected disabled hidden></option>
                      @foreach ($guru as $item)
                        <option value="{{ $item->id }}" @selected(old('id_guru-update') === $item->id)>{{ $item->nama }}</option>
                      @endforeach
                    </select>
                    @error('id_guru')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="sts" class="form-label">Status</label>
                    <div class="form-check">
                      <input type="checkbox" name="status" id="status-update" class="form-check-input">
                      <label for="status-update" class="form-check-label">Aktif</label>
                      @error('mapel')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
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
      <form action="{{ route('pelajaran.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Form Tambah Pelajaran</h5>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="mapel" class="form-label">Mata Pelajaran</label>
              <input type="text" name="mapel" id="mapel" class="form-control @error('mapel') is-invalid @enderror" value="{{ old('mapel') }}" required>
              @error('mapel')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="id_guru" class="form-label">Guru</label>
              <select name="id_guru" id="id_guru" class="form-select" required>
                <option value="" selected disabled hidden></option>
                @foreach ($guru as $item)
                  <option value="{{ $item->id }}" @selected(old('id_guru') === $item->id)>{{ $item->nama }}</option>
                @endforeach
              </select>
              @error('id_guru')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="sts" class="form-label">Status</label>
              <div class="form-check">
                <input type="checkbox" name="status" id="status" class="form-check-input" @checked(old('status', true))>
                <label for="status" class="form-check-label">Aktif</label>
                @error('mapel')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
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
              <h5 class="mb-0">Data Master Pelajaran</h5>
            </div>
            <div class="col-auto">
              <a href="{{ route('pdf', ['param' => 'pelajaran', 'download' => 1]) }}" target="_blank" class="btn btn-sm btn-warning"><i class="bi bi-download"></i> Download PDF</a>
              <a href="{{ route('pdf', ['param' => 'pelajaran']) }}" target="_blank" class="btn btn-sm btn-success"><i class="bi bi-printer"></i> Cetak PDF</a>
              <a href="#form-add" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="form-add" class="btn btn-sm btn-primary"><i class="bi bi-person-plus"></i> Tambah Data Pelajaran</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th class="text-center" scope="col" style="width: 75px">No</th>
                  <th scope="col">Kode Pelajaran</th>
                  <th scope="col">Mata Pelajaran</th>
                  <th scope="col">Guru</th>
                  <th scope="col">Status</th>
                  <th class="text-center" scope="col" style="width: 125px">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                @php
                  $no = 1;
                @endphp
                @foreach ($pelajaran as $item)
                  <tr>
                    <th class="text-center" scope="row">{{ $no++ }}</th>
                    <td>{{ $item->kd_mapel }}</td>
                    <td>{{ $item->mapel }}</td>
                    <td data-guru="{{ $item->id_guru }}">{{ $item->guru->nama }}</td>
                    <td>
                      <form action="" method="post">
                        <input disabled type="checkbox" name="ckc" class="form-check-input" @checked($item->status === 'true')>
                      </form>
                    </td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="{{ route('pelajaran.save.update', $item->id) }}" data-bs-toggle="modal" data-bs-target="#update" class="btn btn-sm btn-outline-warning btn-update"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('pelajaran.destroy', $item->id) }}" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
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
