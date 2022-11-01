@push('script')
  <script>
    if ($('tbody tr').length === 1) {
      $('.act').hide()
    }

    function hapus(e) {
      e.closest('tr').remove()

      if ($('tbody tr').length === 1) {
        $('.act').hide()
      }

      for (let i = 0; i < $('tbody tr').length; i++) {
        $(`tbody tr:eq(${i}) select`).each(function() {
          $(this).attr('name', ($(this).attr('name').replace(/[0-9]/i, i)))
        })
      }
    }

    $('.btn').click(function() {

      if ($(this).hasClass('btn-tambah')) {
        var opt = '<option selected disabled hidden></option>'
        @foreach ($pelajaran as $key)
          {!! "opt += '<option value=$key->mapel>$key->mapel</option>'" !!}
        @endforeach

        let i = $('tbody tr').length

        var tr = ''
        tr += '<tr>'
        tr += '<td class="col-1"><input type="time" name="jam[]" id="jam" class="form-control form-control-sm"></td>'
        tr += `<td><select name="senin[${i}]" id="" class="form-select form-select-sm">${opt}</select></td>`
        tr += `<td><select name="selasa[${i}]" id="" class="form-select form-select-sm">${opt}</select></td>`
        tr += `<td><select name="rabu[${i}]" id="" class="form-select form-select-sm">${opt}</select></td>`
        tr += `<td><select name="kamis[${i}]" id="" class="form-select form-select-sm">${opt}</select></td>`
        tr += `<td><select name="jumat[${i}]" id="" class="form-select form-select-sm">${opt}</select></td>`
        tr += `<td><select name="sabtu[${i}]" id="" class="form-select form-select-sm">${opt}</select></td>`
        tr += '<td><button type="button" onclick="hapus(this)" class="btn btn-sm btn-danger btn-hapus"><i class="bi bi-dash-circle"></i></button></td>'
        tr += '</tr>'

        if ($('tbody tr:eq(-1) input').val() === '') {
          $('tbody tr:eq(-1) input').addClass('is-invalid')
        } else {
          $('tbody tr:eq(-1) input').addClass('is-valid').removeClass('is-invalid')
          $('tbody').append(tr)
          $('.act').show()
        }
      }

    })
  </script>
@endpush

<x-app2-layout>
  <div class="col-12">

    <form action="{{ route('jadwal.save.update', $jadwal->id) }}" method="post" class="needs-validation" novalidate>
      @csrf
      <input type="hidden" name="act" value="jadwal">
      <div class="card">
        <div class="card-header">
          <h5>Form Tambah Jadwal Mata Pelajaran</h5>
        </div>
        <div class="card-body">
          <div class="form-group mb-3 col-12 col-md-4">
            <label for="kd_jadwal" class="form-label">Kode Jadwal</label>
            <input type="text" name="kd_jadwal" id="kd_jadwal" class="form-control" value="{{ $jadwal->kd_jadwal }}" readonly>
          </div>

          <div class="form-group mb-3 col-12 col-md-4">
            <label for="kd_kurikulum" class="form-label">Kode Kurikulum</label>
            <input type="text" name="kd_kurikulum" id="kd_kurikulum" class="form-control" value="{{ $jadwal->kurikulum->kd_kurikulum }}" readonly>
          </div>

          <div class="table-responsive">
            <table class="table table-striped-columns">
              <thead>
                <tr>
                  <th>Jam</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                  <th>Sabtu</th>
                  <th style="width: 1px" class="act">#</th>
                </tr>
              </thead>
              @if ($jadwal->jadwal)
                <tbody>
                  @php
                    $i = 0;
                  @endphp
                  @foreach (json_decode($jadwal->jadwal) as $k => $j)
                    <tr>
                      <td class="col-1"><input type="time" name="jam[]" id="jam" value="{{ $k }}" class="form-control form-control-sm"></td>
                      <td>
                        <select name="senin[{{ $i }}]" id="" class="form-select form-select-sm">
                          <option value="" selected disabled hidden></option>
                          @foreach ($pelajaran as $item)
                            <option value="{{ $item->mapel }}" @selected($item->mapel === $j->senin)>{{ $item->mapel }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="selasa[{{ $i }}]" id="" class="form-select form-select-sm">
                          <option value="" selected disabled hidden></option>
                          @foreach ($pelajaran as $item)
                            <option value="{{ $item->mapel }}" @selected($item->mapel === $j->selasa)>{{ $item->mapel }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="rabu[{{ $i }}]" id="" class="form-select form-select-sm">
                          <option value="" selected disabled hidden></option>
                          @foreach ($pelajaran as $item)
                            <option value="{{ $item->mapel }}" @selected($item->mapel === $j->rabu)>{{ $item->mapel }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="kamis[{{ $i }}]" id="" class="form-select form-select-sm">
                          <option value="" selected disabled hidden></option>
                          @foreach ($pelajaran as $item)
                            <option value="{{ $item->mapel }}" @selected($item->mapel === $j->kamis)>{{ $item->mapel }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="jumat[{{ $i }}]" id="" class="form-select form-select-sm">
                          <option value="" selected disabled hidden></option>
                          @foreach ($pelajaran as $item)
                            <option value="{{ $item->mapel }}" @selected($item->mapel === $j->jumat)>{{ $item->mapel }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <select name="sabtu[{{ $i }}]" id="" class="form-select form-select-sm">
                          <option value="" selected disabled hidden></option>
                          @foreach ($pelajaran as $item)
                            <option value="{{ $item->mapel }}" @selected($item->mapel === $j->sabtu)>{{ $item->mapel }}</option>
                          @endforeach
                        </select>
                      </td>
                      <td class="act"><button type="button" onclick="hapus(this)" class="btn btn-sm btn-danger btn-hapus"><i class="bi bi-dash-circle"></i></button></td>
                    </tr>
                    @php
                      $i++;
                    @endphp
                  @endforeach
                </tbody>
              @else
                <tbody>
                  <tr>
                    <td class="col-1"><input type="time" name="jam[]" id="jam" class="form-control form-control-sm"></td>
                    <td>
                      <select name="senin[0]" id="" class="form-select form-select-sm">
                        <option value="" selected disabled hidden></option>
                        @foreach ($pelajaran as $item)
                          <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="selasa[0]" id="" class="form-select form-select-sm">
                        <option value="" selected disabled hidden></option>
                        @foreach ($pelajaran as $item)
                          <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="rabu[0]" id="" class="form-select form-select-sm">
                        <option value="" selected disabled hidden></option>
                        @foreach ($pelajaran as $item)
                          <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="kamis[0]" id="" class="form-select form-select-sm">
                        <option value="" selected disabled hidden></option>
                        @foreach ($pelajaran as $item)
                          <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="jumat[0]" id="" class="form-select form-select-sm">
                        <option value="" selected disabled hidden></option>
                        @foreach ($pelajaran as $item)
                          <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="sabtu[0]" id="" class="form-select form-select-sm">
                        <option value="" selected disabled hidden></option>
                        @foreach ($pelajaran as $item)
                          <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td class="act"><button type="button" onclick="hapus(this)" class="btn btn-sm btn-danger btn-hapus"><i class="bi bi-dash-circle"></i></button></td>
                  </tr>
                </tbody>
              @endif
            </table>
          </div>

          <button type="button" class="btn btn-sm btn-success btn-tambah float-end me-2"><i class="bi bi-plus-circle"></i></button>
        </div>
        <div class="card-footer">
          <a href="{{ route('jadwal') }}" class="btn btn-danger">Kembali</a>
          <button type="submit" class="btn btn-primary float-end">Simpan</button>
        </div>
      </div>
    </form>

  </div>
</x-app2-layout>
