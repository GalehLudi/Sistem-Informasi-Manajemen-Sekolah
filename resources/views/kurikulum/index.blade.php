  @push('script')
    <script>
      $('.btn-update').click(function() {
        $('#update form').attr('action', $(this).attr('href'))
        $('#kd_kurikulum-update').val($(this).closest('tr').find('td:eq(0)').text())
        $('#semester-update').val($(this).closest('tr').find('td:eq(1)').text())
        $('#tahun-update').val($(this).closest('tr').find('td:eq(2)').text())

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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Form Ubah Data Kurikulum</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label for="kd_kurikulum-update" class="form-label">Kode Kurikulum</label>
                    <input type="text" pattern="[0-9]+" name="kd_kurikulum" id="kd_kurikulum-update" class="form-control @error('kd_kurikulum') is-invalid @enderror" value="{{ old('kd_kurikulum') }}" required readonly>
                    @error('kd_kurikulum')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="semester-update" class="form-label">Semester</label>
                    <input type="number" pattern="[0-9]+" name="semester" id="semester-update" class="form-control @error('semester') is-invalid @enderror" value="{{ old('semester') }}" required>
                    @error('semester')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="tahun-update" class="form-label">Tahun</label>
                    <input type="text" pattern="[0-9]+" maxlength="4" name="tahun" id="tahun-update" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}" required>
                    @error('tahun')
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
      <form action="{{ route('kurikulum.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Form Tambah Kurikulum</h5>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="semester" class="form-label">Semester</label>
              <input type="number" pattern="[0-9]+" name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror" value="{{ old('semester') }}" required>
              @error('semester')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="tahun" class="form-label">Tahun</label>
              <input type="text" pattern="[0-9]+" maxlength="4" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}" required>
              @error('tahun')
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
              <h5 class="mb-0">Data Master Kurikulum</h5>
            </div>
            <div class="col-auto">
              <a href="{{ route('pdf', ['param' => 'kurikulum', 'download' => 1]) }}" target="_blank" class="btn btn-sm btn-warning"><i class="bi bi-download"></i> Download PDF</a>
              <a href="{{ route('pdf', ['param' => 'kurikulum']) }}" target="_blank" class="btn btn-sm btn-success"><i class="bi bi-printer"></i> Cetak PDF</a>
              <a href="#form-add" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="form-add" class="btn btn-sm btn-primary"><i class="bi bi-person-plus"></i> Tambah Data Kurikulum</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th class="text-center" scope="col" style="width: 75px">No</th>
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
                @foreach ($kurikulum as $item)
                  <tr>
                    <th class="text-center" scope="row">{{ $no++ }}</th>
                    <td>{{ $item->kd_kurikulum }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="{{ route('kurikulum.save.update', $item->id) }}" data-bs-toggle="modal" data-bs-target="#update" class="btn btn-sm btn-outline-warning btn-update"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('kurikulum.destroy', $item->id) }}" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
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
