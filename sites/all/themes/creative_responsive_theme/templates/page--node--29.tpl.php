
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
       <!-- Banner -->

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
        <?php
$query = db_query("SELECT CONVERT(data USING utf8) FROM commerce_product WHERE type='component'");
$result = $query->fetchAll();
//echo "<pre>";print_r($result);
//foreach ($result as $record) {
//    print $record->type."<br";
//}

$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'commerce_product')
   ->propertyCondition('type', 'component');
 
$results = $query->execute();
echo "<pre>";print_r($results);
?>
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
            <div class="byp-right cf">
                <div class="byp-selection">
                    <div class="byp-section-title">Your Selection</div>
                    <div class="byp-section-data" id="byp-section">
                                                <div class="byp-box cf" id="1">
                            <div class="byp-input dropdown">
                                <select id="cat-6">
                                    <option value="">Processor</option>
                                                                        <option value="3-8050.00">Intel Core I3 (4160)</option>
                                                                        <option value="5-8100.00">Intel Core I3 (6100)</option>
                                                                        <option value="33-4100.00">Intel Dual Core (3260)</option>
                                                                        <option value="193-22500.00">Intel Core I7 (7700)</option>
                                                                        <option value="197-13000.00">Intel Core I5 (7400)</option>
                                                                        <option value="201-8250.00">Intel Core I3 (7100)</option>
                                                                        <option value="202-3750.00">Intel Dual Core (4400)</option>
                                                                        <option value="204-25250.00">Intel Core I7 (7700K)</option>
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
                                                                        <option value="22-950.00">CD DVD Writer LG SATA</option>
                                                                        <option value="23-1500.00">CD DVD Writer HP (USB)</option>
                                                                        <option value="24-1500.00">CD DVD Writer LG (USB)</option>
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
                                    <option value="">Keyboard Mouse</option>
                                                                        <option value="28-800.00">Keyboard Mouse Logitech (MK200)</option>
                                                                        <option value="104-750.00">Keyboard Mouse HP (C2500)</option>
                                                                        <option value="105-2100.00">Keyboard TVSE GOLD USB</option>
                                                                        <option value="106-600.00">Keyboard Mouse I-ball (Wintop)</option>
                                                                        <option value="107-1450.00">Keyboard Mouse Logitech (MK260)</option>
                                                                        <option value="108-1300.00">Keyboard Mouse Dell (KM113)</option>
                                                                        <option value="109-400.00">Keyboard I-Ball Winner USB</option>
                                                                        <option value="110-400.00">Keyboard Mouse Intex (DUO-314)</option>
                                                                        <option value="111-330.00">Mouse Logitech (M100)</option>
                                                                        <option value="112-700.00">Mouse Logitech W/L (M185)</option>
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
                                                                        <option value="87-5000.00">LG LED 18.5 (19M38A)</option>
                                                                        <option value="88-9800.00">HP LED 22 (22ES)</option>
                                                                        <option value="89-8500.00">LG LED 22 (22MP48HQ)</option>
                                                                        <option value="90-5600.00">Dell LED 18.5 (E1916HV)</option>
                                                                        <option value="91-10750.00">Dell LED 22 (S2216H)</option>
                                                                        <option value="183-4250.00">LG LED 15.6" (16M38A)</option>
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
                                                                        <option value="31-480.00">Antivirus NPAV</option>
                                                                        <option value="92-1331.00">Quick Heal Total Security 1 User 1 Year</option>
                                                                        <option value="93-5269.00">Quick Heal Total Security 3 User 3 Year</option>
                                                                        <option value="94-1007.00">Quick Heal Internet Security 1 User 1 Year</option>
                                                                        <option value="95-3872.00">Quick Heal Internet Security 3 User 3 Year</option>
                                                                        <option value="96-12087.00">Quick Heal Total Security 10 User 3 Year</option>
                                                                        <option value="97-600.00">Kaspersky Internet Security 1User 1Year</option>
                                                                        <option value="98-290.00">Antivirus Guardian 1 User 1 Year</option>
                                                                        <option value="99-2636.00">Quick Heal Total Security 3 User 1 Year</option>
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
                                                                        <option value="32-2500.00">UPS APC (600VA)</option>
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
                                                                        <option value="30-2750.00">Speaker F&amp;D 2.1 (A140F)</option>
                                                                        <option value="150-600.00">Speaker I-Ball (i2-460)</option>
                                                                        <option value="151-550.00">Speaker I-Ball (Sound Wave)</option>
                                                                        <option value="156-2100.00">Speaker I-Ball (Seetara B1)</option>
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
                    <a id="print_data" href="http://www.slprice.com/byp#" title="print quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82284424-1', 'auto');
  ga('send', 'pageview');

</script>
