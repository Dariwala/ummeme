@extends('layouts.admin_master')

@section('title', 'Physiotherapy & Rehabilitation Center')

@section('angular')
    <script src="{{url('app/admin/physiotherapy/physiotherapy.module.js')}}"></script>
    <script src="{{url('app/admin/physiotherapy/physiotherapy.doctor_edit_controller.js')}}"></script>
@endsection


@section('content')
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Physiotherapy & Rehabilitation Center</h3>
        @include('partials.flash_message')
        <div class="md-card"  ng-controller="PhysiotherapyDoctorEditController">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    {!! Form::open(['url' => array('physiotherapy/edit/doctor/edit', $physiotherapy_doctor_id), 'method' => 'post', 'class' => 'uk-form-stacked']) !!}
                        <div class="uk-grid" data-uk-grid-margin>

                        	<input type="hidden" ng-init="physiotherapy_doctor_id='asdfg'" value="{{$physiotherapy_doctor_id}}" name="physiotherapy_doctor_id" ng-model="physiotherapy_doctor_id">

                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="product_form_section" data-uk-grid-match>
                                    <div class="uk-width-9-10">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="department_id" name="department_id" ng-model="department_id" ng-change="getDoctor()" required="">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <select id="medical_specialist_id" name="medical_specialist_id" ng-model="medical_specialist_id" required>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-float-right uk-margin-top">
                                    <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection