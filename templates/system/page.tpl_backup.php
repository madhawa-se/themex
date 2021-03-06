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
        <script type="text/javascript">

        </script>
    </head>
    <body class="<?php print $body_classes; ?>">

        <!-- for facebook page widget  -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div id="header" class="hidden-xs row">
                <div class="col-sm-4 header-left-region hidden-xs">
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
                <div class="col-sm-4 hidden-xs">
                    <!-- header-right -->
                    <?php if (!empty($header_right)): ?>
                        <?php print $header_right; ?>
                    <?php endif; ?>
                    <!-- /header-right -->
                </div>         

            </div> <!-- /header -->
        <!-- // for facebook page widget  -->
        <div id="page" class="container test">
            
            <div class="row">
                <!-- header-menu -->
                <?php if (!empty($header_menu)): ?>
                    <?php print $header_menu; ?>
                <?php endif; ?>
                <!-- /header-menu -->
            </div>


            <div id="container" class="clear-block container">

                <div id="navigation row" class="hidden-xs menu <?php
                if (!empty($primary_links)) {
                    print "withprimary";
                } if (!empty($secondary_links)) {
                    print " withsecondary";
                }
                ?> ">
                         <?php if (!empty($primary_links)) { ?>
                        <div id="primary" class="clear-block">
                            <?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
                        </div>
                    <?php } ?>

                </div> <!-- /navigation -->

                <!-- mobile menu -->

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
                            <button type="button"  class="navbar-toggle ico-mail">
                                <a href="mailto:admin@obcaccountants.com"></a>
                            </button>
                            <button type="button"  class="navbar-toggle ico-call">
                                <a href="mailto:admin@obcaccountants.com"></a>
                            </button>

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

                            <?php print theme('links', $primary_links, array('class' => 'links primary-links nav navbar-nav')); ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Login</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>


                <!-- -->

            </div>
        </div>


        <!-- hero region -->
        <?php if (!empty($hero)) { ?>
            <div class="container-fluid" id="hero-region">
                <div class="container">
                    <div id="row">
                        <?php print $hero; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- // hero region -->


        <div id="page2" class="container">
            <div class="row">


            </div>
            <div id="main-squeeze">
                <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
                <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>

                <div id="content" class="row">

                    <div class="row">

                        <div class="col-sm-3">
                            <?php if (!empty($left)): ?>
                                <div id="sidebar-left" class="column sidebar download">
                                    <?php print $left; ?>
                                </div> <!-- /sidebar-left -->
                            <?php endif; ?>
                                
                                       <!-- right download -->
                        <?php if (!empty($right_download)): ?>
                            <div id="right-download-region" class="col-sm-12 download">
                                <?php print $right_download; ?>
                            </div>
                        <?php endif; ?>
                        <!-- // right download -->
                        </div>
                        <div class="col-sm-9">
                            <div id="content-content" class="clear-block ">
                                <div>
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
                                </div>
                                <?php print $content; ?>
                            </div> <!-- /content-content -->
                        </div>


                 
                    </div>


                    <?php print $feed_icons; ?>
                </div> <!-- /content -->




                <!-- content bottom -->
                <?php if (!empty($content_bottom)): ?>
                    <div id="content-bottom-region">
                        <?php print $content_bottom; ?>
                    </div>
                <?php endif; ?>
                <!-- // content bottom -->

            </div>



        </div> <!-- /container -->


        <?php if (!empty($right)): ?>
            <div id="sidebar-right" class="column sidebar">
                <?php print $right; ?>
            </div> <!-- /sidebar-right -->
        <?php endif; ?>


        <div class="container-fluid footer-nav">
            <div class="container">
                <div class="row">
                    <?php if (!empty($secondary_links)): ?>
                        <div id="secondary" class="clear-block">
                            <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="footer-wrapper">
            <div class="container">
                <div class="row">
                    <div id="footer">
                        <?php print $footer_message; ?>
                        <?php
                        if (!empty($footer)): print $footer;
                        endif;
                        ?>
                    </div> <!-- /footer -->
                </div> <!-- /footer-wrapper -->
            </div>
        </div>

        <!-- -->
        <span id="mq-detector">
            <span class="visible-xs" data-size="1"></span>
            <span class="visible-sm" data-size="2"></span>
            <span class="visible-md" data-size="4"></span>
            <span class="visible-lg" data-size="4"></span>
        </span>
        <!-- -->

        <?php print $closure; ?>



    </body>
</html>
