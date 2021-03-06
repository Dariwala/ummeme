@extends('layouts.admin_master')

@section('title', 'Pharmacy')

@section('angular')
    <script src="{{url('app/admin/pharmacynew/pharmacynew.module.js')}}"></script>
    <script src="{{url('app/admin/pharmacynew/pharmacynew.controller.js')}}"></script>
@endsection

@section('content')
<style type="text/css">
    tr:nth-child(even) 
    {
        background-color: #f2f2f2;
    }
</style>
<div id="page_content" ng-controller="PharmacynewController">
        <div id="page_content_inner">
            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="" id="user_profile">
                <div class="uk-width-large-1-1">
                @include('partials.flash_message')
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar" style="width:100%;margin-left: calc(50% - 41px);margin-top:16px;">
                                @if($pharmacynew->photo_path == '')
                                <div class="thumbnail"><img alt="pharmacynew"  src="{{asset('/pharmacynew.png')}}">
                                </div>
                                @else
                                <div class="thumbnail"><img alt="pharmacynew" src="{{ url($pharmacynew->photo_path) }}">
                                </div>
                                @endif
                            </div>


                            <div class="user_heading_content" style="display:table;margin:0 auto;">
                                <h2 class="heading_b"><span style="margin: 10px;" class="uk-text-truncate">{{$pharmacynew->pharmacynew_name}}</span>
                                </h2>
                            </div>
                        </div>


                        <div class="user_content">
                            <ul class="uk-tab" data-uk-sticky="{ top: 48, media: 960 }" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" id="user_profile_tabs">
                                <li class="uk-active">
                                    <a style="text-align:center" href="#">Info</a>
                                </li>

                                <li class="">
                                    <a style="text-align:center" href="#">About</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Article</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Doctor</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Medicinal</a>
                                </li>
                                <li>
                                    <a style="text-align:center" href="#">Service</a>
                                </li>
                            </ul>


                            <ul class="uk-switcher uk-margin" id="user_profile_tabs_content">
                                <li ng-controller="PharmacynewController">
                                    {!! Form::open(['url' => array('pharmacynew/edit/info', $pharmacynew->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <input type="hidden" ng-init="pharmacynew_id='asdfg'" value="{{$pharmacynew_id}}" name="pharmacynew_id" ng-model="pharmacynew_id">


                                            <div class="uk-width-medium-1-2">
                                                <select id="district_id" name="district_id" ng-model="district_id" ng-change="getSubdistrict()" required>
                                                </select>
                                            </div>
                                            <div class="uk-width-medium-1-2" >
                                                <select id="subdistrict_id" name="subdistrict_id" ng-model="subdistrict_id">
                                                </select>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="pharmacynew_name"> Title<span class="req">*</span></label>
                                                    <input type="text" id="pharmacynew_name" name="pharmacynew_name" value="{{ $pharmacynew->pharmacynew_name}}" required class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_pharmacynew_name"> শিরোনাম<span class="req">*</span></label>
                                                    <input type="text" id="b_pharmacynew_name" name="b_pharmacynew_name" value="{{ $pharmacynew->b_pharmacynew_name}}" required class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="pharmacynew_subname"> Sub-Title<span class="req"></span></label>
                                                    <input type="text" id="pharmacynew_subname" name="pharmacynew_subname" value="{{ $pharmacynew->pharmacynew_subname}}" class="md-input" /> 
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row uk-margin-top">
                                                    <label for="b_pharmacynew_subname"> উপ-শিরোনাম<span class="req"></span></label>
                                                    <input type="text" id="b_pharmacynew_subname" name="b_pharmacynew_subname" value="{{ $pharmacynew->b_pharmacynew_subname}}" class="md-input" /> 
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="parsley-row ">
                                                     <label for="add_publication_title">Pharmacy Photo<span class="req"></span></label>
                                                </div>
                                                <div class="parsley-row uk-margin-top">
                                                    <input type="file" id="pharmacynew_photo" name="pharmacynew_photo" class="dropify"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-float-right uk-margin-top">
                                            <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li ng-controller="PharmacynewController">
                                    {!! Form::open(['url' => array('pharmacynew/edit/about', $pharmacynew->id), 'method' => 'POST', 'files' => true]) !!}
                                    <div class="uk-grid " data-uk-grid-margin>
                                        
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">Description</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="pharmacynew_description" name="pharmacynew_description" value="{{ $pharmacynew->pharmacynew_description}}" cols="10" rows="3" data-parsley-trigger="keyup" >{{ $pharmacynew->pharmacynew_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="add_course_description">বর্ণনা</label>
                                            <div class="parsley-row uk-margin-top">
                                                <textarea class="md-input" id="b_pharmacynew_description" name="b_pharmacynew_description" value="{{ $pharmacynew->b_pharmacynew_description}}" cols="10" rows="3" data-parsley-trigger="keyup" >{{ $pharmacynew->b_pharmacynew_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="pharmacynew_address">Address</label>
                                                <textarea class="md-input" id="pharmacynew_address" name="pharmacynew_address" value="{{ $pharmacynew->pharmacynew_address}}" cols="10" rows="2" data-parsley-trigger="keyup" >{{ $pharmacynew->pharmacynew_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="b_pharmacynew_address">ঠিকানা</label>
                                                <textarea class="md-input" name="b_pharmacynew_address"  cols="10" rows="2"  value="{{ $pharmacynew->b_pharmacynew_address}}" >{{ $pharmacynew->b_pharmacynew_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="pharmacynew_phone_no">Phone</label>
                                                        <textarea class="md-input" id="pharmacynew_phone_no" name="pharmacynew_phone_no" cols="10" rows="3" data-parsley-trigger="keyup">{{$pharmacynew->pharmacynew_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="b_pharmacynew_phone_no">ফোন</label>
                                                        <textarea class="md-input" type="text" id="b_pharmacynew_phone_no" name="b_pharmacynew_phone_no" cols="10" rows="3" data-parsley-trigger="keyup" class="md-input">{{$pharmacynew->b_pharmacynew_phone_no}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" data-uk-grid-match>
                                                <div class="uk-width-10-10">
                                                    <div class="parsley-row uk-margin-top">
                                                        <label for="pharmacynew_email_ad">Email</label>
                                                        <input type="text" id="pharmacynew_email_ad" name="pharmacynew_email_ad" value="{{ $pharmacynew->pharmacynew_email_ad }}" class="md-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="pharmacynew_web_link">Website<span class="req"></span></label>
                                                <input type="text" id="pharmacynew_web_link" name="pharmacynew_web_link" value="{{$pharmacynew->pharmacynew_web_link}}"  class="md-input" /> 
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">General Info</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="add_publication_title" name="total_medicine" value="{{ $pharmacynew->total_medicine}}" required class="md-input">{{ $pharmacynew->total_medicine}}</textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="parsley-row uk-margin-top">
                                                <label for="add_publication_title">সাধারণ তথ্য</label>
                                                <div class="parsley-row uk-margin-top">
                                                    <textarea type="text" id="add_publication_title2" name="b_total_medicine" value="{{ $pharmacynew->b_total_medicine}}" required class="md-input">{{ $pharmacynew->b_total_medicine}}</textarea>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-float-right uk-margin-top">
                                        <button type="submit" class="md-btn md-btn-primary" style="background: #FD0100;color: #fff;">Submit</button>
                                    </div>
                                {!! Form::close() !!}
                                </li>
                                <li>
                                    <form action="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="pharmacynew_id='asdfg'" value="{{$pharmacynew_id}}" name="pharmacynew_id" ng-model="pharmacynew_id">
                                                    
                                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="data_table2">
                                                        <thead>
                                                            <tr>
                                                                <th data-priority="critical">Id</th>
                                                                <th data-priority="2">Created at</th>
                                                                <th data-priority="2">Updated at</th>
                                                                <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>
                                                                <th class="uk-text-center">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @foreach($pharmacynew_notices as $pharmacynew_notice)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $pharmacynew_notice->created_at}}</td>
                                                                <td>{{ $pharmacynew_notice->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('pharmacynew/edit/notice/edit'.'/'.$pharmacynew_notice->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm3">
                                                                    <input class="confirm_id3" type="hidden" name="id3" value="{{$pharmacynew_notice->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->
                                                @if(count($pharmacynew_notices)<1)
                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('pharmacynew/edit/notice/add'.'/'.$pharmacynew_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                
                                <li>
                                    {!! Form::open(['url' => array('pharmacynew/edit/doctor', $pharmacynew->id), 'method' => 'POST', 'files' => true]) !!}
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-overflow-container uk-margin-bottom">

                                                    <input type="hidden" ng-init="pharmacynew_id='asdfg'" value="{{$pharmacynew_id}}" name="pharmacynew_id" ng-model="pharmacynew_id">
                                                    
                                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="data_table2">
                                                        <thead>
                                                            <tr>
                                                                <th data-priority="critical">Id</th>
                                                                <th data-priority="critical">Name</th>
                                                                <th data-priority="critical">Speciality</th>
                                                                <th data-priority="2">Created at</th>
                                                                <th data-priority="2">Updated at</th>
                                                                <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Speciality</th>
                                                                <th>Created at</th>
                                                                <th>Updated at</th>
                                                                <th class="uk-text-center">Actions</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        <?php  $i=1; ?>
                                                        @foreach($pharmacynew_doctors as $pharmacynew_doctor)
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td>{{ $pharmacynew_doctor->medicalSpecialist->medical_specialist_name}}</td>
                                                                <td>{{ $pharmacynew_doctor->medicalSpecialist->medical_specialist_subname}}</td>
                                                                <td>{{ $pharmacynew_doctor->created_at}}</td>
                                                                <td>{{ $pharmacynew_doctor->updated_at}}</td>
                                                                <td class="uk-text-center">
                                                                    <a href="{{ url('pharmacynew/edit/doctor/edit'.'/'.$pharmacynew_doctor->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                    <a class="confirm2">
                                                                    <input class="confirm_id2" type="hidden" name="id2" value="{{$pharmacynew_doctor->id}}">
                                                                    <i class="md-icon material-icons">&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                         @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Add Publication plus sign -->

                                                <div class="md-fab-wrapper Publication-create">
                                                    <a id="add_Publication_name_button" href="{{ url('pharmacynew/edit/doctor/add'.'/'.$pharmacynew_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                        <i class="material-icons">&#xE145;</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                                <li>
                                    <div class="md-card">
                                        <div class="md-card-content">
                                            <div class="uk-overflow-container uk-margin-bottom">
                                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="data_table2">
                                                    <thead>
                                                        <tr>
                                                            <th data-priority="critical">Id</th>
                                                            <th data-priority="2">Created at</th>
                                                            <th data-priority="2">Updated at</th>
                                                            <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Created at</th>
                                                            <th>Updated at</th>
                                                            <th class="uk-text-center">Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php  $i=1; ?>
                                                        @foreach($pharmacynew_products as $pharmacynew_product)
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td>{{ $pharmacynew_product->created_at}}</td>
                                                            <td>{{ $pharmacynew_product->updated_at}}</td>
                                                            <td class="uk-text-center">
                                                                <a href="{{ url('pharmacynew/edit/product/edit'.'/'.$pharmacynew_product->id.'/'.$pharmacynew_id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                <a class="confirm1">
                                                                <input class="confirm_id1" type="hidden" name="id1" value="{{$pharmacynew_product->id}}">
                                                                <i class="md-icon material-icons">&#xE872;</i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Add Publication plus sign -->
                                            @if(count($pharmacynew_products)< 1)
                                            
                                            <div class="md-fab-wrapper Publication-create">
                                                <a id="add_Publication_name_button" href="{{ url('pharmacynew/edit/product/add'.'/'.$pharmacynew_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                    <i class="material-icons">&#xE145;</i>
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-card">
                                        <div class="md-card-content">
                                            <div class="uk-overflow-container uk-margin-bottom">
                                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="data_table2">
                                                    <thead>
                                                        <tr>
                                                            <th data-priority="critical">Id</th>
                                                            <th data-priority="2">Name</th>
                                                            <th data-priority="2">Created at</th>
                                                            <th data-priority="2">Updated at</th>
                                                            <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Name</th>
                                                            <th>Created at</th>
                                                            <th>Updated at</th>
                                                            <th class="uk-text-center">Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php  $i=1; ?>
                                                        @foreach($pharmacynew_services as $pharmacynew_service)
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td>{{ $pharmacynew_service->service->service_name }}</td>
                                                            <td>{{ $pharmacynew_service->created_at}}</td>
                                                            <td>{{ $pharmacynew_service->updated_at}}</td>
                                                            <td class="uk-text-center">
                                                                <a href="{{ url('pharmacynew/edit/service/edit'.'/'.$pharmacynew_service->id) }}" class="publication-edit" ><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                
                                                                <a class="confirm4">
                                                                    <input class="confirm_id4" type="hidden" name="id4" value="{{ $pharmacynew_service->id }}">
                                                                    <i class="md-icon material-icons">&#xE872;</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Add Publication plus sign -->
                                            <div class="md-fab-wrapper Publication-create">
                                                <a id="add_Publication_name_button" href="{{ url('pharmacynew/edit/service/add'.'/'.$pharmacynew_id) }}"  class="md-fab md-fab-accent Publication-create">
                                                    <i class="material-icons">&#xE145;</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    CKEDITOR.replace('pharmacynew_description');
    CKEDITOR.replace('add_publication_title');
    CKEDITOR.replace('add_publication_title2');
</script>
<script type="text/javascript">
    CKEDITOR.replace('b_pharmacynew_description');
</script>

<script type="text/javascript">
    $('.confirm1').click(function(){
        var id1 = $('.confirm_id1', $(this)).val();
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            window.location.href = "/pharmacynew/edit/product/delete/"+id1;
        })
    });
</script>
<script type="text/javascript">
    $('.confirm2').click(function(){
        var id2 = $('.confirm_id2', $(this)).val();
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            window.location.href = "/pharmacynew/edit/doctor/delete/"+id2;
        })
    });
</script>
<script type="text/javascript">
    $('.confirm3').click(function(){
        var id3 = $('.confirm_id3', $(this)).val();
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            window.location.href = "/pharmacynew/edit/notice/delete/"+id3;
        })
    });
</script>
<script type="text/javascript">
    $('.confirm4').click(function(){
        var id4 = $('.confirm_id4', $(this)).val();
        alert
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            window.location.href = "/pharmacynew/edit/service/delete/"+id4;
        })
    });
</script>
@endsection