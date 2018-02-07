<?php // echo "<pre>";print_r($content['product:field_company_namelaptop']['#object']->display_context['field_rating']);echo"</pre>";  ?>


<div class="row" style="padding-bottom: 40px;">
  <div class="column" >
    <img src="<?php print $GLOBALS['base_url']."/sites/default/files/".$content['product:field_company_namelaptop']['#object']->field_laptopimage['und']['0']['filename'] ?>" >
  </div>
  <div class="column" >
    <h2 class="colorProductPage bottomLine"><?php print $content['product:field_company_namelaptop']['#object']->title ?></h2>
    <p><h3 class="colorProductPage bottomLine">Rs. <?php print $content['product:field_company_namelaptop']['#object']->commerce_price['und']['0']['amount'] / 100?></h3></p>
    <h3 class="colorProductPage bottomLine">Warranty : <?php print $content['product:field_company_namelaptop']['#object']->field_warranty['und']['0']['value'] ?></h3>
    <p>
        <h3 class="colorProductPage">
            <?php 
//                $form_idp= commerce_cart_add_to_cart_form_id(array($content['product:field_company_namelaptop']['#object']->product_id));  
//                $productp = commerce_product_load($content['product:field_company_namelaptop']['#object']->product_id);
//                $line_itemp = commerce_product_line_item_new($productp, 1);  // 1 is quantity
//                $line_itemp->data['context']['product_ids'] = array($content['product:field_company_namelaptop']['#object']->product_id);
//                $formp = drupal_get_form($form_idp, $line_itemp);
//                print drupal_render($formp);
                print render($content['field_laptop_product']);
            ?>
        </h3>
    </p>
  </div>
</div>

<div class="tab">
  <button class="tablinks" onclick="openInformation(event, 'Specification')" id="defaultOpen">Product Specification</button>
  <button class="tablinks" onclick="openInformation(event, 'Review')">Rating</button>
  
</div>

<div id="Specification" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">x</span>
  <h3>Product Specification</h3>
  <?php print "<pre>".$content['product:field_company_namelaptop']['#object']->field_laptop_specification['und']['0']['value'] ?>
</div>

<div id="Review" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">x</span>
  <h3>Rating & Review</h3>
    <?php
    
	print render($content['field_rating']); 
    ?>
  
</div>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>