<?php

namespace App\DataTables;

use App\Models\Perusahaan;
use App\Models\PerusahaanDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PerusahaanDataTables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at',function($row){
                return $row->created_at->format('d-m-Y');
            })
            ->editColumn('updated_at',function($row){
                return $row->updated_at->format('d-m-Y');
            })
            ->editColumn('cabang_id', function($data) {
                return $data->cabang->name;
            })
            ->addColumn('action',function($row){

                $action ='';
                if(Gate::allows('update perusahaan')){
                    $action = '<button type="button" data-id='.$row->id.' data-jenis="edit"
                        class="btn btn-primary btn-sm action"><i class="ti-pencil"></i></button>';
                }
                if(Gate::allows('delete perusahaan')){
                    $action .= ' <button type="button" data-id='.$row->id.' data-jenis="delete"
                        class="btn btn-danger btn-sm action"><i class="ti-trash"></i></button>';
                }

                return $action;
            })
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Perusahaan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Perusahaan $model): QueryBuilder
    {
        return $model->newQuery()->with(['cabang']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
         return $this->builder()
                    ->parameters([
                        'searchDelay'=> 1000,
                        'buttons' => ['excel', 'print', 'pdf']
                        ])
                    ->setTableId('perusahaandatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('mitraPekerja'),
            Column::make('kopkar'),
            Column::make('noPks'),
            Column::make('tglPks'),
            Column::make('lamaPks'),
            Column::make('namaPerusahaan'),
            Column::make('metodeAngsuran'),
            Column::make('namaPic'),
            Column::make('jabatanPic'),
            Column::make('contactPic'),
            Column::make('cabang_id'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(true)
                ->printable(true)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'PerusahaanDataTables_' . date('YmdHis');
    }
}
