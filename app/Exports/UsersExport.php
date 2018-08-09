<?php

namespace App\Exports;

use App\User;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // return User::all();
        return view('excel.report', [
            'data' => DB::select('
                        select 
                            a.id,
                            a.name as name,
                            a.nip as nip,
                            a.area as area,
                            c.name as jenis_peminjaman,
                            b.dana_potongan as total_dana,
                            b.cicilan_potongan as sisa_cicilan,
                            (CASE
                                WHEN (b.dana_potongan / b.cicilan_potongan + (b.dana_potongan * 3 / 100)) is NULL then 0
                                ELSE (b.dana_potongan / b.cicilan_potongan + (b.dana_potongan * 3 / 100))
                            END) as potongan_pinjaman,
                            (CASE
                                WHEN (b.dana_potongan  - (b.dana_potongan / b.cicilan_potongan)) is NULL then 0
                                ELSE (b.dana_potongan  - (b.dana_potongan / b.cicilan_potongan))
                            END)  as sisa_pinjaman
                        from users a
                        join form_dana b on a.id = b.user_id
                        join type_peminjaman c on c.id = b.type_peminjaman_id
                        where b.status = 1
                ')
        ]);
    }
}
