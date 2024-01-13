<?php

namespace App\DataTables;

use App\Models\Obat;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Gate;

class ObatDataTable extends DataTable
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
        ->editColumn('stok',function($row){

            if($row->stok <= $row->stok_minimal){
                $action = '<font color="#e7515a">'.number_format($row->stok).'</font>';
            }else{
                $action = number_format($row->stok);
            }

            return $action;

        })
        ->editColumn('stok_minimal',function($row){

            $action = number_format($row->stok_minimal);

            return $action;

        })
        ->editColumn('tanggal_kadaluarsa', function ($row) {
            // return \Carbon\Carbon::parse($row->tanggal_kadaluarsa )->format('d-m-Y');
            $dateNow = date('Y-m-d');

            if($row->tanggal_kadaluarsa <= $dateNow){
                $action = '<font color="#e7515a">'.\Carbon\Carbon::parse($row->tanggal_kadaluarsa )->format('d-m-Y').'</font>';
            }else{
                $action = \Carbon\Carbon::parse($row->tanggal_kadaluarsa )->format('d-m-Y');
            }

            return $action;
        })
        ->addColumn('action', function($row){
                
            $action = ''; 

            if (Gate::allows('edit obat')){
                $action = '<button type="button" class="btn btn-sm action" data-id='.$row->id.' data-jenis="edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button>';
            }

            if (Gate::allows('delete obat')){
                $action .= ' <button type="button" class="btn btn-sm action" data-id='.$row->id.' data-jenis="delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>';
            }

            return $action;
            
        })
        ->rawColumns(['stok','stok_minimal','tanggal_kadaluarsa','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Obat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Obat $model)
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
                    ->setTableId('obat-table')
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
            Column::make('nama_obat'),
            Column::make('stok'),
            Column::make('stok_minimal'),
            Column::make('tanggal_kadaluarsa'),
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
        return 'Obat_' . date('YmdHis');
    }
}
