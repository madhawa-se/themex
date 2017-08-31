<?php
/**
 * @file
 * Displays a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   element.
 * - $head: Markup for the HEAD element (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the
 *   current path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled in
 *   theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been
 *   disabled in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been
 *   disabled.
 * - $primary_links (array): An array containing primary navigation links for
 *   the site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links
 *   for the site, if they have been configured.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $content: The main content of the current Drupal page.
 * - $right: The HTML for the right sidebar.
 * - $node: The node object, if there is an automatically-loaded node associated
 *   with the page, and the node ID is the second argument in the page's path
 *   (e.g. node/12345 and node/12345/revisions, but not comment/reply/12345).
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic
 *   content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
$banner_image = $node->field_slideshow_image_1[0]['filepath'];
$banner_name = $node->field_slideshow_name[0]['value'];
$banner_content = $node->field_banner_content[0]['value'];
$banner_company = $node->field_banner_company[0]['value'];
$banner_action = $node->field_banner_cta[0]['view'];
$main_action_left = $node->field_ctaleft_content[0]['view'];
$main_action_right = $node->field_ctaright_content[0]['view'];



$inner_banner_image = $node->field_banner_image_x[0]['view'];
$my_teaser = $node->field_my_teaser[0]['value'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
    <head>
        <?php print $head; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <title><?php print $head_title; ?></title>
        <?php print $styles; ?>
        <?php print $scripts; ?>
        <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <body class="<?php print $body_classes; ?>">

        <div id="header" class="container">
            <div class="row  hidden-xs">
                <div class="col-sm-4 header-left-region">
                    <!-- header-left -->
                    <?php if (!empty($header_left)): ?>
                        <?php print $header_left; ?>
                    <?php endif; ?>
                    <!-- /header-left -->
                </div>
                <div class="col-sm-4">
                    <!-- header-logo -->
                    <div id="logo-title">

                        <?php if (!empty($logo)) { ?>
                            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo" class="logo">
                                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                            </a>
                        <?php } ?>

                    </div> <!-- /logo-title -->
                    <!-- /header-logo -->

                </div>
                <div class="col-sm-4">
                    <!-- header-right -->
                    <?php if (!empty($header_right)): ?>
                        <?php print $header_right; ?>
                    <?php endif; ?>
                    <!-- /header-right -->
                </div> 
            </div>

            <div id="navigation" class="hidden-xs menu <?php
            if (!empty($primary_links)) {
                print "withprimary";
            } if (!empty($secondary_links)) {
                print " withsecondary";
            }
            ?> ">
                     <?php if (!empty($primary_links)) { ?>
                    <div id="primary" class="mclearfix">
                        <?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
                        <div class="search"><a data-toggle="modal" data-target="#search-modal"><i class="fa fa-search"></i></a></div>
                    </div>
                <?php } ?>

            </div> <!-- /navigation -->

            <div class="bs-example mob-nav visible-xs">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <ul class="item-top list-inline">
                            <li>
                                <a href="tel:<?php print $company_phone; ?>"> 
                                    <i class="fa fa-phone"></i>
                                    <span class="hidn-txt">phone</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:<?php print $site_mail ?>">
                                    <i class="fa fa-envelope"></i>
                                    <span class="hidn-txt">email</span>
                                </a>
                            </li>
                        </ul>


                        <?php if (!empty($logo)) { ?>

                            <div class="logo-small">
                                <a href="" class="logo-link">
                                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                                </a>
                            </div>
                        <?php } ?>



                    </div>
                    <!-- Collection of nav links and other content for toggling -->
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right nav-tools">
                            <li><a class="btn btn-default" href="#">Login</a></li>
                            <li><a class="btn btn-default" href="#">Register</a></li>
                            <li><a data-toggle="modal" data-target="#search-modal" class="btn btn-default"><i class="fa fa-search"></i></a></li>
                        </ul>

                        <?php print theme('links', $primary_links, array('class' => 'links primary-links nav navbar-nav')); ?>

                    </div>
                </nav>
            </div>


        </div>
        <!-- /header -->


        <?php if (!empty($banner_image)) { ?>

            <div id="hero-region" class="main-banner" style="background: no-repeat url('<?php print $banner_image ?>'); background-size: cover;">
                <div class="container">
                    <div class="hero-text">
                        <?php if (!empty($banner_content)) { ?>
                            <div class="hero-content"><p><?php print $banner_content ?></p></div>
                        <?php } ?>

                        <?php if (!empty($banner_name)) { ?>
                            <p><?php print $banner_name ?></p>
                        <?php } ?>
                        <?php if (!empty($banner_company)) { ?>
                            <p>Creators of <?php print $banner_company ?></p>
                        <?php } ?>


                        <?php
                        if (!empty($banner_action)) {
                            print $banner_action;
                        }
                        ?>
                    </div>
                    <?php
                    if (!empty($hero)) {
                        //print $hero;
                    }
                    ?>

                </div>
            </div>
        <?php } ?>


        <div class="fluid help-tools">
            <div class="container">
                <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
                <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>
            </div>
        </div>


        <div id="page" class="container">

            <div id="container" class="clear-block">

                <div id="main" class="column">
                    <div id="main-squeeze">

                        <div id="content">
                            <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                            <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
                            <?php
                            if (!empty($messages)): print $messages;
                            endif;
                            ?>
                            <?php
                            if (!empty($help)): print $help;
                            endif;
                            ?>
                            <?php if (!empty($content_top)): ?>
                                <div id="content-top">
                                    <?php print $content_top; ?>
                                </div> <!-- /content_top -->
                            <?php endif; ?>
                            <div id="content-content" class="clear-block">
                                <?php print $content; ?>
                                <div class="inner-banner">



                                    <?php print views_embed_view('inner_page_banner', 'block_1'); ?>
                                    <div class="<?php echo (($inner_banner_image) ? "banner-data" : "") ?>">
                                        <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                                        <?php
                                        if ($inner_banner_image && $my_teaser) {
                                            echo $my_teaser;
                                        }
                                        ?>
                                    </div>
                                </div>


                            </div> <!-- /content-content -->
                            <?php print $feed_icons; ?>
                        </div> <!-- /content -->

                    </div>
                </div> <!-- /main-squeeze /main -->

                <?php if (!empty($left)): ?>
                    <div id="sidebar-left" class="column sidebar">
                        <?php print $left; ?>

                        <div class="front-publication-wrap">
                            <?php print $publication; ?>
                        </div>
                    </div> <!-- /sidebar-left -->
                <?php endif; ?>

                <?php if (!empty($right)): ?>
                    <div id="sidebar-right" class="column sidebar">
                        <?php print $right; ?>
                    </div> <!-- /sidebar-right -->
                <?php endif; ?>

            </div> <!-- /container -->

        </div> <!-- /page -->        


        <?php if (!empty($feed_pane)) { ?>
            <div class="feed_pane">
                <div class="container">
                    <div class="row">
                        <?php print $feed_pane; ?>
                    </div>
                </div>
            </div>
        <?php } ?>


        <div class="container">
            <!-- content bottom -->
            <?php if (!empty($content_bottom)): ?>
                <div id="content-bottom-region">
                    <?php print $content_bottom; ?>
                </div>
            <?php endif; ?>
            <!-- // content bottom -->
        </div>

        <?php if (false && !empty($footer)) { ?>
            <div id="footer-wrapper">
                <div id="footer">
                    <?php print $footer_message; ?>
                    <?php
                    print $footer;
                    ?>
                </div> <!-- /footer -->
            </div> <!-- /footer-wrapper -->

            <?php print $closure; ?>
        <?php } ?>


        <?php if (!empty($advertise_content)) { ?>
            <div class="fluid advertise-section">
                <div class="container">              
                    <?php print $advertise_content; ?>             
                </div>
            </div>    
        <?php } ?>


        <div class="fluid footer-nav">
            <div class="container">              
                <?php if (!empty($secondary_links)): ?>
                    <div id="secondary" class="clear-block">
                        <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')); ?>
                    </div>
                <?php endif; ?>             
            </div>
        </div>

        <?php if (!empty($footer)) { ?>
            <div class="fluid footer-wrapper">
                <div class="container">
                    <div class="row">
                        <div id="footer">

                            <?php
                            if (!empty($footer_message)) {
                                print $footer_message;
                            }
                            print $footer;
                            ?>
                        </div> <!-- /footer -->
                    </div> <!-- /footer-wrapper -->
                </div>
            </div>
        <?php } ?>

        <!-- /search model -->

        <!-- Modal -->

        <div class="modal fade" id="search-modal" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Search</h4>
                    </div>
                    <div class="modal-body row">
                        <form method="post" action="search/node/">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" id="txtSearch"/>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <span id="mq-detector">
            <span class="visible-xs" data-size="1"></span>
            <span class="visible-sm" data-size="2"></span>
            <span class="visible-md" data-size="4"></span>
            <span class="visible-lg" data-size="4"></span>
        </span>
        <!-- -->
    </body>
</html>
