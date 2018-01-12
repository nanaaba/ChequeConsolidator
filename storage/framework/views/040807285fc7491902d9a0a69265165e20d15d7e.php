    


<?php $__env->startSection('content'); ?>
<h1 class="text-center" style="color:grey">
    Cheque Consolator
</h1>
<div class="login">

    <div class="login-body">
        <!--        <a class="login-brand" href="#">
                    <img class="img-responsive" src="img/logo2.png"  alt="USAD">
                            <img class="img-responsive" src="img/logo.png" height="30" width="70" alt="USAD">
                    
                </a>-->
        <!--        <h4 style="color:grey;text-align: center">Cheque Consolator</h4>-->
        <h3 class="login-heading" style="color:grey">Sign in</h3>
        <p class="holder text-center"></p>
        <div class="login-form">

            <div style="display: none" id='divresponse' role="alert" class="alert alert-danger alert-dismissible">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                    <span aria-hidden="true" class="mdi mdi-close"></span>
                </button><span class="icon mdi mdi-close-circle-o"></span>
                <span id='response'></span>
            </div>
            <form id="loginForm" data-toggle="md-validator"  method="POST">
                <input type="hidden" class="form-control form-control-lg input-lg"  name="_token" value="<?php echo csrf_token() ?>" />

                <div class="md-form-group md-label-floating">
                    <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter username." required>
                    <label class="md-control-label">Email</label>
                </div>
                <div class="md-form-group md-label-floating">
                    <input class="md-form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                    <label class="md-control-label">Password</label>
                </div>
                <div class="md-form-group md-custom-controls">
                    <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" checked="checked">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-label">Keep me signed in</span>
                    </label>
                    <span aria-hidden="true"> </span>
                    <a href="forgot-password">Forgot password?</a>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>

</div>

<script src="<?php echo e(asset('js/vendor.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/elephant.min.js')); ?>"></script>
<script type="text/javascript">

$('#loginForm').on('submit', function (e) {
    e.preventDefault();
    var formData = $(this).serialize();

    console.log(formData);

    $('input:submit').attr("disabled", true);

    $.ajax({
        url: "<?php echo e(url('authenticateuser')); ?>",
        type: "POST",
        data: formData,
        success: function (data) {
            console.log('data : ' + data);
            if (data == "0") {
                window.location = "dashboard";
            } else {
                $('#divresponse').show();
                $('#response').html(data);
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });



});


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>