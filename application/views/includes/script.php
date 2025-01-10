<script src="<?= base_url('assets/') ?>js/compressed.js"></script>
<script src="<?= base_url('assets/') ?>js/main.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/jquery-1.12.4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/popper.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/countdown/countdown.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/niceselect/nice-select.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/slickslider/slick.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url() ?>assets/js/nice-select.js"></script>
<script src="<?= base_url() ?>assets/js/countdown.js"></script>
<script src="<?= base_url() ?>assets/js/accordion.js"></script>
<script src="<?= base_url() ?>assets/js/venobox.js"></script>
<script src="<?= base_url() ?>assets/js/slick.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    function fetchdata() {
        $.ajax({
            url: '<?= base_url("Shop/fetch_cart") ?>',
            success: function(response) {
                $('#cartlist').html(response);
            }
        });
    }
    fetchdata();
    $(document).ready(function() {
        function budget(id) {
            $('.budget' + id).submit();
        }
        $('#submitlogin').click(function() {
            var logincontact = $('#logincontact').val();
            var loginpassword = $('#loginpassword').val();
            if (logincontact == '') {
                $('#loginmsg').text('Contact no required');
            } else {
                if (loginpassword == '') {
                    $('#loginmsg').text('Passcode required');
                } else {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('logincode') ?>",
                        data: {
                            contact: logincontact,
                            otp: loginpassword
                        },
                        beforeSend: function() {
                            $("#submitlogin").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                        },
                        success: function(response) {
                            console.log(response);
                            if (response == '0') {
                                window.location = "<?= base_url() ?>";
                            } else if (response == '1') {
                                $('#loginmsg').html('<div class="alert alert-danger">Incorrect password.</div>');
                            } else if (response == '4') {
                                $('#loginmsg').text('Your account is pending for approval. Please contat us for more details');
                            } else if (response == '2') {
                                $('#loginmsg').html('<div class="alert alert-danger">Please register with us to continue</div>');
                            } else if (response == '5') {
                                window.location = "<?= base_url('checkout') ?>";
                            } else {}
                            $("#submitlogin").text("").html("Login").attr('disabled', false);
                        }
                    });
                }
            }
        });
        $('#submitlogin_check').click(function() {
            var logincontact = $('#logincontact_check').val();
            var loginpassword = $('#loginpassword_check').val();
            if (logincontact == '') {
                $('#loginmsg_check').html('<span class="text-danger">Contact no required</span>');
            } else {
                if (loginpassword == '') {
                    $('#loginmsg_check').html('<span class="text-danger">Passcode required</span>');
                } else {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('logincode') ?>",
                        data: {
                            contact: logincontact,
                            otp: loginpassword
                        },
                        beforeSend: function() {
                            $("#submitlogin_check").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                        },
                        success: function(response) {
                            console.log(response);
                            if (response == '0') {
                                window.location = "<?= base_url() ?>";
                            } else if (response == '1') {
                                $('#loginmsg_check').html('<span class="text-danger">Invalid OTP</span>');
                            } else if (response == '4') {
                                $('#loginmsg_check').html('<span class="text-danger">Your account is pending for approval. Please contat us for more details</span>');
                            } else if (response == '2') {
                                $('#loginmsg_check').html('<span class="text-danger">Please register with us to continue</span>');
                            } else if (response == '5') {
                                window.location = "<?= base_url('checkout') ?>";
                            } else {}
                            $("#submitlogin_check").text("").html("Login").attr('disabled', false);
                        }
                    });
                }
            }
        });
        load_product();
        load_cart_list();

        function mySanckbar() {
            x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }


        // ecommerce script
        // $(document).on('click', '.addtocart', function() {
        //     var pid = $(this).data('id');
        //     console.log(pid);
        //     $.ajax({
        //         method: "POST",
        //         url: "<?= base_url('Shop/addToCart') ?>",
        //         data: {
        //             pid: pid
        //         },
        //         success: function(response) {
        //             load_product();
        //             mySanckbar();
        //             $("#cart").click();
        //         }
        //     });
        // });
        $(document).on('click', '.addtocart', function() {
            var pid = $(this).data('id');
            var qty = $('#qtysidecart' + pid).val();
            $(".addCart").attr('disabled', true);

            $.ajax({
                method: "POST",
                url: "<?= base_url('Shop/addToCart') ?>",
                data: {
                    pid: pid,
                    qty: qty
                },
                beforeSend: function() {
                    $('.cartbtn' + pid).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                },
                success: function(response) {
                    console.log("cart response =" + response);
                    load_product();
                    mySanckbar();
                    $(".addCart").attr('disabled', false);
                    $('#cartbtn' + pid).html('Add');
                    // $("#cart").click();
                }
            });
        });
        $(document).on('click', '.buynow', function() {
            var pid = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "<?= base_url('Shop/addToCart') ?>",
                data: {
                    pid: pid
                },
                success: function(response) {
                    window.location = "<?= base_url('cart') ?>";
                }
            });
        });
        $(document).on('click', '.removeCarthm', function() {
            var pid = $(this).data('id');
            console.log(pid);
            $.ajax({
                method: "POST",
                url: "<?= base_url('Shop/delete_item') ?>",
                data: {
                    pid: pid
                },
                success: function(response) {
                    load_product();
                    <?php
                    if (strtolower($title) == 'my cart') {
                    ?>
                        load_cart_list();
                    <?php
                    } else {
                    ?>
                        $("#cart").click();
                    <?php
                    }
                    ?>


                }
            });
        });
        $(document).on('click', '.qty', function() {
            var numberField = jQuery(this).parent().find('[type="number"]');
            var currentVal = numberField.val();
            var sign = jQuery(this).val();
            if (sign === '-') {
                if (currentVal > 1) {
                    numberField.val(parseFloat(currentVal) - 1);
                }
            } else {
                numberField.val(parseFloat(currentVal) + 1);
            }

            var rowid = jQuery(this).data('rowid');
            var price = jQuery(this).data('price');
            var qty = numberField.val();

            $.ajax({
                method: "POST",
                url: "<?= base_url("Shop/update_qty") ?>",
                data: {
                    rowid: rowid,
                    qty: qty
                },
                success: function(response) {
                    load_product();
                    $('#item_total' + rowid).text((qty * price));
                }
            });
        });

        function load_product() {
            $.ajax({
                url: '<?= base_url("Shop/fetch_data_cart") ?>',
                method: 'POST',
                success: function(response) {
                    $('#cart').html(response);
                }
            });
            $.ajax({
                url: '<?= base_url("Shop/fetch_totalitems") ?>',
                method: 'POST',
                success: function(response) {
                    $('.totalitem').text(response);
                }
            });

            $.ajax({
                url: '<?= base_url("Shop/fetch_totalamount") ?>',
                method: 'POST',
                success: function(response) {
                    $('.totalamount').text(response);

                }
            });
            $.ajax({
                url: '<?= base_url("Shop/guestCheckoutBtn") ?>',
                method: 'POST',
                success: function(response) {
                    $('#guestCheckoutBtnWrapper').html(response);

                }
            });
        }

        function load_cart_list() {
            $.ajax({
                url: '<?= base_url("Shop/fetch_data_cart") ?>',
                method: 'POST',
                success: function(response) {
                    $('#cart_items_preview').html(response);
                }
            });

        }

        //  other script
    });
</script>