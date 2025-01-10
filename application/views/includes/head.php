<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?> | <?= $project_name ?></title>
    <link rel="icon" href="<?= base_url() ?>assets/img/small.png">
    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/venobox/venobox.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/slickslider/slick.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/niceselect/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/index.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/product-details.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/orderlist.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/contact.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/user-auth.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/orderlist.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/checkout.css">
    

</head>

<body>

    <div class="modal" tabindex="-1" aria-labelledby="search_modal" id="search_modal">
        <div class="widget widget_search">
            <form class="searchform form-inline" action="<?= base_url('search') ?>">
                <div class="form-group">
                    <input id="search" type="text" name="searchbox" class="form-control" placeholder="Search...">
                </div>
                <button type="submit" class="theme_button">Search</button>
            </form>
        </div>
    </div>