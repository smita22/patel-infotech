<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div id="header_wrapper">
  <div id="inner_header_wrapper">
<?php global $user; ?>
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
                <p class="copyright"><?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <?php print $site_name; ?>
                <div class="clear"></div>
            </div>
        </div>	
    </div>
</div>
<style>

.dropbtn {
    background-image: url("icons/settings-icon.png");
            background: url(images/light-header.png);    
            color: white;
            padding: 10px;
            font-size: 10px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #5f5f5f;
        }

        .dropdown1 {
            position: relative;
            display: inline-block;
        }

        .dropdown1-content {
            display: none;
            position: inherit;
            background-color: #f9f9f9;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown1-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown1-content a:hover {background-color: #f1f1f1}

        .show {display:block;}

</style>
<script>
// Get the button, and when the user clicks on it, execute myFunction
document.getElementById("myBtn").onclick = function() {myFunction()};

/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown1-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>