<?php

namespace App\DataTables;

use App\Models\Worklist;
use App\Models\Pasien;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class WorklistDataTable extends DataTable
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
        ->editColumn('vital',function($row){

            $vitalsign   = DB::table('vital_sign')->where('no_rj', $row->no_rj)->count();


            if($vitalsign > 0){
                $action = '<a data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Data pemeriksaan TTV Pasien sudah di isi"><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:#00ab55"></i></a>';
            }else{
                $action = '<a data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Data pemeriksaan TTV Pasien belum di isi"><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:#eaeaec"></i></a>';
            }

            return $action;

        })
        ->editColumn('soap',function($row){

            if($row->riwayat_penyakit != ""){
                $action = '<a data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Data pemeriksaan SOAP Pasien sudah di isi"><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:#00ab55"></i></a>';
            }else{
                $action = '<a data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Data pemeriksaan SOAP Pasien belum di isi"><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:#eaeaec"></i></a>';
            }

            return $action;

        })
        ->editColumn('resep',function($row){

            $resep   = DB::table('resep_obat')->where('no_rj', $row->no_rj)->count();

            if($resep > 0){
                $action = '<a data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Data pemesanan Resep Elektronik ke Farmasi sudah dibuat"><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:#00ab55"></i></a>';
            }else{
                $action = '<a data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Data pemesanan Resep Elektronik ke Farmasi belum dibuat"><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:#eaeaec"></i></a>';
            }

            return $action;

        })
        ->editColumn('lab',function($row){

            if($row->lab == "1"){
                $action = '<a data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Data pemesanan pemeriksaan Laboratorium sudah dibuat/sudah dinyatakan selesai oleh petugas"><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:#00ab55"></i></a>';
            }elseif($row->lab == "0"){
                $action = '<a data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Data pemesanan pemeriksaan Laboratorium belum dibuat/belum dinyatakan selesai oleh petugas"><i class="fa-sharp fa-solid fa-circle-check fa-lg" style="color:#eaeaec"></i></a>';
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

            if (Gate::allows('show worklist')){
                $action = '<a href="" class="badge badge-light-info text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Panggil pasien"><i class="fa-solid fa-bullhorn"></i></a>';
            }

            if (Gate::allows('show periksa dokter')){
                
                if($row->kode_status == "0"){
                    $action .= ' <a class="badge badge-light-dark text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Pasien belum siap diperiksa"><i class="fa-solid fa-play"></i></a>';
                }elseif($row->kode_status == "1"){
                    $action .= ' <a href="/pasien/catatan/'.$row->id.'" class="badge badge-light-success text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Periksa pasien"><i class="fa-solid fa-play"></i></a>';
                }elseif($row->kode_status == "2"){
                    $action .= ' <button type="button" class="badge badge-light-danger text-start me-2 action" data-id='.$row->id.' data-jenis="stop"><i class="fa-solid fa-stop"></button>';
                }elseif($row->kode_status == "3"){
                    $action .= ' <button type="button" class="badge badge-light-dark text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Pemeriksaan selesai"><i class="fa-solid fa-stop"></button>';
                }
                
            } elseif (Gate::allows('show periksa perawat')){
                if($row->kode_status == "0"){
                    $action .= ' <a href="/pasien/catatan/'.$row->id.'" class="badge badge-light-success text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Periksa pasien"><i class="fa-solid fa-play"></i></a>';
                }elseif($row->kode_status == "1"){
                    $action .= ' <a href="/pasien/catatan/'.$row->id.'" class="badge badge-light-dark text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Revisi pemeriksaan"><i class="fa-solid fa-rotate-left"></i></a>';
                }elseif($row->kode_status == "2"){
                    $action .= ' <a href="/pasien/catatan/'.$row->id.'" class="badge badge-light-dark text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Revisi pemeriksaan"><i class="fa-solid fa-rotate-left"></i></a>';
                }elseif($row->kode_status == "3"){
                    $action .= ' <button type="button" class="badge badge-light-dark text-start me-2" data-bs-toggle="popover" data-bs-container="body" data-bs-placement="top" data-bs-trigger="hover" data-bs-content="Pemeriksaan selesai"><i class="fa-solid fa-stop"></button>';
                }
            }



            return $action;
            
        })
        ->rawColumns(['no_rm','vital','soap','resep','lab','kode_status','action']);
        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Worklist $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Worklist $model)
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
                    ->setTableId('worklist-table')
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
            Column::make('vital'),
            Column::make('soap'),
            Column::make('resep'),
            Column::make('lab'),
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
        return 'Worklist_' . date('YmdHis');
    }
}
