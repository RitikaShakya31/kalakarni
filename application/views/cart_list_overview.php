<?php
foreach ($this->cart->contents() as $items) :
?>
    <tr class="cart_item">
        <td class="product-info">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object cart-product-image" src="<?= base_url('uploads/products/') . $items['image']; ?>" alt="<?php echo $items['name']; ?>">
                    </a>
                </div> 
            </div>
        </td>
        <td class="product-info">
        <h4 class="media-heading">
                        <a href="#"><?php echo $items['name']; ?></a>
                    </h4>
                 </td>   
        <td class="product-price">
            <span class="currencies">Rs. </span><span class="amount"><?php echo $this->cart->format_number($items['price']); ?></span>
        </td>
        <td class="product-quantity">
            <div class="quantity">
                <input type="button" value="-" class="minus qty" data-rowid="<?= $items['rowid']; ?>" data-price="<?= $items['price']; ?>">
                <input type="number" step="1" min="0" name="product_quantity" value="<?php echo $items['qty']; ?>" title="Qty" class="form-control" id="proqty<?= $items['rowid']; ?>">
                <input type="button" value="+" class="plus qty" data-rowid="<?= $items['rowid']; ?>" data-price="<?= $items['price']; ?>">
            </div>
        </td>
        <td class="product-subtotal">
            <span class="currencies">Rs. </span><span class="amount " id="item_total<?= $items['rowid']; ?>"><?php echo ($items['qty'] * $items['price']); ?></span>
        </td>
        <td class="product-remove">
            <span class="remove fontsize_24 removeCarthm" data-id="<?= $items['rowid'] ?>" title="Remove this item">
                <i class="rt-icon2-trash"></i>
            </span>
        </td>
    </tr>
<?php
endforeach;
?>