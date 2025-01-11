<?php
defined('BASEPATH') or exit('no direct access allowed');

class Admin_Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (sessionId('admin_id') == "") {
            redirect(base_url('admin'));
        }
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {
        $data['title'] = "Home";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['subcategory'] = $this->CommonModal->getNumRow('sub_category');
        $data['category'] = $this->CommonModal->getNumRow('category');
        $data['products'] = $this->CommonModal->getNumRow('products');
        $data['user_registration'] = $this->CommonModal->getNumRow('user_registration');
        $data['contact_query'] = $this->CommonModal->getNumRow('contact_query');
        $data['new'] = $this->CommonModal->getNumRows('checkout', array('status' => '0'));
        $data['working'] = $this->CommonModal->getNumRows('checkout', array('status' => '1'));
        $data['cancelled'] = $this->CommonModal->getNumRows('checkout', array('status' => '2'));
        $data['completed'] = $this->CommonModal->getNumRows('checkout', array('status' => '3'));
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'create_date_only', setDateOnly());
        $this->load->view('admin/dashboard', $data);
    }

    public function banner()
    {

        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Home Banner";
        $data['banner'] = $this->CommonModal->getAllRows('banner');
        $config['upload_path'] = base_url('uploads/banner');

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $no = rand();
            $folder = "./uploads/banner/";
            move_uploaded_file($_FILES["b_img"]["tmp_name"], "$folder" . $no . $_FILES["b_img"]["name"]);
            $file_name = $no . $_FILES["b_img"]["name"];
            $post['b_img'] =  $file_name;
            $savedata = $this->CommonModal->insertRowReturnId('banner', $post);

            if ($savedata) {
                $this->session->set_flashdata('msg', 'Banner added Sucessfully');
                $this->session->set_flashdata('msg_class', 'alert-success');;
            } else {
                $this->session->set_userdata('msg', 'Something went Wrong. please try again later  ');
            }
            redirect(base_url('admin_Dashboard/banner'));
        } else {
            $this->load->view('admin/banner', $data);
        }
    }
    public function budget()
    {

        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Home budget";
        $data['budget'] = $this->CommonModal->getAllRows('addbudget');
        $config['upload_path'] = base_url('uploads/budget');

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $no = rand();
            $folder = "./uploads/budget/";
            move_uploaded_file($_FILES["b_img"]["tmp_name"], "$folder" . $no . $_FILES["b_img"]["name"]);
            $file_name = $no . $_FILES["b_img"]["name"];
            $post['image'] =  $file_name;
            $savedata = $this->CommonModal->insertRowReturnId('addbudget', $post);

            if ($savedata) {
                $this->session->set_flashdata('msg', 'budget added Sucessfully');
                $this->session->set_flashdata('msg_class', 'alert-success');;
            } else {
                $this->session->set_userdata('msg', 'Something went Wrong. please try again later  ');
            }
            redirect(base_url('admin_Dashboard/budget'));
        } else {
            $this->load->view('admin/budget', $data);
        }
    }
    public function deletebudget($bid)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "addbudget";
        $data = $this->CommonModal->getRowById('addbudget', 'id', $bid);
        print_r($data[0]['image']);
        if (file_exists("./uploads/budget/' . $data[0]['image']")) {
            unlink('./uploads/budget/' . $data[0]['image']);
        }

        if ($this->CommonModal->deleteRowById($table, array('id' => $bid))) {

            $this->session->set_flashdata('msg', 'budget Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'budget not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect('admin_Dashboard/budget');
    }

    public function length()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = " Dresses Length";
        $data['length'] = $this->CommonModal->getAllRows('length');
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $savedata = $this->CommonModal->insertRowReturnId('length', $post);

            if ($savedata) {
                $this->session->set_flashdata('msg', 'length added Sucessfully');
                $this->session->set_flashdata('msg_class', 'alert-success');;
            } else {
                $this->session->set_userdata('msg', 'Something went Wrong. please try again later  ');
            }
            redirect(base_url('admin_Dashboard/length'));
        } else {
            $this->load->view('admin/lenght', $data);
        }
    }
    public function deletelength($bid)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "length";
        $data = $this->CommonModal->getRowById('length', 'id', $bid);

        if ($this->CommonModal->deleteRowById($table, array('id' => $bid))) {

            $this->session->set_flashdata('msg', 'length Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'length not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect('admin_Dashboard/length');
    }

    public function fabric()
    {

        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Home fabric";
        $data['fabric'] = $this->CommonModal->getAllRows('fabric');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $savedata = $this->CommonModal->insertRowReturnId('fabric', $post);

            if ($savedata) {
                $this->session->set_flashdata('msg', 'fabric added Sucessfully');
                $this->session->set_flashdata('msg_class', 'alert-success');;
            } else {
                $this->session->set_userdata('msg', 'Something went Wrong. please try again later  ');
            }
            redirect(base_url('admin_Dashboard/fabric'));
        } else {
            $this->load->view('admin/fabric', $data);
        }
    }
    public function deletefabric($bid)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "fabric";
        $data = $this->CommonModal->getRowById('fabric', 'id', $bid);

        if ($this->CommonModal->deleteRowById($table, array('id' => $bid))) {

            $this->session->set_flashdata('msg', 'fabric Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'fabric not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect('admin_Dashboard/fabric');
    }

    public function pattern()
    {

        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Home pattern";
        $data['pattern'] = $this->CommonModal->getAllRowsInOrder('pattern' , 'id' , 'DESC');

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $savedata = $this->CommonModal->insertRowReturnId('pattern', $post);

            if ($savedata) {
                $this->session->set_flashdata('msg', 'pattern added Sucessfully');
                $this->session->set_flashdata('msg_class', 'alert-success');;
            } else {
                $this->session->set_userdata('msg', 'Something went Wrong. please try again later  ');
            }
            redirect(base_url('admin_Dashboard/pattern'));
        } else {
            $this->load->view('admin/pattern', $data);
        }
    }
    public function deletepattern($bid)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "pattern";
        $data = $this->CommonModal->getRowById('pattern', 'id', $bid);

        if ($this->CommonModal->deleteRowById($table, array('id' => $bid))) {

            $this->session->set_flashdata('msg', 'pattern Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'pattern not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect('admin_Dashboard/pattern');
    }

    public function deletebanner($bid)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "banner";
        $data = $this->CommonModal->getRowById('banner', 'bid', $bid);
        print_r($data[0]['b_img']);
        if (file_exists("./uploads/banner/' . $data[0]['b_img']")) {
            unlink('./uploads/banner/' . $data[0]['b_img']);
        }

        if ($this->CommonModal->deleteRowById($table, array('bid' => $bid))) {

            $this->session->set_flashdata('msg', 'Banner Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Banner not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect('admin_Dashboard/banner');
    }

    public function disable()
    {
        $id = $this->uri->segment(3);
        $table = $this->uri->segment(4);
        $status = $this->uri->segment(5);

        $data['favicon'] = base_url() . 'assets/logo.png';

        if ($table == 'category') {
            $this->CommonModal->updateRowById($table, 'category_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_category'));
        }
        if ($table == 'sub_category') {
            $this->CommonModal->updateRowById($table, 'sub_category_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_subcategory'));
        }
        if ($table == 'promocode') {
            $this->CommonModal->updateRowById($table, 'pid', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/promocode'));
        }
        if ($table == 'products') {
            $this->CommonModal->updateRowById($table, 'product_id', $id, array('status' => $status));
            redirect(base_url('admin_Dashboard/view_products'));
        }
    }

    public function testimonials()
    {

        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Testimonials  ";
        $data['testimonials'] = $this->CommonModal->getAllRows('testimonials');


        if (count($_POST) > 0) {

            $post = $this->input->post();
            $savedata = $this->CommonModal->insertRowReturnId('testimonials', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', 'Your query is successfully submit. We will contact you as soon as possible.');
            } else {
                $this->session->set_userdata('msg', 'We are facing technical error, please try again later  ');
            }
            redirect(base_url('admin_Dashboard/testimonials'));
        } else {
            $this->load->view('admin/testimonials', $data);
        }
    }
    public function deletetestimonials($tid)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "testimonials";
        $this->CommonModal->deleteRowById($table, array('tid' => $tid));
        redirect('admin_Dashboard/testimonials');
    }

    public function view_category()
    {
        $table = "category";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Product Main Category";
        $data['category'] = $this->Dashboard_model->fetchall($table);
        $this->load->view('admin/view_category', $data);
    }


    public function add_category()
    {
        $data['title'] = "Add Product Main Category";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $this->load->view('admin/add_category', $data);
    }

    public function addcategory()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        if (isset($_POST['submit'])) {

            $cat_name = $this->input->post('cat_name');

            $file_name = imageUpload('image', 'uploads/category/');
            // $no = rand();
            // $folder = base_url() . "uploads/category/";
            // move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
            // $file_name = $no . $_FILES["image"]["name"];

            $table = "category";
            $data = array('cat_name' => $cat_name, 'image' => $file_name);

            if ($this->Dashboard_model->insertdata($table, $data)) {

                $this->session->set_flashdata('msg', 'Category Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }

            redirect(base_url('admin_Dashboard/view_category'));
        } else {
            redirect(base_url('admin_Dashboard/add_category'));
        }
    }



    public function edit_category($category_id = true)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Edit Products Main category";
        $data['categoryInfo'] = $this->Dashboard_model->get_category_Info($category_id);
        $this->load->view('admin/edit_category', $data);
    }

    public function deletecategory($id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "category";

        $data = $this->CommonModal->getRowById('category', 'category_id', $id);

        if (file_exists("./uploads/category/' . $data[0]['image']")) {
            unlink('./uploads/category/' . $data[0]['image']);
        }

        if ($this->CommonModal->deleteRowById($table, array('category_id' => $id))) {
            $this->session->set_flashdata('msg', 'Category Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Category not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }


        redirect('admin_Dashboard/view_category');
    }


    public function view_subcategory()
    {
        $table = "sub_category";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Product Sub Category";
        $data['category'] = $this->Dashboard_model->fetchall($table);
        $this->load->view('admin/view_subcategory', $data);
    }

    public function add_subcategory()
    {
        $data['title'] = "Add Product Sub Category";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['category'] = $this->CommonModal->getAllRows('category');
        $this->load->view('admin/add_subcategory', $data);
    }


    public function addsubcategory()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        if (isset($_POST['submit'])) {

            $cat_id = $this->input->post('cat_id');
            $subcat_name = $this->input->post('subcat_name');

            $file_name = imageUpload('image', 'uploads/subcategory/');

            $table = "sub_category";
            $data = array('cat_id' => $cat_id, 'subcat_name' => $subcat_name, 'image' => $file_name);
            if ($this->Dashboard_model->insertdata($table, $data)) {

                $this->session->set_flashdata('msg', 'Subcategory Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url('admin_Dashboard/view_subcategory'));
        } else {
            redirect(base_url('admin_Dashboard/add_subcategory'));
        }
    }


    public function editcategory()
    {
        $table = "category";
        $data['favicon'] = base_url() . 'assets/logo.png';
        if (isset($_POST['submit'])) {

            $id = $this->input->post('id');
            $cat_name = $this->input->post('cat_name');

            $no = rand();
            if ($_FILES["image"]["name"] == "") {
                $this->db->select("*");
                $this->db->where('category_id', $id);
                $query = $this->db->get($table);
                $result = $query->row();
                $file_name = $result->image;
            } else {
                $uploadfile = $_FILES["image"]["tmp_name"];
                $folder = "uploads/category/";
                move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
                $file_name = $no . $_FILES["image"]["name"];
            }
            $data = array('cat_name' => $cat_name, 'image' => $file_name);

            $update = $this->CommonModal->updateRowById($table, 'category_id', $id, $data);
            if ($update) {

                $this->session->set_flashdata('msg', 'Category Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Category Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }

            redirect(base_url() . 'admin_Dashboard/view_category');
        } else {
            redirect(base_url() . 'admin_Dashboard/edit_category');
        }
    }
    public function edit_subcategory($category_id = true)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Edit Products Sub category";
        $data['categoryInfo'] = $this->CommonModal->getRowById('sub_category', 'sub_category_id', $category_id);
        $data['category'] = $this->CommonModal->getAllRows('category');
        $this->load->view('admin/edit_subcategory', $data);
    }

    public function editsubcategory()
    {
        $table = "sub_category";
        $data['favicon'] = base_url() . 'assets/logo.png';
        if (isset($_POST['submit'])) {

            $id = $this->input->post('id');
            $cat_id = $this->input->post('cat_id');
            $subcat_name = $this->input->post('subcat_name');

            $no = rand();
            if ($_FILES["image"]["name"] == "") {
                $this->db->select("*");
                $this->db->where('sub_category_id', $id);
                $query = $this->db->get($table);
                $result = $query->row();
                $file_name = $result->image;
            } else {
                $uploadfile = $_FILES["image"]["tmp_name"];
                $folder = "uploads/subcategory/";
                move_uploaded_file($_FILES["image"]["tmp_name"], "$folder" . $no . $_FILES["image"]["name"]);
                $file_name = $no . $_FILES["image"]["name"];
            }


            $data = array('subcat_name' => $subcat_name, 'image' => $file_name);

            $update = $this->CommonModal->updateRowById($table, 'sub_category_id', $id, $data);
            if ($update) {

                $this->session->set_flashdata('msg', 'Category Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Category Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'admin_Dashboard/view_subcategory');
        } else {
            redirect(base_url() . 'admin_Dashboard/edit_subcategory');
        }
    }


    public function deletesubcategory($id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "sub_category";
        $data = $this->CommonModal->getRowById('sub_category', 'sub_category_id', $id);


        if (file_exists("./uploads/subcategory/' . $data[0]['image']")) {

            unlink('./uploads/subcategory/' . $data[0]['image']);
        }

        if ($this->CommonModal->deleteRowById($table, array('sub_category_id' => $id))) {
            $this->session->set_flashdata('msg', 'Subcategory Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Category not Delete Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect('admin_Dashboard/view_subcategory');
    }

    public function view_products()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';

        $data['title'] = "Products";
        $data['products'] = $this->CommonModal->getAllRowsInOrder('products' , 'product_id' , 'desc' );
        $this->load->view('admin/view_products', $data);
    }

    public function get_subcategory()
    {
        $category_id = $_POST['category_id'];
        $data = $this->CommonModal->getRowById('sub_category', 'cat_id', $category_id);
        echo '<option>Select Product Sub Category</option>';
        foreach ($data as $da) {
            echo '<option value="' . $da['sub_category_id'] . '">' . $da['subcat_name'] . '</option>';
        }
    }
    public function add_products()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Add Product";
        $table = "category";
        $data['category'] = $this->Dashboard_model->fetchall($table);
        $data['length'] = $this->CommonModal->getAllRows('length');
        $data['fabric'] = $this->CommonModal->getAllRows('fabric');
        $data['pattern'] = $this->CommonModal->getAllRows('pattern');
        $this->load->view('admin/add_products', $data);
    }

    public function addproducts()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
         
            $post = $this->input->post();
            $productId = $this->CommonModal->insertRowReturnId('products', $post);
            $countImg = count($_FILES['img']);
            for ($i = 0; $i <= $countImg; $i++) {
                $no = rand();
                if (!empty($_FILES["img"]["name"][$i])) {
                    $folder = "uploads/products/";
                    move_uploaded_file($_FILES["img"]["tmp_name"][$i], "$folder" . $no . $_FILES["img"]["name"][$i]);
                    $file_name1 = $no . $_FILES["img"]["name"][$i];
                    $this->CommonModal->insertRowReturnId('products_image', array('product_id' => $productId, 'pi_name' => $file_name1));
                }
            }

            if ($productId) {
                $this->session->set_flashdata('msg', 'Product  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'admin_Dashboard/view_products');
         
    }

    public function edit_products($product_id = true)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Edit Products";
        $data['productInfo'] = $this->CommonModal->getRowById('tbl_products', 'product_id', $product_id);
         $data['productimg'] = $this->CommonModal->getRowById('products_image', 'product_id', $product_id);
        $data['category'] = $this->Dashboard_model->fetchall('category');
        $data['sub_category'] = $this->Dashboard_model->fetchall('sub_category');
        $data['length'] = $this->CommonModal->getAllRows('length');
        $data['fabric'] = $this->CommonModal->getAllRows('fabric');
        $data['pattern'] = $this->CommonModal->getAllRows('pattern');
        $this->load->view('admin/edit_products', $data);
        //redirect('admin/edit_products', $data);
    }

    public function edit_productsimg($product_id = true)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
         $data['title'] = "Products Images";
        if (count($_POST) > 0) {
            $no = rand();
            $folder = "uploads/products/";
            move_uploaded_file($_FILES["img"]["tmp_name"], "$folder" . $no . $_FILES["img"]["name"]);
            $file_name1 = $no . $_FILES["img"]["name"];
            $this->CommonModal->insertRowReturnId('products_image', array('product_id' => $product_id, 'pi_name' => $file_name1));

            redirect(base_url() . 'admin_Dashboard/edit_productsimg/' . $product_id);
        } else {
            $data['productimg'] = $this->CommonModal->getRowById('products_image', 'product_id', $product_id);
            $this->load->view('admin/edit_productsimg', $data);
        }
    }
    public function editproductdetails()
    {
        $table = "products";
        $data['favicon'] = base_url() . 'assets/logo.png';
         

            $data = $this->input->post();
            // $pro_name = $this->input->post('pro_name');
            // $description = $this->input->post('description');
            // $category_id = $this->input->post('category_id');

            // $price = $this->input->post('price');
            // $old_price = $this->input->post('old_price');
            // $data = array('product_id' => $id, 'pro_name' => $pro_name, 'description' => $description, 'category_id' => $category_id, 'price' => $price, 'old_price' => $old_price);

            $update = $this->CommonModal->updateRowById($table, 'product_id', $data['product_id'], $data);
            if ($update) {
                $this->session->set_flashdata('msg', 'Product Update Successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'admin_Dashboard/view_products');
         
    }

    public function deleteproducts($id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "products";
        $this->Dashboard_model->deleteproducts($table, $id);
        redirect('admin_Dashboard/view_products');
    }
    public function deleteproductimg($pi_id, $product_id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $this->CommonModal->deleteRowById('products_image', array('pi_id' => $pi_id));
        redirect('admin_Dashboard/edit_productsimg/' . $product_id);
    }
    public function contact_query()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Contact Query";
        $table = "contact_query";
        $data['contact'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/contact', $data);
    }
    public function deletecontact($id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "contact_query";
        $this->CommonModal->deleteRowById($table, array('cid' => $id));
        redirect('admin_Dashboard/contact_query');
    }
    public function promocode()
    {
        $table = "promocode";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Promocode";
        $data['promocode'] = $this->CommonModal->getAllRowsInOrder($table , 'pid' , 'desc');
        $this->load->view('admin/view_promocode', $data);
    }
    public function add_promocode()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Add Promocode";
        $this->load->view('admin/add_promocode', $data);
    }
    public function addpromocode()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('promocode', $data);
        if ($done) {
            $this->session->set_flashdata('msg', 'Promocode Add successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }

        redirect(base_url() . 'admin_Dashboard/promocode');
    }
    public function deletepromocode($id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "promocode";
        $done =  $this->CommonModal->deleteRowById($table, array('pid' => $id));

        if ($done) {
            $this->session->set_flashdata('msg', 'Promocode delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        }

        redirect('admin_Dashboard/promocode');
    }
    public function deleteprivacypolicy($id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "privacypolicy";
        $this->CommonModal->deleteRowById($table, array('ppid' => $id));
        redirect('admin_Dashboard/privacyPolicy');
    }
    public function statusupdate()
    {
        extract($this->input->post());
        $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => $status));
        redirect(base_url('admin_Dashboard/orderPlaced'));
    }

     public function orderPlaced($type = NULL , $typename = NULL)
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed";
     
        if ($type != '') {
          $data['checkout'] = $this->CommonModal->getDataByIdInOrderLimit($table, array('payment_type' => $type), 'id', 'desc', '10000', '0');
            } 
          else {
            $data['checkout'] = $this->CommonModal->getAllRowsInOrder($table, 'id', 'desc');
          }

        $data['count_new'] = $this->CommonModal->getNumRows('checkout', array('status' => '0'));
        $data['count_order'] = $this->CommonModal->getNumRows('checkout', array('status' => '1'));
        $data['count_shipment'] = $this->CommonModal->getNumRows('checkout', array('status' => '5'));
        $data['count_way'] = $this->CommonModal->getNumRows('checkout', array('status' => '6'));
        $data['count_delivered'] = $this->CommonModal->getNumRows('checkout', array('status' => '3'));
        $data['count_retreq'] = $this->CommonModal->getNumRows('checkout', array('status' => '8'));
        $data['count_return'] = $this->CommonModal->getNumRows('checkout', array('status' => '4'));
        $data['count_canreq'] = $this->CommonModal->getNumRows('checkout', array('status' => '2'));
        $data['count_can'] = $this->CommonModal->getNumRows('checkout', array('status' => '7'));
        $this->load->view('admin/view_orderPlced', $data);
    }
    
    public function orderPlaced_status($status = NULL)
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed";

        if ($status == '') {

            $data['checkout'] = $this->CommonModal->getAllRowsInOrder($table, 'id', 'desc');
        } else {
            $data['checkout'] = $this->CommonModal->getDataByIdInOrderLimit($table, array('status' => $status), 'id', 'desc', '10000', '0');
        }
        $data['count_new'] = $this->CommonModal->getNumRows('checkout', array('status' => '0'));
        $data['count_order'] = $this->CommonModal->getNumRows('checkout', array('status' => '1'));
        $data['count_shipment'] = $this->CommonModal->getNumRows('checkout', array('status' => '5'));
        $data['count_way'] = $this->CommonModal->getNumRows('checkout', array('status' => '6'));
        $data['count_delivered'] = $this->CommonModal->getNumRows('checkout', array('status' => '3'));
        $data['count_retreq'] = $this->CommonModal->getNumRows('checkout', array('status' => '8'));
        $data['count_return'] = $this->CommonModal->getNumRows('checkout', array('status' => '4'));
        $data['count_canreq'] = $this->CommonModal->getNumRows('checkout', array('status' => '2'));
        $data['count_can'] = $this->CommonModal->getNumRows('checkout', array('status' => '7'));


        $this->load->view('admin/view_orderPlced', $data);
    }
   
   
   public function userorderPlaced($id = NULL)
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed";

        if ($id == '') {

            redirect(base_url('admin_Dashboard/orderPlaced'));
        } 
        else
        {
             $data['checkout'] = $this->CommonModal->getRowByIdInOrder($table, array('user_id' => $id) , 'id', 'desc');
        }
        $data['count_new'] = $this->CommonModal->getNumRows('checkout', array('status' => '0' , 'user_id' => $id));
        $data['count_order'] = $this->CommonModal->getNumRows('checkout', array('status' => '1'  , 'user_id' => $id));
        $data['count_shipment'] = $this->CommonModal->getNumRows('checkout', array('status' => '5' , 'user_id' => $id));
        $data['count_way'] = $this->CommonModal->getNumRows('checkout', array('status' => '6' , 'user_id' => $id));
        $data['count_delivered'] = $this->CommonModal->getNumRows('checkout', array('status' => '3' , 'user_id' => $id));
        $data['count_retreq'] = $this->CommonModal->getNumRows('checkout', array('status' => '8' , 'user_id' => $id));
        $data['count_return'] = $this->CommonModal->getNumRows('checkout', array('status' => '4' , 'user_id' => $id));
        $data['count_canreq'] = $this->CommonModal->getNumRows('checkout', array('status' => '2' , 'user_id' => $id));
        $data['count_can'] = $this->CommonModal->getNumRows('checkout', array('status' => '7' , 'user_id' => $id));


        $this->load->view('admin/view_orderPlced', $data);
    }
   
   
   
   
    public function OrderPlacedDetails()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Order placed Details";
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
        $this->load->view('admin/OrderPlacedDetails', $data);
    }
    public function registeredUser()
    {
        $table = "user_registration";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Registered User";
        $data['registeredUser'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/registeredUser', $data);
    }
    public function privacyPolicy()
    {
        $table = "privacypolicy";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Privacy Policy";
        $data['privacypolicy'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/privacyPolicy', $data);
    }
    public function editprivacypolicy()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Edit Privacy Policy";
        $data['privacypolicy'] = $this->CommonModal->getRowById('privacypolicy', 'ppid', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $this->CommonModal->updateRowById('privacypolicy', 'ppid', $id, $post);
            redirect(base_url('admin_Dashboard/privacyPolicy'));
        } else {
            $this->load->view('admin/editprivacypolicy', $data);
        }
    }

    public function terms()
    {
        $table = "terms";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Terms And Condition";
        $data['terms'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/terms', $data);
    }
    public function edit_terms()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Edit Terms";
        $data['terms'] = $this->CommonModal->getRowById('terms', 'tid', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $this->CommonModal->updateRowById('terms', 'tid', $id, $post);
            redirect(base_url('admin_Dashboard/terms'));
        } else {
            $this->load->view('admin/edit-terms', $data);
        }
    }

    public function faq()
    {
        $table = "faq";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "FAQ";
        $data['faq'] = $this->CommonModal->getAllRows($table);
        $this->load->view('admin/faq', $data);
    }
    public function add_faq()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Add FAQ";
        $this->load->view('admin/add_faq', $data);
    }
    public function addfaq()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('faq', $data);
        if ($done) {

            $this->session->set_flashdata('msg', 'FAQ Add successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        redirect(base_url() . 'admin_Dashboard/faq');
    }
    public function editfaq()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Edit FAQ";
        $data['faq'] = $this->CommonModal->getRowById('faq', 'fid', $id);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $update = $this->CommonModal->updateRowById('faq', 'fid', $id, $post);
            if ($update) {

                $this->session->set_flashdata('msg', 'FAQ Update successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }

            redirect(base_url('admin_Dashboard/faq'));
        } else {
            $this->load->view('admin/editfaq', $data);
        }
    }
    public function add_privacyPolicy()
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Add Privacy Policy";
        $this->load->view('admin/add_privacyPolicy', $data);
    }
    public function addprivacyPolicy()
    {
        $data = $this->input->post();
        $done = $this->CommonModal->insertRow('privacypolicy', $data);
        if ($done) {
            redirect(base_url() . 'admin_Dashboard/privacyPolicy');
        } else {
            redirect(base_url() . 'admin_Dashboard/add_privacyPolicy');
        }
    }

    public function contactdetails()
    {
        $table = "contactdetails";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $data['title'] = "Contact Details";
        $data['contactdetails'] = $this->CommonModal->getRowById($table, 'cid', '1');
        $this->load->view('admin/contactdetails', $data);
    }
    public function blockuser($id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "user_registration";
        $this->CommonModal->deleteRowById($table, array('reg_id' => $id));
        redirect('admin_Dashboard/registeredUser');
    }
    public function deletefaq($id)
    {
        $data['favicon'] = base_url() . 'assets/logo.png';
        $table = "faq";
        $delete = $this->CommonModal->deleteRowById($table, array('fid' => $id));
        if ($delete) {

            $this->session->set_flashdata('msg', 'FAQ Delete successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }



        redirect('admin_Dashboard/faq');
    }
    public function orderdelete($id)
    {
        $this->CommonModal->updateRowById('checkout', 'id', $id, array('viewfield' => '1'));
        redirect('admin_Dashboard/orderPlaced');
    }


    public function editcontactdetils()
    {
        $table = "contactdetails";
        $data['favicon'] = base_url() . 'assets/logo.png';
        $datav = $this->input->post();
        $update = $this->CommonModal->updateRowByMoreId($table, array('cid' => '1'), $datav);
        if ($update) {

            $this->session->set_flashdata('msg', 'Category Add successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Soemthing went wrong Please try again!!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }



        redirect(base_url() . 'admin_Dashboard/contactdetails');
    }
    public function productOnSale()
    {
        $sale = $this->input->post('sale');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('products', 'product_id', $pid, array('sale' => $sale));
    }
    public function featuredProduct()
    {
        $featured = $this->input->post('featured');
        $pid = $this->input->post('pid');
        $this->CommonModal->updateRowById('products', 'product_id', $pid, array('featured' => $featured));
    }
    public function fetchorder()
    {
        $filter_status = $this->input->post('filter_status');
         $user = $this->input->post('user');
          $type = $this->input->post('type');
        
        if ($filter_status == '') {
            if ($user == '') {
                if($type == 'cod'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','payment_type'=>'0'), 'id', 'desc');
                }
                if($type == 'prepaid'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','payment_type'=>'1','payment_status'=>'1'), 'id', 'desc');
                }
                if($type == 'failed'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','payment_type'=>'1','payment_status'=>'2'), 'id', 'desc');
                }
                
            } else {
                if($type == 'cod'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','payment_type'=>'0', 'user_id' => $user), 'id', 'desc');
                }
                if($type == 'prepaid'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','payment_type'=>'1','payment_status'=>'1', 'user_id' => $user), 'id', 'desc');
                }
                if($type == 'failed'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','payment_type'=>'1','payment_status'=>'2', 'user_id' => $user), 'id', 'desc');
                }
                 
            }
            
        } else {
            if ($user == '') {
                if($type == 'cod'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','status' => $filter_status,'payment_type'=>'0'), 'id', 'desc');
                }
                if($type == 'prepaid'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','status' => $filter_status,'payment_type'=>'1','payment_status'=>'1'), 'id', 'desc');
                }
                if($type == 'failed'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','status' => $filter_status,'payment_type'=>'1','payment_status'=>'2'), 'id', 'desc');
                } 
            } else {
                 if($type == 'cod'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','status' => $filter_status, 'payment_type'=>'0', 'user_id' => $user), 'id', 'desc');
                }
                if($type == 'prepaid'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','status' => $filter_status, 'payment_type'=>'1','payment_status'=>'1', 'user_id' => $user), 'id', 'desc');
                }
                if($type == 'failed'){
                    $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0','status' => $filter_status, 'payment_type'=>'1','payment_status'=>'2', 'user_id' => $user), 'id', 'desc');
                }
                 
            }
            
        }
        
          $data['registeredUser'] = $this->CommonModal->getRowByIdInOrder('tbl_user_registration',array('reg_id'=>$user),'reg_id','DESC');
        $this->load->view('admin/orderlist', $data);
    }
}
