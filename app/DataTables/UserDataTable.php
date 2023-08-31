<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            ->eloquent($query);
            // ->editColumn('status', function ($row) {
            //     if ($row->status == 1) {
            //         $html = '<div class="col-sm-5"><a href="' . route('task.status.active', $row->id) . '" class="btn btn-success" id="check_status"></a> </div>';

            //         return $html;
            //     } else {
            //         $html = '<div class="col-sm-5"><a href="' . route('task.status.inactive', $row->id) . '" class="btn btn-danger" id="check_status"></a> </div>';

            //         return $html;
            //     }
            // })
            // ->addColumn('priority', function ($row) {
            //     if ($row->priority == 'Heigh') {
            //         $html = '<div class="form-check">';
            //         $html .= '<span class="btn-sm btn-success">Heigh</span>';
            //         $html .= '</div>';
            //         return $html;
            //     } else {
            //         $html = '<div class="form-check form-switch">';
            //         $html .= '<span class="btn-sm btn-danger">Low</span>';
            //         $html .= '</div>';
            //         return $html;
            //     }
            // })
            // ->addColumn('action', function ($row) {
            //     $html = '<div class="dropdown">';
            //     $html .= '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
            //     $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
            //     $html .= '<a class="dropdown-item edit-btn"  href="">Edit</a>';
            //     $html .= '<a class="dropdown-item delete-btn" href="">Delete</a>';
            //     $html .= '</div>';
            //     $html .= '</div>';

            //     return $html;
            // })
            // ->rawColumns(['action', 'status', 'priority']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
                    ->setTableId('userdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('print'),
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
            // Column::computed('DT_RowIndex', 'SL'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('name'),
            Column::make('email'),
            Column::make('role'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'User_' . date('YmdHis');
    }
}
