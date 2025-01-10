<?php
function old_product($row, $r)
{
  $data = getSingleRowById('tbl_products_image', array('product_id' => $row['product_id']));
  $pattern = getSingleRowById('tbl_pattern', array('id' => $row['pattern']));
  $length = getSingleRowById('tbl_length', array('id' => $row['length']));
  $fabric = getSingleRowById('tbl_fabric', array('id' => $row['fabric']));

  echo '<div class="shop-item product type-product col-md-' . $r . ' col-xs-6 col-sm-6 " style="margin-bottom:10px;">
    <div class="side-item">
        <figure class="item-media text-center">
            <a href="' . base_url('product_details/' . $row['product_id'] . '/' . url_title($row['pro_name'], 'dash', true)) . '">
                <img src="' . base_url('uploads/products/') . '' . $data['pi_name'] . '" alt="" style="height:260px;object-fit:contain;">
            </a>
        </figure>
        <div class="shop-item__content recycling">
            <ul class="shop-item__meta-list">
                <li>
                    <a class="shop-item__meta-tag" href="#"> ' . (($row['category_id'] != '39') ? (($pattern != '') ? $pattern['pattern'] : '') : 'Jewels') . '</a>
                </li>
                <!-- <li>
                    <div class="star-rating" title="Rated 4.00 out of 5">
                        <span style="width:80%">
                            <strong class="rating">4.00</strong> out of 5
                        </span>
                    </div>
                </li> -->
            </ul>
            <h3 class="shop-item__title">
                <a href="' . base_url('product_details/' . $row['product_id'] . '/' . url_title($row['pro_name'], 'dash', true)) . '">' . $row['pro_name'] . '</a><br>
                <span class="amount" style="font-size:18px;">&#8377; ' . $row['price'] . ' <span style="color:grey;font-size:14px;"><strike>&#8377; ' . $row['old_price'] . '</strike> </span> </span>
            </h3>
            <!-- <p class="shop-item__desc">
                Aliquam sollicitudin neque in ante pretium tincidunt. Etiam volutpat ex a dolor gravida
                convallis...
            </p> -->
            <div class="shop-item__block">
                <!-- <a href="#" class="shop-item__button  addtocart" style="background-color:black;color:white" data-id="' . $row['product_id'] . '">Add to cart</a>  -->
            </div>
        </div>
    </div>
</div>';
}
function product($row, $r)
{
  $data = getSingleRowById('tbl_products_image', array('product_id' => $row['product_id']));
  $pattern = getSingleRowById('tbl_pattern', array('id' => $row['pattern']));
  $length = getSingleRowById('tbl_length', array('id' => $row['length']));
  $fabric = getSingleRowById('tbl_fabric', array('id' => $row['fabric']));

  echo '<div class="col-md-' . $r . ' col-xs-6 col-sm-6">
    <div class="product-card">
      <div class="product-media">
        <div class="product-label">
          <label class="label-text new">' . (($row['category_id'] != '39') ? (($pattern != '') ? $pattern['pattern'] : '') : 'Jewels') . '</label>
        </div>
        <a class="product-image" href="' . base_url('product_details/' . $row['product_id'] . '/' . url_title($row['pro_name'], 'dash', true)) . '"
          ><img class="product-card-img" src="' . base_url('uploads/products/') . '' . $data['pi_name'] . '" alt="product"
        /></a>
      </div>
      <div class="product-content">
        <h6 class="product-name">
          <a class="d-inline" href="' . base_url('product_details/' . $row['product_id'] . '/' . url_title($row['pro_name'], 'dash', true)) . '" title="' . $row['pro_name'] . '">' . $row['pro_name'] . '</a>
        </h6>
        <h6 class="product-price">
          <del>₹' . $row['old_price'] . '</del><span>₹' . $row['price'] . '<small></small></span>
        </h6>
        <button class="product-add addtocart" title="Add to Cart"  data-id="' . $row['product_id'] . '">
          <i class="fas fa-shopping-basket"></i><span>add</span>
        </button>
        <div class="product-action">
          <button class="action-minus" title="Quantity Minus">
            <i class="icofont-minus"></i></button
          ><input
            class="action-input"
            title="Quantity Number"
            type="text"
            name="quantity"
            value="1"
          /><button class="action-plus" title="Add to Cart">
            <i class="icofont-plus"></i>
          </button>
        </div>
      </div>
    </div>
  </div>';
}
