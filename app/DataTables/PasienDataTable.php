<?php

namespace App\DataTables;

use App\Models\Pasien;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class PasienDataTable extends DataTable
{
    /**
     * Build DataTable class. <span class="shadow-none badge badge-primary">Approved</span>
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        ->addIndexColumn()
        ->editColumn('nama_lengkap',function($row){

            $now    = Carbon::now(); // Tanggal sekarang

            $b_day  = Carbon::parse($row->tanggal_lahir); // Tanggal Lahir
            $age    = $b_day->diffInYears($now); 


            $jamDaftar = \Carbon\Carbon::parse($row->created_at)->format('H:i:s');

            $icon = "";
            if($age <= "5"){
                if($row->jenis_kelamin == "Laki-laki"){
                    $icon = "baby-boy.webp";
                }elseif($row->jenis_kelamin == "Perempuan"){
                    $icon = "baby-girl.webp";
                }
            }elseif ($age > "5" && $age <= "17"){
                if($row->jenis_kelamin == "Laki-laki"){
                    $icon = "boy.webp";
                }elseif($row->jenis_kelamin == "Perempuan"){
                    $icon = "girl.webp";
                }
            }elseif ($age > "17"){
                if($row->jenis_kelamin == "Laki-laki"){
                    $icon = "father.webp";
                }elseif($row->jenis_kelamin == "Perempuan"){
                    $icon = "mother.webp";
                }
            }

            $action = '<div class="media"><div class="avatar me-2"><img alt="'.$icon.'" src="/assets/icon-pasien/'.$icon.'" class="rounded-circle" /></div><div class="media-body align-self-center"><h6 class="mb-0" data-bs-toggle="popover" data-bs-container="body"><font color="#4361ee">'.$row->title_pasien.' '.$row->nama_lengkap.'</font></h6><span>'.$row->no_rm.', '.$age.' Tahun</span></div></div>';

            return $action;

        })
        ->editColumn('jenis_kelamin',function($row){

            if($row->jenis_kelamin == "Laki-laki"){
                $action = '<span class="badge badge-light-success inv-status">L</span>';
            }elseif($row->jenis_kelamin == "Perempuan"){
                $action = '<span class="badge badge-light-success inv-status">P</span>';
            }

            return $action;

        })
        ->editColumn('tanggal_lahir', function (Pasien $row) {
            return \Carbon\Carbon::parse($row->tanggal_lahir )->format('d-m-Y');
        })
        ->addColumn('action', function($row){
                
            $action = ''; 

            // if (Gate::allows('edit pasien')){
                $action = '<button type="button" class="badge badge-light-primary text-start me-2 action" data-id='.$row->id.' data-jenis="edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></button>';
            // }

            if (Gate::allows('delete pasien')){
                $action .= ' <button type="button" class="badge badge-light-danger text-start me-2 action" data-id='.$row->id.' data-jenis="delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>';
            }

            return $action;
            
        })
        ->rawColumns(['nama_lengkap','jenis_kelamin','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pasien $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pasien $model)
    {
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
                    ->setTableId('pasien-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([  
                        'dom'          => 'Bfrtip',  
                        'buttons'      => ['excel', 'csv'],  
                    ]);  


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
            Column::make('nama_lengkap'),
            Column::make('jenis_kelamin'),
            Column::make('tempat_lahir'),
            Column::make('tanggal_lahir'),
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
        return 'Pasien_' . date('YmdHis');
    }
}
