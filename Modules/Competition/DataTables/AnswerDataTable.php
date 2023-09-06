<?php

namespace Modules\Competition\DataTables;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Competition\Entities\Quizzes;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AnswerDataTable extends DataTable
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
            ->eloquent($query)->addIndexColumn()
            ->editColumn('assign_to', function ($row) {
                return $row->user->name;
            })
            ->editColumn('quize_name', function ($row) {
                return $row->name;
            })
            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                if (auth()->user()->can('isAdmin')) {
                    $html .= '<a class="dropdown-item edit-btn"  href="' . route('quizzes.edit', $row->id) . '">Edit</a>';
                    $html .= '<a class="dropdown-item delete-btn border" href="' . route('quizzes.destroy', $row->id) . '">Delete</a>';
                }
                if (auth()->user()->can('isAdmin')) {
                    if($row->status == 1 && $row->answer != null){
                        $html .= '<a class="dropdown-item ans-btn text-success" href="' . route('quizzes.approve', $row->id) . '">Answer Approve Pending</a>';
                        $html .= '<a class="dropdown-item ans-btn text-danger" href="' . route('quizzes.reject', $row->id) . '">Answer Reject</a>';
                    }
                    if($row->status == 1 && $row->answer == null){
                        $html .= '<a class="dropdown-item ans-btn text-success">Answer Pending</a>';
                    }
                    if($row->status == 3){
                        $html .= '<a class="dropdown-item ans-btn text-info">Answer Approved</a>';
                    }
                }
                $html .= '</div>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TaskDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Quizzes $model)
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('taskdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
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
            Column::computed('DT_RowIndex', 'SL NO'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::computed('quize_name'),
            Column::make('assign_to'),
            Column::make('answer'),
            Column::make('point'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'Task_' . date('YmdHis');
    }
}
