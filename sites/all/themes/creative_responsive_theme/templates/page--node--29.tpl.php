
<style> 
    #container {
    clear: both;
    margin: 0 auto;
    max-width: 1550px;
    overflow: hidden;
    padding: 1%;
    background: #fff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -moz-box-shadow: 0px 2px 18px rgb(221, 221, 221);
    -webkit-box-shadow: 0px 2px 18px rgb(221, 221, 221);
    box-shadow: 0px 2px 18px rgb(221, 221, 221);
}
</style>
<div id="header_wrapper">
    <div id="inner_header_wrapper">
        <?php if (theme_get_setting('social_links', 'creative_responsive_theme')): ?>
            <div class="social-icons">
                <ul>
                    <li><a href="<?php print $front_page; ?>/rss.xml"><img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/rss.png'; ?>" alt="RSS Feed"/></a></li>
                    <li><a href="http://www.facebook.com/<?php echo theme_get_setting('facebook_username', 'creative_responsive_theme'); ?>" target="_blank" rel="me"><img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/facebook.png'; ?>" alt="Facebook"/></a></li>
                    <li><a href="http://www.twitter.com/<?php echo theme_get_setting('twitter_username', 'creative_responsive_theme'); ?>" target="_blank" rel="me"><img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/twitter.png'; ?>" alt="Twitter"/></a></li>
                </ul>
            </div>
        <?php endif; ?>

        <header id="header" role="banner">
            <?php if ($logo): ?><div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"/></a></div>
            <?php endif; ?>
            <h1 id="site-title">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
                <div id="site-description"><?php print $site_slogan; ?></div>
            </h1>	

            <?php if ($page['header_top']): ?>
                <?php global $base_url; ?>
                <!--<div class="headertop" ><a href="<?php //print $base_url; ?>/cart"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a> <a href="<?php //print $base_url;?>/user/logout"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a></div>-->
                <a href="<?php print $GLOBALS['base_url']."/cart"?>"><img class="headertop" src="<?php print $base_url; ?>/sites/all/themes/creative_responsive_theme/images/cart-icon.jpg" style="width:50px; border-radius: 50%;padding: 10px"></a>
                <div class="dropdown1 headertop">
                    <img id="myBtn" class="dropbtn headertop" src="<?php print $base_url; ?>/sites/all/themes/creative_responsive_theme/images/profile-image.png" style="width:50px; border-radius: 50%;">

                    <div id="myDropdown" class="dropdown1-content">
                       <a href="<?php print $GLOBALS['base_url']."/user/".$user->uid."/edit"?>">My Profile</a>
                       <a href="<?php print $GLOBALS['base_url']."/user/logout"?>">Logout</a>
                       <a href="#contact"></a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="clear"></div>
        </header>

        <?php if ($main_menu): ?>
        <div class="menu_wrapper">
          <nav id="main-menu"  role="navigation">
            <a class="nav-toggle" href="#">Navigation</a>
            <div class="menu-navigation-container">
              <?php $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu')); 
                print drupal_render($main_menu_tree);
              ?>
            </div>
            <div class="clear"></div>
          </nav><!-- end main-menu -->
        </div>
        <?php endif; ?>
    </div>
</div>		
  
<div id="container">
    <?php if ($is_front): ?>
        <?php print render($page['slideshow']); ?>
            <?php if ($page['top_first'] || $page['top_second'] || $page['top_third']): ?> 
                <div id="top-area" class="clearfix">
                  <?php if ($page['top_first']): ?>
                  <div class="column"><?php print render($page['top_first']); ?></div>
                  <?php endif; ?>
                  <?php if ($page['top_second']): ?>
                  <div class="column"><?php print render($page['top_second']); ?></div>
                  <?php endif; ?>
                  <?php if ($page['top_third']): ?>
                  <div class="column"><?php print render($page['top_third']); ?></div>
                  <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="content-sidebar-wrap">

            <div id="content">
                
                <?php if (theme_get_setting('breadcrumbs', 'creative_responsive_theme')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif; ?>
                    <section id="post-content" role="main">
                        <?php print $messages; ?>
                        <?php print render($title_prefix); ?>

                        <?php print render($title_suffix); ?>
                        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
                        <?php print render($page['help']); ?>
                        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                        <?php  if(drupal_is_front_page())
                        {
                            unset($page['content']['system_main']['default_message']);
                        } 
                        print render($page['content']); 
                ?>
                        <div class="main cf">
                            <div class="page-title">Build Your PC</div>
                            <div class="byp-section cf">
                                <div class="byp-left">
                                    <div class="byp-section-title">Component</div>
                                    <ul>
                                        <li id="list-6">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Processor</label>
                                        </li>
                                        <li id="list-8">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Mother Board</label>
                                        </li>
                                        <li id="list-9">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Ram</label>
                                        </li>
                                        <li id="list-10">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Hard Disc</label>
                                        </li>
                                        <li id="list-11">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">CD DVD Writer</label>
                                        </li>
                                        <li id="list-14">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Cabinet</label>
                                        </li>
                                        <li id="list-30">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Power Supply (SMPS)</label>
                                        </li>
                                        <li id="list-31">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Cooler and FAN</label>
                                        </li>
                                        <li id="list-15">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Keyboard Mouse</label>
                                        </li>
                                        <li id="list-13">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">LED Monitors</label>
                                        </li>
                                        <li id="list-12">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Graphics Cards</label>
                                        </li>
                                        <li id="list-17">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Antivirus</label>
                                        </li>
                                        <li id="list-18">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">UPS</label>
                                        </li>
                                        <li id="list-16">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <label for="chk_popular" class="ui-widget">Speakers</label>
                                        </li>
                                    </ul>
                                </div>
                                <?php
                                    $nids = db_select('node', 'n')
                                            ->fields('n', array('nid'))
                                            ->condition('type', 'component', '=')
                                            ->execute()
                                            ->fetchCol();
                                    $nodes = node_load_multiple($nids);

                                    $result = db_query("SELECT product_id FROM commerce_product WHERE type='component'");
                                    $product_id = $result->fetchCol();
                                    $products=commerce_product_load_multiple($product_id); 
                                    
                                ?>
                                <div class="byp-right cf">
                                    <div class="byp-selection">
                                        <div class="byp-section-title">Your Selection</div>
                                        <div class="byp-section-data" id="byp-section">
                                            <div class="byp-box cf" id="1">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-6">
                                                        <option value="">Processor</option>
                                                        <?php 
                                                            print render($content); 
                                                            foreach ($nids as $processor) 
                                                            {
                                                                $node_ProductIdProcessor=$nodes[$processor]->field_product['und']['0']['product_id'];

                                                                $product_ProductIdProcessor=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductIdProcessor);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$processor]->field_component ['und']['0']['tid'] == '9')
                                                                {

                                                                    echo "<option value='9-".$product_price."'>".$nodes[$processor]->title."</option>";
                        //                                                                    echo $nodes[$nids]->title;
                        //                                                                    echo $product_ProductId."  ". $product_price ."<br>"; 
                                                                }
                                                            }    
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-6" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="2">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-8">
                                                        <option value="">Mother Board</option>
                                                        <?php print render($content); 
                                                            
                                                            foreach ($nids as $motherboadr) 
                                                            {
                                                                $node_ProductId=$nodes[$motherboadr]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$motherboadr]->field_component ['und']['0']['tid'] == '10')
                                                                {

                                                                    echo "<option value='10-".$product_price."'>".$nodes[$motherboadr]->title."</option>";
                        //                                                                    echo $nodes[$nids]->title;
                        //                                                                    echo $product_ProductId."  ". $product_price ."<br>"; 
                                                                }
                                                            }
                                                            
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-8" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="3">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-9">
                                                        <option value="">Ram</option>
                                                        <?php print render($content); 
                                                            foreach ($nids as $ram) 
                                                            {
                                                                $node_ProductId=$nodes[$ram]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$ram]->field_component ['und']['0']['tid'] == '11')
                                                                {
                                                                    echo "<option value='11-".$product_price."'>".$nodes[$ram]->title."</option>";
                        //                                                                    echo $nodes[$nids]->title;
                        //                                                                    echo $product_ProductId."  ". $product_price ."<br>"; 
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-9" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="4">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-10">
                                                        <option value="">Hard Disc</option>
                                                        <?php print render($content); 
                                                            foreach ($nids as $harddisc) 
                                                            {
                                                                $node_ProductId=$nodes[$harddisc]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$harddisc]->field_component ['und']['0']['tid'] == '12')
                                                                {

                                                                    echo "<option value='12-".$product_price."'>".$nodes[$harddisc]->title."</option>";
                        //                                                                    echo $nodes[$nids]->title;
                        //                                                                    echo $product_ProductId."  ". $product_price ."<br>"; 
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-10" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="5">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-11">
                                                        <option value="">CD DVD Writer</option>
                                                        <?php print render($content); 
                                                            foreach ($nids as $dvd) 
                                                            {
                                                                $node_ProductId=$nodes[$dvd]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$dvd]->field_component ['und']['0']['tid'] == '16')
                                                                {

                                                                    echo "<option value='16-".$product_price."'>".$nodes[$dvd]->title."</option>";
                        //                                                                    echo $nodes[$nids]->title;
                        //                                                                    echo $product_ProductId."  ". $product_price ."<br>"; 
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-11" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="6">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-14">
                                                        <option value="">Cabinet</option>
                                                        <?php print render($content); 
                                                            foreach ($nids as $cabinet) 
                                                            {
                                                                $node_ProductId=$nodes[$cabinet]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$cabinet]->field_component ['und']['0']['tid'] == '13')
                                                                {

                                                                    echo "<option value='13-".$product_price."'>".$nodes[$cabinet]->title."</option>";
                        //                                                                    echo $nodes[$nids]->title;
                        //                                                                    echo $product_ProductId."  ". $product_price ."<br>"; 
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-14" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="7">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-30">
                                                        <option value="">Power Supply (SMPS)</option>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-30" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="8">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-31">
                                                        <option value="">Cooler and FAN</option>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-31" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="9">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-15">
                                                        <option value="">Keyboard</option>
                                                        <?php print render($content); 
                                                           foreach ($nids as $keyboard) 
                                                            {
                                                                $node_ProductId=$nodes[$keyboard]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$keyboard]->field_component ['und']['0']['tid'] == '14')
                                                                {

                                                                    echo "<option value='14-".$product_price."'>".$nodes[$keyboard]->title."</option>";
                        //                                                                    echo $nodes[$nids]->title;
                        //                                                                    echo $product_ProductId."  ". $product_price ."<br>"; 
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-15" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="10">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-13">
                                                        <option value="">LED Monitors</option>
                                                        <?php print render($content); 
                                                            foreach ($nids as $LED) 
                                                            {
                                                                $node_ProductId=$nodes[$LED]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$LED]->field_component ['und']['0']['tid'] == '23')
                                                                {

                                                                    echo "<option value='23-".$product_price."'>".$nodes[$LED]->title."</option>";
                        //                                                                    echo $nodes[$nids]->title;
                        //                                                                    echo $product_ProductId."  ". $product_price ."<br>"; 
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-13" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="11">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-12">
                                                        <option value="">Graphics Cards</option>
                                                        <?php print render($content); 
                                                           foreach ($nids as $graphicsCards) 
                                                            {
                                                                $node_ProductId=$nodes[$graphicsCards]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$graphicsCards]->field_component ['und']['0']['tid'] == '17')
                                                                {

                                                                    echo "<option value='17-".$product_price."'>".$nodes[$graphicsCards]->title."</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-12" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="12">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-17">
                                                        <option value="">Antivirus</option>
                                                        <?php print render($content); 
                                                           foreach ($nids as $Antivirus) 
                                                            {
                                                                $node_ProductId=$nodes[$Antivirus]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                //echo "<pre>";print_r($product_price['amount'] / 100);
                                                                if($nodes[$Antivirus]->field_component ['und']['0']['tid'] == '21')
                                                                {

                                                                    echo "<option value='21-".$product_price."'>".$nodes[$Antivirus]->title."</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-17" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="13">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-18">
                                                        <option value="">UPS</option>
                                                        <option value="89-2500.00">UPS APC (600VA)</option>
                                                        <option value="83-1950.00">UPS I-ball Nirantar-621 (600 VA)</option>
                                                        <option value="84-1800.00">UPS Intex Protector 725</option>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-18" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                            <div class="byp-box cf" id="14">
                                                <div class="byp-input dropdown">
                                                    <select id="cat-16">
                                                        <option value="">Speakers</option>
                                                        <?php print render($content); 
                                                            foreach ($nids as $Speakers) 
                                                            {
                                                                $node_ProductId=$nodes[$Speakers]->field_product['und']['0']['product_id'];

                                                                $product_ProductId=$products[$product_id]->product_id;

                                                                $product = commerce_product_load($node_ProductId);
                                                                $price = entity_metadata_wrapper('commerce_product', $product)->commerce_price->value();
                                                                $product_price = $price['amount'] / 100;
                                                                if($nodes[$Speakers]->field_component ['und']['0']['tid'] == '19')
                                                                {

                                                                    echo "<option value='19-".$product_price."'>".$nodes[$Speakers]->title."</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="byp-number">
                                                    <input type="number" id="qty-16" value="1" step="1" min="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="byp-result">
                                        <div class="byp-section-title">Your Selected Item</div>
                                        <div class="byp-result-title">Here is the final price for your selection</div>
                                        <!--<a id="print_data" href="http://www.slprice.com/byp#" title="print quotation"><i class="fa fa-print" aria-hidden="true"></i></a>-->
                                        <div class="byp-resultdata">
                                            <div class="byp-result-list">
                                                <ul id="result-list">
                                                    <!--<li class="cf">
                                                        <div class="result-item">Intel core i5 - t3000</div>
                                                        <div class="result-price">Rs. 170000.00</div>
                                                        <div class="result-delete">
                                                            <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    </li>
                                                    <li class="cf">
                                                        <div class="result-item">Intel DHC61Q</div>
                                                        <div class="result-price">Rs. 3500/-</div>
                                                    </li>-->
                                                </ul>
                                            </div>
                                            <div id="result-print">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="byp-result-total cf">
                                        <div class="byp-result-left">
                                            <div class="total-label">Total Items</div>
                                            <div class="total-qty" id="total-qty">0</div>    
                                        </div>
                                        <div class="byp-result-right">
                                            <div class="total-label">Total Price</div>
                                            <div class="total-amount">Rs. <span id="tot-amount">0.00</span></div>
                                        </div>
                                    </div>
                                    <div class="byp-form cf">
                                        <div class="mani_box-input">
                                            <div class="byp-frominput">
                                                <input type="text" name="txt_name" id="txt_name" value="" placeholder="Your Name">
                                            </div>
                                            <div class="byp-frominput ">
                                                <input type="text" name="txt_emailaddress" id="txt_emailaddress" value="" placeholder="Your Email Address">
                                            </div>

                                            <div class="byp-frominput btn">
                                                <a href="http://www.slprice.com/byp#" id="send-byp">Send To me</a>
                                            </div>
                                        </div> 


                                        <div class="clear"></div>
                                        <div class="success-message byp" id="byp-msg">Thank you for trying our service. Visit our branch to get delivery!!!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> <!-- /#main -->
            </div>
  
            <?php if ($page['sidebar_first']): ?>
              <aside id="sidebar-first" role="complementary">
                <?php print render($page['sidebar_first']); ?>
              </aside>  <!-- /#sidebar-first -->
            <?php endif; ?>
        </div>

        <?php if ($page['sidebar_second']): ?>
          <aside id="sidebar-second" role="complementary">
            <?php print render($page['sidebar_second']); ?>
          </aside>  <!-- /#sidebar-first -->
        <?php endif; ?>
</div>

<div id="footer">
    <!-- botoom -->
    <?php if ($page['bottom']): ?> 
        <div id="footer-area" class="clearfix" >
            <?php if ($page['bottom']): ?>
                <?php print render($page['bottom']); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <!-- end- botoom -->
    <div class="footer_credit">
        <div class="footer_inner_credit">
            <div id="footer_wrapper" class="footerh2">
		<?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?> 
                    <div id="footer-area" class="clearfix">
                        <?php if ($page['footer_first']): ?>
                            <div class="column"><?php print render($page['footer_first']); ?></div>
			<?php endif; ?>
                        <?php if ($page['footer_second']): ?>
                            <div class="column">
                                <?php
                                    $vocabularies = taxonomy_get_vocabularies();
                                    foreach($vocabularies as $vocabulary) 
                                    {
                                        if ($vocabularies) 
                                        {
                                            //echo "<pre>";print_r($vocabularies);
                                            if($vocabulary->name == 'Accesseries')
                                                print "<li><a href='taxonomy/term/30'>".$vocabulary->name."</a>";
                                            if($vocabulary->name == 'CCTV')
                                                print "<li><a href='#'>".$vocabulary->name."</a>";	
                                            if($vocabulary->name == 'Component')
                                                print "<li><a href='components'>".$vocabulary->name."</a>";	
                                            if($vocabulary->name == 'Laptop')
                                                print "<li><a href='laptop	'>".$vocabulary->name."</a>";	
                                        }
                                    }
                                ?>
                            </div>
			<?php endif; ?>
			<?php if ($page['footer_third']): ?>
				<div class="column"><?php print render($page['footer_third']); ?></div>
			<?php endif; ?>
                    </div>
		<?php endif; ?>
            </div>
            <?php if ($page['footer']): ?>
                <div id="foot">
                    <?php// print render($page['footer']) ?>
		</div>	
            <?php endif; ?>
            <div id="copyright">
                <p class="copyright"><?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <?php print $site_name; ?> </p> <p class="credits"> <?php print t('Theme by'); ?>  <a href="http://www.zymphonies.com">Zymphonies</a></p>
                <div class="clear"></div>
            </div>
        </div>	
    </div>
</div>
