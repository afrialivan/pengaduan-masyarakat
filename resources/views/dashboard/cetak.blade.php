<table class="table-bordered">
    <thead>
    <tr>
        <th>nama</th>
        <th>tgl</th>
        <th>status</th>
        <th>judul</th>
        <th>isi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->user->nama }}</td>
            <td>{{ $invoice->tgl_pengaduan }}</td>
            <td>{{ $invoice->status == '0' ? 'belum diproses' : $invoice->status }}</td>
            <td>{{ $invoice->judul }}</td>
            <td>{{ $invoice->isi_pengaduan }}</td>
        </tr>
    @endforeach
    </tbody>
  </table>
