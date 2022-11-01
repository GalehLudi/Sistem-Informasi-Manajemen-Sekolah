<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cetak PDF</title>

  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    table thead,
    table tbody,
    table th,
    table td {
      padding: 5px;
      border: solid 1px #777;
    }
  </style>
</head>

<body>
  @php
    $no = 1;
  @endphp

  <h2 style="text-align: center">Laporan Data Kurikulum</h2>

  <table>
    <tr>
      <th style="width: 1">No</th>
      <th>Kode Kurikulum</th>
      <th>Semester</th>
      <th style="width: 1">Tahun</th>
    </tr>
    @foreach ($data as $item)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $item->kd_kurikulum }}</td>
        <td>{{ $item->semester }}</td>
        <td>{{ $item->tahun }}</td>
      </tr>
    @endforeach
  </table>

</body>

</html>
