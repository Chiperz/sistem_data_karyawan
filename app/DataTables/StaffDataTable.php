<?php

namespace App\DataTables;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StaffDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('dob', function($query){
                return date('Y-m-d', strtotime($query->date_of_birth))." (".(date('Y') - date('Y', strtotime($query->date_of_birth)).' tahun)');
            })
            ->addColumn('foto', function($query){
                return "<img src='".asset(empty($query->foto) ? 'uploads/default.png' : $query->foto)."'>";
            })
            ->addColumn('marital', function($query){
                return $query->marital_status == 1 ? '<span class="badge bg-primary">Menikah</span>' 
                : '<span class="badge bg-secondary">Belum Menikah</span>';
            })
            ->addColumn('action', function($query){
                $btnEdit = "<a class='btn btn-warning' href='".route('staff.edit', $query->id)."'>Ubah </a>";
                $btnDelete = "<a class='btn btn-danger delete-item' href='".route('staff.destroy', $query->id)."'>Hapus </a>";

                return $btnEdit.' '.$btnDelete;
            })
            ->rawColumns(['foto', 'marital', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Staff $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('staff-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1,'ASC')
                    ->selectStyleSingle()
                    ->responsive()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            ['data' => 'DT_RowIndex', 'title' => 'No', 'class' => 'text-center', 
            'exportable' => false, 'printable' => false, 'searchable' => false],
            ['data' => 'id', 'title' => 'Id Karyawan', 'visible' => false],
            ['data' => 'name', 'title' => 'Nama Karyawan'],
            ['data' => 'dob', 'title' => 'Tanggal Lahir', 'width' => 120],
            ['data' => 'address', 'title' => 'Alamat'],
            ['data' => 'foto', 'title' => 'Foto', 'width' => 100],
            ['data' => 'marital', 'title' => 'Status Pernikahan'],
            ['data' => 'action', 'title' => 'Aksi', 'class' => 'text-center', 
            'exportable' => false, 'printable' => false, 'searchable' => false]
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Staff_' . date('YmdHis');
    }
}
