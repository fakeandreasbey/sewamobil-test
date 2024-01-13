<?php

namespace App\DataTables;

// use App\Models\DaftarLayanan;
use App\Models\DaftarLayanan;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DaftarLayananDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        ->addIndexColumn()
        ->editColumn('no_rm',function($row){



            $pasien = DB::table('pasien')->where('no_rm', $row->no_rm)->get();
            
            $now    = Carbon::now(); // Tanggal sekarang

            foreach ($pasien as $p) {

                $b_day  = Carbon::parse($p->tanggal_lahir); // Tanggal Lahir
                $age    = $b_day->diffInYears($now); 


                // $action = '<font color="#2196f3">'.$p->title_pasien.'. '.$p->nama_lengkap.'</font><br>'.$p->no_rm.', '.$age.' Tahun';

                $action = '<div class="media"><div class="avatar me-2"><img alt="avatar" src="assets/src/assets/img/profile-30.png" class="rounded-circle" /></div><div class="media-body align-self-center"><h6 class="mb-0" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="'.$row->no_rj.'"><a href="pasien/summary/'.$row->id.'"><font color="#2196f3">'.$p->title_pasien.'. '.$p->nama_lengkap.'</font></a></h6><span>'.$p->no_rm.', '.$age.' Tahun</span></div></div>';
            }
            return $action;

        })

        ->editColumn('kode_status',function($row){

            if($row->kode_status == "0"){
                $action = '<span class="badge badge-warning mb-2 me-4">Menunggu</span>';
            }elseif($row->kode_status == "1"){
                $action = '<span class="badge badge-info mb-2 me-4">Periksa</span>';
            }elseif($row->kode_status == "2"){
                $action = '<span class="badge badge-success mb-2 me-4">Selesai Periksa</span>';
            }elseif($row->kode_status == "3"){
                $action = '<span class="badge badge-danger mb-2 me-4">Sudah Pulang</span>';
            }

            return $action;

        })
        ->addColumn('action', function($row){
                
            $action = ''; 

            if (Gate::allows('show daftar layanan')){
                $action = '<button type="button" class="badge badge-light-warning text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Ubah Registrasi"><i class="fa-solid fa-pen-to-square"></i></button>';
            }

            if (Gate::allows('show daftar layanan')){
                $action .= ' <button type="button" class="badge badge-light-danger text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Batalkan Registrasi"><i class="fa-solid fa-xmark"></i></button>';
            }

            return $action;
            
        })
        ->rawColumns(['no_rm','kode_status','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DaftarLayanan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DaftarLayanan $model)
    {
        $query = DB::table('worklist')
                ->leftJoin('pasien', 'pasien.no_rm', '=', 'worklist.no_rm')
                ->get();

        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('daftarlayanan-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('no_rm'),
            Column::make('tipe_kedatangan'),
            Column::make('kode_status'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
      // Column::make('id'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'DaftarLayanan_' . date('YmdHis');
    }
}
