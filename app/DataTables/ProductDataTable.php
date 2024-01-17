<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $edit = "<a href='" . route('admin.product.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $delete = "<a href='" . route('admin.product.destroy', $query->id) . "' class='btn btn-danger delete-item ms-2'><i class='fas fa-trash'></i></a>";
                $more = '<div class="btn-group">
                <button type="button" class="btn btn-primary ms-2 btn-icon rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="">
                  <li><a class="dropdown-item" href="' . route('admin.product-gallery.show-index', $query->id) . '">Gallery</a></li>

                </ul>
              </div>';
                return $edit . $delete . $more;
            })->addColumn('image', function ($query) {
                return '<img width="60px" src="'  . asset($query->thumbnail_img) . '">';
            })
            ->addColumn('price', function ($query) {
                return '$' . $query->price;
            })
            ->addColumn('offer_price', function ($query) {
                return '$' . $query->offer_price;
            })->addColumn('status', function ($query) {
                if ($query->status === 1) {

                    return '<span class="badge bg-primary">Active</span>';
                } else {
                    return '<span class="badge bg-danger">Inactive</span';
                }
            })
            ->addColumn('show_at_home', function ($query) {
                if ($query->show_at_home === 1) {

                    return '<span class="badge bg-primary">Yes</span>';
                } else {
                    return '<span class="badge bg-danger">No</span';
                }
            })
            ->rawColumns(['price', 'offer_price', 'action', 'status', 'show_at_home', 'image'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0, 'asc')
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
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->width(40),
            Column::make('image')->width(60),

            Column::make('name'),
            Column::make('price'),
            Column::make('offer_price'),
            Column::make('status'),
            Column::make('show_at_home'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
