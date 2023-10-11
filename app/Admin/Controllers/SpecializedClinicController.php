<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\SpecializedClinic;
use App\Models\Service;
use App\Models\Status;
use App\Models\Location;


class SpecializedClinicController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'SpecializedClinic';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SpecializedClinic());

        $grid->column('sc_id', __('Sc id'));
        $grid->column('sc_name', __('SpecializedClinic name'));
        $grid->column('Region', __('Region/City'));
        $grid->column('Zone', __('Zone/Sub-City'));
        $grid->column('Wereda', __('Wereda/Unique-Area'));
        $grid->column('Latitude', __('Latitude'));
        $grid->column('Longitude', __('Longitude'));
        // $grid->column('Service', __('Service'));
        $grid->column('Service', __('Service'))->display(function ($services) {
            // Ensure $services is an array
            if (is_array($services)) {
                // Return only the service names, separated by commas
                return implode(', ', $services);
            }

            return $services;
        });
        // $grid->column('Status', __('Status'));
        $grid->column('Status', __('Status'))->display(function ($status) {
            // Ensure $services is an array
            if (is_array($status)) {
                // Return only the service names, separated by commas
                return implode(', ', $status);
            }

            return $status;
        });
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
        $show = new Show(SpecializedClinic::findOrFail($id));

        $show->field('sc_id', __('SpecializedClinic id'));
        $show->field('sc_name', __('SpecializedClinic name'));
        $show->field('Region', __('Region/City'));
        $show->field('Zone', __('Zone/Sub-City'));
        $show->field('Wereda', __('Wereda/Unique-Area'));
        $show->field('Latitude', __('Latitude'));
        $show->field('Longitude', __('Longitude'));
        // $show->field('Service', __('Service'));
        $serviceArray = $show->getModel()->Service;

        // Format the "Service" array for display
        $formattedServices = implode(', ', $serviceArray);

        $show->field('Service', __('Service'))->as(function () use ($formattedServices) {
            return $formattedServices;
        });
         // $show->field('Status', __('Status'));
         $statusArray = $show->getModel()->Status;

         $formattedStatuses = implode(', ', $statusArray);
        
         $show->field('Status', __('Status'))->as(function () use ($formattedStatuses) {
             return $formattedStatuses;
         });
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
        $form = new Form(new SpecializedClinic());

        $form->text('sc_id', __('SpecializedClinic id'));
        $form->text('sc_name', __('SpecializedClinic name'));
        $services = Service::pluck('s_name', 's_name');
        $form->multipleSelect('Service', __('Service'))->options($services);

        // $form->text('Status', __('Status'));
        $status = Status::pluck('st_name', 'st_name');
        $form->select('Status', __('Status'))
            ->options($status)
            ->default(1); // Set the default option

     // $form->text('Region', __('Region/City'));
     $regions = Location::distinct('Region')->pluck('Region', 'Region');

     $form->select('Region', __('Region/City'))->options($regions);

     // $form->text('Zone', __('Zone/Sub-City'));
     $zone = Location::distinct('Zone')->pluck('Zone', 'Zone');

     $form->select('Zone', __('Zone/Sub-City'))->options($zone);
        $form->text('Wereda', __('Wereda/Unique-Area'));
        // $form->text('Latitude', __('Latitude'));
        // $form->text('Longitude', __('Longitude'));
        $form->map('Latitude', 'Longitude', 'Location')->default([
            'lat' => 9.005401,
            'lng' => 38.763611,
        ]);
        // $form->text('Service', __('Service'));
         // $form->text('Status', __('Status'));
        //  $status = Status::pluck('st_name', 'st_name');
        //  $form->multipleSelect('Status', __('Status'))->options($status); 

        return $form;
    }
}
