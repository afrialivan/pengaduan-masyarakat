<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class pengaduansExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.cetak', [
            'invoices' => Pengaduan::all()
        ]);
    }
}
