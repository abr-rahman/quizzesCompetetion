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

class UserQuizzeDataTable extends DataTable
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
            ->editColumn('question', function ($row) {
                return $row->question->question;
            })

            ->addColumn('action', function ($row) {
                $html = '<div class="dropdown">';
                $html .= '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>';
                $html .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                if (auth()->user()->can('isAdmin')) {
                    $html .= '<a class="dropdown-item edit-btn"  href="' . route('quizzes.edit', $row->id) . '">Edit</a>';
                    $html .= '<a class="dropdown-item delete-btn" href="' . route('quizzes.destroy', $row->id) . '">Delete</a>';
                }
                if($row->answer == null){
                    if (auth()->user()->can('isUser')) {
                        $html .= '<a class="dropdown-item ans-btn" href="' . route('quizzes.answer', $row->id) . '">Answer</a>';
                    }
                }
                if ($row->status == 3) {
                    $html .= '<a class="dropdown-item text-info">Approved</a>';
                }
                if ($row->status == 4) {
                    $html .= '<a class="dropdown-item text-success">Pending</a>';
                }
                if ($row->status == 5) {
                    $html .= '<a class="dropdown-item text-danger">Rejected</a>';
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
        if (auth()->user()->can('isUser')) {
            return $model->newQuery()->where('user_id', Auth::id())->orderBy('created_at', 'desc');
        }
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
                  Column::make('name'),
                  Column::make('question'),
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
