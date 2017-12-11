<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logo-fav.png')); ?>">
        <title>VIMS</title>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css')); ?>"/><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
        <script src="https://oss.maxcsedn.com/respond/1.4.2/respond.min.js')}}"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/lib/daterangepicker/css/daterangepicker.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/lib/select2/css/select2.min.css')); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/lib/bootstrap-slider/css/bootstrap-slider.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/lib/datatables/css/dataTables.bootstrap.min.css')); ?>"/>

    </head>
    <body>
        <div class="be-wrapper be-fixed-sidebar">
            <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="be-loading loader ">
                <?php echo $__env->yieldContent('content'); ?>



                <!-- Here goes your content -->

                <div class="be-spinner ">
                    <svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30" class="circle"></circle>
                    </svg>
                </div>
            </div>

            <div id="deleteModal" tabindex="-1" role="dialog" class="modal fade in" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <form id="deleteForm">
                            <input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>"/>

                            <input type="hidden" name="itemid" id="itemid"/>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="text-primary">
                                        <span class="modal-main-icon mdi mdi-info-outline"></span></div>
                                    <h3>Information!</h3>
                                    <p>Are you sure you want to delete?</p>
                                    <div class="xs-mt-50"> 
                                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                                        <button type="submit"  class="btn btn-space btn-primary">Proceed</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>





            <div id="resetModal" tabindex="-1" role="dialog" class="modal fade in" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <form id="resetForm">
                            <input type="hidden" name="_token" id="token" value="<?php echo csrf_token() ?>"/>

                            <input type="hidden" name="itemid" id="itemid"/>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="text-primary">
                                        <span class="modal-main-icon mdi mdi-info-outline"></span></div>
                                    <h3>Information!</h3>
                                    <p>Are you sure you want to reset this user password?</p>
                                    <div class="xs-mt-50"> 
                                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                                        <button type="submit"  class="btn btn-space btn-primary">Proceed</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>

            <div id="sessionModal" tabindex="-1" role="dialog" class="modal fade in" >
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="text-center">
                            <div class="text-danger"><span class="modal-main-icon mdi mdi-info"></span></div>
                            <h3>Session Timed Out!</h3>
                            <p>Your Session has expired.You have been inactive for some minutes.Sign out and Login in</p>
                            <div class="xs-mt-50">
                                <button type="button" onclick="SignOut()"  class="btn btn-primary btn-space ">Sign Out</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>

            <div id="infoModal" tabindex="-1" role="dialog" class="modal fade in" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                        </div>
                        <form id="deleteForm">

                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="text-primary">
                                        <span class="modal-main-icon mdi mdi-info-outline"></span></div>
                                    <h3>Information!</h3>
                                    <p>No data found in your selection</p>
                                    <div class="xs-mt-50"> 
                                        <button type="button" data-dismiss="modal" class="btn btn-space btn-default">OK</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>

            <div id="cainfoModal" tabindex="-1" role="dialog" class="modal fade in" >

                <div class="modal-dialog custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
                            <h3 class="modal-title">Car Details</h3>
                        </div>
                        <div class="modal-body">

                            <div class="be-booking-promo">
                                <div class="be-booking-desc">
                                    <h4 class="be-booking-desc-title">Days Since Entry into country
                                    </h4>
                  <!--                    <span class="be-booking-desc-details">Lorem ipsum dolor sit amet, Pellen tesque sit amet odio Integer.</span>-->
                                </div>
                                <div class="be-booking-promo-price">
                                    <div class="be-booking-promo-amount"><span class="price">56</span></div>
                                    <a href="#" class="btn btn-primary be-booking-btn-price">Days</a>
                                </div>
                            </div>

                            <div class="user-info-list panel panel-default">
                                <table class="no-border no-strip skills">
                                    <tbody class="no-border-x no-border-y">
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-account"></span></td>
                                            <td class="item">Owner<span class="icon s7-portfolio"></span></td>
                                            <td>Elliot Kitsipui</td>
                                        </tr>
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-calendar"></span></td>
                                            <td class="item">Entry Date<span class="icon s7-portfolio"></span></td>
                                            <td>20th July 2017</td>
                                        </tr>
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-calendar"></span></td>
                                            <td class="item">Due Date<span class="icon s7-gift"></span></td>
                                            <td>15 Sep 2017</td>
                                        </tr>
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-collection-bookmark"></span></td>
                                            <td class="item">Country<span class="icon s7-phone"></span></td>
                                            <td>Nigeria</td>
                                        </tr>
                                        <tr>
                                            <td class="icon"><span class="mdi mdi-globe-alt"></span></td>
                                            <td class="item">Chassis Number<span class="icon s7-map-marker"></span></td>
                                            <td>GX 6887 12</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="panel-heading panel-heading-divider">Car Property Details
<!--                                    <span class="panel-subtitle">I am a web developer and designer based in Montreal - Canada, I like read books, good music and nature.</span>-->

                                </div>
                                <div class="panel-body">
                                    <table class="no-border no-strip skills">
                                        <tbody class="no-border-x no-border-y">
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-case"></span></td>
                                                <td class="item">Vehicle Type<span class="icon s7-portfolio"></span></td>
                                                <td>Toyota</td>
                                            </tr>
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-cake"></span></td>
                                                <td class="item">Fuel Type<span class="icon s7-gift"></span></td>
                                                <td>1.8 litres</td>
                                            </tr>
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                                                <td class="item">Mileage<span class="icon s7-phone"></span></td>
                                                <td>30,8080 km</td>
                                            </tr>
                                            <tr>
                                                <td class="icon"><span class="mdi mdi-globe-alt"></span></td>
                                                <td class="item">Transmission<span class="icon s7-map-marker"></span></td>
                                                <td>Automatic</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="panel-heading panel-heading-divider">Custom Details
<!--                                    <span class="panel-subtitle">I am a web developer and designer based in Montreal - Canada, I like read books, good music and nature.</span>-->

                                </div>
                                <div class="panel-body">
                                    No custom details
                                </div>

                                <div class="panel-heading panel-heading-divider">DVLA Details
<!--                                    <span class="panel-subtitle">I am a web developer and designer based in Montreal - Canada, I like read books, good music and nature.</span>-->

                                </div>
                                <div class="panel-body">
                                    No dvla details
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
                            <button type="button" data-dismiss="modal" class="btn btn-primary md-close">Print</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <script src="<?php echo e(asset('assets/lib/jquery/jquery.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/js/main.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/bootstrap/dist/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/jquery-ui/jquery-ui.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/jquery.nestable/jquery.nestable.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/moment.js/min/moment.min.js')); ?>"  type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/daterangepicker/js/daterangepicker.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/select2/js/select2.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/select2/js/select2.full.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/bootstrap-slider/js/bootstrap-slider.js')); ?>" type="text/javascript"></script>

        <script src="<?php echo e(asset('assets/lib/datatables/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/datatables/js/dataTables.bootstrap.min.js')); ?>" type="text/javascript"></script>
<!--        <script src="<?php echo e(asset('assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/datatables/plugins/buttons/js/buttons.html5.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/datatables/plugins/buttons/js/buttons.flash.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/datatables/plugins/buttons/js/buttons.print.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/datatables/plugins/buttons/js/buttons.colVis.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js')); ?>" type="text/javascript"></script>
        -->

        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.16/api/sum().js"></script>


        <script src="<?php echo e(asset('assets/lib/prettify/prettify.js')); ?>" type="text/javascript"></script>


        <?php echo $__env->yieldContent('customjs'); ?>

        <script type="text/javascript">
                                    $(document).ready(function () {
                                        //initialize the javascript
                                        App.init();
                                        App.formElements();
                                        App.dataTables();
                                        App.loaders();

                                        //Runs prettify
                                        prettyPrint();

                                    });

                                    function SignOut() {
                                        window.location = "<?php echo e(url('logout')); ?>";
                                    }



        </script>   
    </body>
</html>