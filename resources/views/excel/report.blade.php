<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Id Binusian</th>
        <th>Nama</th>
        <th>Bagian</th>
        <th>Jenis Pinjaman</th>
        <th>Total Pinjaman</th>
        <th>Potongan Pinjaman</th>
        <th>Sisa Pinjaman</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $key=>$value)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->nip }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->area }}</td>
            <td>{{ $value->jenis_peminjaman }}</td>
            <td>{{ $value->total_dana }}</td>
            <td>{{ $value->sisa_cicilan }}</td>
            <td>{{ $value->potongan_pinjaman }}</td>
            <td>{{ $value->sisa_pinjaman }}</td>
        </tr>
    @endforeach
    </tbody>
</table>