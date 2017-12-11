<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <meta name="description" content="Mer System is a web protal to track farmers activities">

        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@naksoid">
        <meta name="twitter:creator" content="@naksoid">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" href="../img/favicon.ico" sizes="32x32">
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="manifest.json">
        <link rel="mask-icon" href="safari-pinned-tab.svg" color="#27ae60">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
        <link rel="stylesheet" href="<?php echo e(asset('css/vendor.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/elephant.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/application.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/demo.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

    </head>
    <body class="layout layout-header-fixed">
        <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <div class="layout-main">
            <?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="layout-content">
                <?php echo $__env->yieldContent('content'); ?>

            </div>

            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



        </div>

        <?php echo $__env->yieldContent('customjs'); ?>

    </body>
</html>