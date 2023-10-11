<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Location;

class LocationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Location';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Location());

        $grid->column('l_id', __('L id'));
        $grid->column('Region', __('Region/City'));
        $grid->column('Zone', __('Zone/Sub-City'));
        // $grid->column('Wereda', __('Wereda/Unique-Area'));
        // $grid->column('Latitude', __('Latitude'));
        // $grid->column('Longitude', __('Longitude'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Location::findOrFail($id));

        $show->field('l_id', __('Location id'));
        $show->field('Region', __('Region/City'));
        $show->field('Zone', __('Zone/Sub-City'));
        // $show->field('Wereda', __('Wereda/Unique-Area'));
        // $show->field('Latitude', __('Latitude'));
        // $show->field('Longitude', __('Longitude'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Location());

        $form->text('Region', __('Region/City'));
        $form->text('Zone', __('Zone/Sub-City'));
        // $form->text('Wereda', __('Wereda/Unique-Area'));
        // $form->text('Latitude', __('Latitude'));
        // $form->text('Longitude', __('Longitude'));

        return $form;
    }
}
