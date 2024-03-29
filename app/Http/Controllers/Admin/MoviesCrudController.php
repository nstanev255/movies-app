<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MoviesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Validation\Rules\ValidUpload;

/**
 * Class MoviesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MoviesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    private function getFullData($list_view = FALSE): array
    {
        return [
            [
                'name' => 'title',
                'label' => 'Title',
                'type' => 'text'
            ],
            [
                'name' => 'synopsis',
                'label' => 'Synopsis',
                'type' => 'text',
            ],
            [
                'name' => 'aired',
                'label' => 'Aired Date',
                'type' => 'date'
            ],
            [
                'name' => 'score',
                'label' => 'Score',
                'type' => ($list_view ? 'text' : 'number'),
                'attributes' => ['step' => 'any'],
            ],
            [
                'label' => 'Genres',
                'type' => ($list_view ? 'select' : 'select_multiple'),
                'name' => 'genres',
                'entity'=> 'genres',
                'model' => '\App\Models\Genres',
                'attribute' => 'name',
                'pivot' => true
            ],
            [
                'label' => 'Producers',
                'type' => ($list_view ? 'select' : 'select_multiple'),
                'name' => 'producers',
                'entity' => 'producers',
                'model' => '\App\Models\Producers',
                'attribute' => 'name',
                'pivot' => true,
            ],
            [
                'label' => 'Cover Image',
                'name' => 'image',
                'type' => ($list_view ? 'view' : 'upload'),
                'view' => 'partials/image',
                'upload' => true
            ]
        ];
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Movies::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/movies');
        CRUD::setEntityNameStrings('movies', 'movies');

        $this->crud->addFields($this->getFullData());
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
//        CRUD::setFromDb(); // set columns from db columns.
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFullData(true));

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
             'title' => 'required|min:2|max:60',
             'synopsis' => 'max:1024',
             'genres' => 'required',
             'score' => 'numeric|between:0.01,10.00',
             'producers' => 'required',
             // Max of 2MB + only images...
             'image' => ValidUpload::field('required')->file('mimes:jpg,png|max:2048'),
        ]);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


    protected function setupShowOperation() {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFullData(true));
    }
}
