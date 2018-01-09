<?php $__env->startSection('content'); ?>


<div class="layout-content-body">

    <div class="text m-b">
        <h3 class="m-b-0">Users</h3>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-10 ">

            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" id="createUserBtn"  data-whatever="@mdo">Add New User</button>
            </div>
        </div>
    </div>

    <div style="margin-bottom:5px;">

    </div>
    <div class="row">

        <div class="col-xs-12">
            <h4> <p class="userdetails holder"></p></h4>

            <div class="panel">

                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="usersTbl" class="table table-middle nowrap">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>User Group</th>
                                    <th>Created By</th>
                                    <th>Date Created </th>

                                    <th>Edit </th>

                                    <th>Delete </th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New User</h4>
            </div>
            <form id="saveUserForm" >
                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="modal-body">

                    <div class="form-group">
                        <label for="region" class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Contact No:</label>
                        <input type="text" min="10" class="form-control" name="phoneno" id="phoneno" required>
                    </div>

                    <div class="form-group">
                        <label  class="form-label">User Group</label>
                        <select name="userGroup" id="userGroup" class="form-control select2 usergroups" required>

                            <option value="">Choose</option>

                        </select>
                        <span class="help-block"></span>
                    </div>
                    <input type="hidden" class="form-control" name="type" value="saveUser">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="edituserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New User</h4>
            </div>
            <form id="updateUserForm" >
                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="modal-body">

                    <div class="form-group">
                        <label for="region" class="control-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="upname" required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Username:</label>
                        <input type="text" class="form-control" name="username" id="upusername" required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="upemail" required>
                    </div>
                    <div class="form-group">
                        <label for="region" class="control-label">Contact No:</label>
                        <input type="text" min="10" class="form-control" name="phoneno" id="upphoneno" required>
                    </div>

                    <div class="form-group">
                        <label  class="form-label">User Group</label>
                        <select name="userGroup" id="upuserGroup" class="form-control usergroups " required>

                            <option value="">Choose</option>

                        </select>
                        <span class="help-block"></span>
                    </div>
                    <input type="hidden" class="form-control" name="type" value="updateUserInfo">

                    <input type="hidden" class="form-control" name="userid" id="upuserid" >

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="deleteUserForm">
                <div class="modal-body">
                    <div>
                        <p>
                            Are you sure you want to delete this User?.<span class="holder" id="userholder"></span> 
                        </p>
                    </div>
                    <input type="hidden" id="userid" name="userid"/>

                    <input type="hidden" id="token" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit"  class="btn btn-primary">YES</button>
                </div>
            </form>
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





<?php $__env->stopSection(); ?>
<?php $__env->startSection('customjs'); ?>
<script src="<?php echo e(asset('js/users.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>