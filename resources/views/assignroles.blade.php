@extends('layouts.master')

@section('content')



<div class="layout-content-body">
    <div class="text m-b">
        <h3 class="m-b-0">Roles And Permissions</h3>
    </div>
    <div class="row gutter-xs">
        <div class="card">

            <div class="card-body">
                <!--                                <div class="text-center"><h4>Activity Completion Reporting Tool </h4></div>
                -->
                <form id="assignPermissionsForm" method="POST" >
                    <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                    <div class="col-xs-12">
                        <div class="col-lg-6 col-md-6 col-sm-12">



                            <div class="form-group">
                                <label  class="form-label">User Group</label>
                                <select name="usergroups" id="usergroups" class="form-control select2" required>

                                    <option value="">Choose</option>

                                </select>
                                <span class="help-block"></span>
                            </div>


                        </div>


                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <a class="btn btn-primary "href="#" id="assign_all" >Assign All</a>

                            </div>

                        </div>

                    </div>

                    <div class="" id="permisiontable" >

                        <table id="formsTbl" class="participants table table-middle nowrap">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Permission</th>
                                    <th></th>


                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>


                        <div class="col-xs-12 ">
                            <div class="col-sm-offset-3 col-sm-6 col-md-offset-6 col-md-6">

                                <button class="btn btn-primary  btn-block pull-right"  type="submit">Save</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>


</div>

<div class="modal fade" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
    <div class="modal-dialog" role="document">


        <div  id="loader" style="margin-top:30% ">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
            <span class="loader-text">Wait...</span>
        </div>


    </div>
</div>



@endsection
@section('customjs')
<script type="text/javascript" src="{{asset('js/account.js')}}"></script>

@endsection 