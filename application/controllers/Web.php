<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // echo $this->session->userdata('login_user_id');
        // $this->profile = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'))[0];
    }
    public function index()
    {
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['budget'] = $this->CommonModal->getAllRowsInOrder('addbudget', 'id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['testimonials'] = $this->CommonModal->getAllRowsInOrder('testimonials', 'tid', 'desc');
        $data['banner'] = $this->CommonModal->getAllRowsInOrder('banner', 'bid', 'desc');
        $data['products'] = $this->CommonModal->getDataByIdInOrderLimit('products', array('status' => '0'), 'product_id', 'desc', 4, 0);
        $data['discounted'] = $this->CommonModal->getRowByMoreId('products', array('status' => '0', 'sale' => '1'));
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Home';
        $this->load->view('home', $data);
    }
    public function product_list($cat_id)
    {
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';

        if ($cat_id != '') {
            $data['cat'] = $this->CommonModal->getSingleRowById('category', array('category_id' => $cat_id));
            $data['title'] = $data['cat']['cat_name'];
        } else {
            $data['cat'] = '';
            $data['title'] = 'Product list';
        }
        $data['fabric'] = $this->CommonModal->getAllRowsInOrder('tbl_fabric', 'fabric', 'asc');
        $data['length'] = $this->CommonModal->getAllRowsInOrder('tbl_length', 'length', 'asc');
        $data['pattern'] = $this->CommonModal->getAllRowsInOrder('tbl_pattern', 'pattern', 'asc');

        $this->load->view('product_list', $data);
    }
    public function search()
    {
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Search Result';
        $search = $this->input->get('searchbox');
        $query = "SELECT * FROM `tbl_products` WHERE  `pro_name` LIKE '%" . trim($search) . "%'  OR `price` LIKE '%" . trim($search) . "%' OR `description` LIKE '%" . trim($search) . "%' ";
        $data['products'] = $this->CommonModal->runQuery($query);
        $this->load->view('search-data', $data);
    }

    public function contact()
    {
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Contact Us';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $insert = $this->CommonModal->insertRowReturnId('contact_query', $post);
            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Your query is successfully submit. We will contact you as soon as possible.</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.</div>');
            }
        } else {
        }
        $this->load->view('contact', $data);
    }
    public function about()
    {
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'About Us';

        $this->load->view('about', $data);
    }

    public function register()
    {
        if ($this->session->has_userdata('login_user_id')) {
            redirect(base_url('profile'));
        }
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Register with us';
        if (count($_POST) > 0) {
            $count = $this->CommonModal->getNumRows('user_registration', array('emailid' => $this->input->post('emailid'), 'emailid' => $this->input->post('emailid')));
            if ($count > 0) {
                userData('msg', '<h6 class="alert alert-warning">You have already registered with this email id or contact no.</h6>');
            } else {
                $post = $this->input->post();
                // $post['password'] = rand(1111,9999);

                $mail_body = "Hello ,<br><br>
                We are really exited to see you with us.Here is your login account credentials.<br>
                <b>Username</b> - (will be your email ID)<br/>
                <b>Password</b> - " . $post['password'] . "<br/><br/>
                If you have any query and need any support then do please mail us at info@kalakarnii.com. <br/>
                ";
                // sendEmail( $this->input->post('emailid'), 'Kalakarnii | Here is your password.', $mail_body);

                // exit();
                $regid = $this->CommonModal->insertRowReturnId('user_registration', $post);
                if (!empty($regid)) {
                    userData('msg', '<h6 class="alert alert-success">You have Registered Successfully. Login to continue.</h6>');
                } else {
                    userData('msg', '<h6 class="alert alert-danger">Server error</h6>');
                }
            }
        } else {
        }
        $this->load->view('register', $data);
    }
    public function logincode()
    {
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "user_registration";
            $login_data = $this->CommonModal->getRowByMoreId($table, array('emailid' => $contact))[0];
            if (!empty($login_data)) {
                if ($login_data['password'] == $otp) {
                    userData('login_user_id', $login_data['reg_id']);
                    if (count($this->cart->contents()) > 0) {
                        echo '5';
                    } else {
                        echo '0';
                    }
                } else {
                    echo '1';
                }
            } else {
                echo '2';
            }
        } else {
            echo '3';
        }
    }

    public function login()
    {
        if (sessionId('login_user_id')) {
            redirect(base_url());
        }
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['title'] = 'Login | Kalakarnii';
        $this->load->view('login', $data);
    }
    public function my_orders()
    {
        if (!sessionId('login_user_id')) {
            redirect(base_url());
        }

        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'My orders';

        $data['orderDetails'] = $this->CommonModal->getRowByIdInOrder('checkout', "`user_id`='" . $this->session->userdata('login_user_id') . "' AND `status` != '4'", 'id', 'DESC');
        $data['cancelOrderDetails'] = $this->CommonModal->getRowByIdInOrder('checkout', "`user_id`='" . $this->session->userdata('login_user_id') . "' AND `status` = '4'", 'id', 'DESC');
        $this->load->view('orders', $data);
    }
    public function cart()
    {

        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'My cart';

        $this->load->view('cart', $data);
    }

    public function payment_closed()
    {

        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $this->CommonModal->updateRowById('checkout', 'id', sessionId('checkoutid'), array('status' => '6', 'payment_status' => '2'));
        $data['logo'] = 'assets/logo.png';
        $this->cart->destroy();
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Payment Status - Closed';
        $msg = '';
        $msg .= "<h4>Your transaction got Failed</h4>";
        $msg .= "<br/>";
        $msg .= "Payment closed by user";
        $msg .= "<br/>";
        $msg .= "Your Order is cancelled";
        $data['message'] = $msg;
        $this->load->view('payment_msg', $data);
    }


    public function guest_checkout($url)
    {
        $guestData = ['type' => '1', 'fullname' => 'Guest', 'emailid' => null, 'contact' => null];
        $regid = $this->CommonModal->insertRowReturnId('user_registration', $guestData);
        userData('login_user_id', $regid);
        if($url == 1){
            redirect(base_url());
        }
        $this->checkout();
    }

    public function checkout()
    {
        if (!$this->session->has_userdata('login_user_id')) {
            // $this->session->set_userdata('checkout', 'Login here to continue');
            redirect(base_url('login'));
        } else {
            $data['login'] = $this->CommonModal->getRowById('user_registration', 'reg_id', $this->session->userdata('login_user_id'));
        }
        if (count($_POST) > 0) {
            $postdata = $this->input->post();
            $post = $this->CommonModal->insertRowReturnId('checkout', $postdata);
            $msg = '';
            $this->session->set_userdata('checkoutid', $post);
            foreach ($this->cart->contents() as $items) :

                $product = array('checkoutid' => $post, 'product_id' => $items['id'], 'product_img' => $items['image'], 'product_name' => $items['name'], 'product_price' => $items['price'], 'product_quantity' => $items['qty'], 'total_pro_amt' => ($items['price'] * $items['qty']));
                $msg .= "Product name - " . $items['name'] . '(Rs. ' . $items['price'] . ' * ' . $items['qty'] . ')<br/>';
                $this->CommonModal->insertRowReturnId('checkout_product', $product);
            endforeach;

            $mail_body = "Hello Kalakarniians,<br><br>
                We are really exited to see you with us.Here is your order details.<br>
                 " . $msg . "
                 <br/><br/>
                If you have any query and need any support then do please mail us at info@kalakarnii.com. <br/>
                ";
            // sendEmail( $data['login'][0]['emailid'], 'Kalakarnii | Here is your Order Details.', $mail_body);
            if ($post != '') {

                if ($this->input->post('payment_type') == '0') {
                    $this->cart->destroy();
                    redirect(base_url('Web/booking_status'));
                } else {

                    $data['callback_url']       = base_url() . 'Web/callback';
                    $data['surl']               = base_url() . 'Web/razor_pay_success';
                    $data['furl']               = base_url() . 'Web/razor_pay_failed';
                    $data['currency_code']      = 'INR';
                    $data['grandtotal']         = $this->input->post('grand_total');
                    $data['name']               = $this->input->post('name');
                    $data['email']              = $this->input->post('email');
                    $data['number']             = $this->input->post('number');
                    $data['product']             = $post;
                    $this->load->view('razor_pay', $data);
                }
            } else {
                echo 'Check Form Data';
            }
        }
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Checkout ';
        $this->load->view('checkout', $data);
    }


    // initialized cURL Request
    private function curl_handler($payment_id, $amount)
    {
        $url            = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id         = "rzp_live_NDXAFZsfjgQibr";
        $key_secret     = "PXuy745Cfam9CKYjZ7Nolb6m";
        $fields_string  = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        return $ch;
    }
    // callback method
    public function callback()
    {
        // print_r($this->input->post());
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');

            $this->session->set_userdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_userdata('merchant_order_id', $this->input->post('merchant_order_id'));
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {
                $ch = $this->curl_handler($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: ' . curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    //Check success response
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $success = true;
                    } else {
                        $success = false;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                        } else {
                            $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                        }
                    }
                }
                //close curl connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }


            if ($success === true) {
                $updateData = array('razorpay_payment_id' => $this->input->post('razorpay_payment_id'), 'merchant_order_id' => $this->input->post('merchant_order_id'), 'merchant_amount' => $this->input->post('merchant_amount'), 'payment_status' => '1');
                $this->CommonModal->updateRowById('checkout', 'id', $this->input->post('merchant_product_info_id'), $updateData);
                if (!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                // if (!$order_info['order_status_id']) {
                //     redirect($this->input->post('merchant_surl_id'));
                // } else {
                //     redirect($this->input->post('merchant_surl_id'));
                // }
            } else {
                $updateData = array('razorpay_payment_id' => $this->input->post('razorpay_payment_id'), 'merchant_order_id' => $this->input->post('merchant_order_id'), 'merchant_amount' => $this->input->post('merchant_amount'), 'payment_status' => '2');
                $this->CommonModal->updateRowById('checkout', 'id', $this->input->post('merchant_product_info_id'), $updateData);
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }
    public function razor_pay_success()
    {
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $this->cart->destroy();
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Payment Status - success';
        $msg = '';
        $msg .= "<h4>Your transaction is successful</h4>";
        $msg .= "<br/>";
        $msg .= "Transaction ID: " . $this->session->userdata('razorpay_payment_id');
        $msg .= "<br/>";
        $msg .= "Order ID: " . $this->session->userdata('merchant_order_id');
        $data['message'] = $msg;
        $this->load->view('payment_msg', $data);
    }
    public function razor_pay_failed()
    {

        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $this->cart->destroy();
        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Payment Status - failed';
        $msg = '';
        $msg .= "<h4>Your transaction got Failed</h4>";
        $msg .= "<br/>";
        $msg .= "Transaction ID: " . $this->session->userdata('razorpay_payment_id');
        $msg .= "<br/>";
        $msg .= "Order ID: " . $this->session->userdata('merchant_order_id');
        $data['message'] = $msg;
        $this->load->view('payment_msg', $data);
    }
    public function booking_status()
    {

        $data['logo'] = 'assets/logo.png';
        $data['title'] = 'Payment Status - Kisan Greens | Farm Fresh Product in Bhopal, Madhya Pradesh';
        $msg = '';
        $msg .= '<img src="assets/img/order.png" alt="Booking" style="max-width: 250px;"/>';

        $msg .= "<p>We're prepping your order.You will be notified regarding the order shipment shortly .<br/>
        Till then happy shopping</p>";
        $msg .= "<br/>";
        $data['message'] = $msg;
        $this->load->view('payment_msg', $data);
        $this->cart->destroy();
    }
    public function my_profile()
    {
        if (!sessionId('login_user_id')) {
            redirect(base_url());
        }

        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');
        $data['profile'] = $this->CommonModal->getSingleRowById('user_registration', array('reg_id' => sessionId('login_user_id')));

        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'My profile';

        if (count($_POST) > 0) {
            $formdata = $this->input->post();
            $lig = $this->CommonModal->updateRowById('user_registration', 'reg_id', sessionId('login_user_id'), $formdata);
            if ($lig) {
                userData('msg', '<div class="alert alert-success">Profile is updated successfully</div>');
            } else {
                userData('msg', '<div class="alert alert-danger">We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.</div>');
            }
        } else {
        }
        $this->load->view('profile', $data);
    }
    public function logout()
    {
        $this->session->unset_userdata('login_user_id');
        redirect(base_url());
    }
    public function filterData()
    {
        $data['all_data'] = $this->CommonModal->filterdata(
            ((isset($_POST['minimum_price'])) ? $_POST['minimum_price'] : ''),
            ((isset($_POST['maximum_price'])) ? $_POST['maximum_price'] : ''),
            ((isset($_POST['search'])) ? $_POST['search'] : ''),
            ((isset($_POST['category'])) ? $_POST['category'] : ''),
            ((isset($_POST['fabric'])) ? $_POST['fabric'] : ''),
            ((isset($_POST['length'])) ? $_POST['length'] : ''),
            ((isset($_POST['pattern'])) ? $_POST['pattern'] : '')
        );
        // print_r($_POST);
        $this->load->view('single_product', $data);
    }
    public function product_view()
    {
        $id = $this->uri->segment(2);
        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';

        $data['product'] = $this->CommonModal->getRowByMoreId('products', array('product_id' => $id, 'status' => '0'));
        $data['cat'] = $this->CommonModal->getSingleRowById('category', array('category_id' => $data['product'][0]['category_id']));

        // $data['title_o'] = '<li class="active"><a href="' . base_url('type/' . $data['cat']['category_id']) . '">' . $data['cat']['cat_name'] . '</a></li> ';

        $data['title'] = $data['product'][0]['pro_name'];
        $data['products_image'] = $this->CommonModal->getRowById('products_image', 'product_id', $id);
        $this->load->view('product_view', $data);
    }
    public function privacypolicy()
    {

        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Privacy Policy';

        $data['privacypolicy'] = $this->CommonModal->getAllRows('privacypolicy');
        $this->load->view('privacypolicy', $data);
    }
    public function termscondition()
    {

        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'Terms and Condition';

        $data['termscondition'] = $this->CommonModal->getAllRows('terms');
        $this->load->view('termscondition', $data);
    }
    public function faq()
    {

        $data['category'] = $this->CommonModal->getRowByMoreIdInOrder('category', array('status' => '0'), 'category_id', 'desc');
        $data['contactdetails'] = $this->CommonModal->getRowById('contactdetails', 'cid', '1');

        $data['logo'] = 'assets/logo.png';
        $data['project_name'] = 'Kalakarnii | Stiching your dreams';
        $data['title'] = 'FAQ';

        $data['faq'] = $this->CommonModal->getAllRows('faq');
        $this->load->view('faq', $data);
    }
}
