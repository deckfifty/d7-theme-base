<?php
/**
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
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
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
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
 */
?>

<div id="page">

  <header id="header" class="clearfix">
    <div class="inside">

      <?php if ($logo): ?>
      <?php if ($is_front): ?>
        <img src="<?php print $logo; ?>" alt="<?php print $site_name . ' ' . t('Home'); ?>" id="logo" />
        <?php else: ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
          <img src="<?php print $logo; ?>" alt="<?php print $site_name . ' ' . t('Home'); ?>" id="logo" />
        </a>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($site_name): ?>
      <p class="site-name">
        <?php if ($is_front): ?>
        <?php print $site_name; ?>
        <?php else: ?>
        <a href="<?php print $front_page; ?>" title="<?php print $site_name . ' ' . t('Home'); ?>" rel="home">
          <?php print $site_name; ?>
        </a>
        <?php endif; ?>
      </p>
      <?php endif; ?>

      <?php if ($site_slogan): ?>
      <p class="site-slogan"><?php print $site_slogan; ?></p>
      <?php endif; ?>

      <?php print render($page['header']); ?>

      <button id="nav-toggle"><span>toggle menu</span></button>
      <?php if ($page['navigation'] OR $main_menu OR $secondary_menu): ?>
      <div id="navigation">
        <a id="nav"></a>

        <?php if ($main_menu): ?>
        <nav id="main-menu" class="navigation">
          <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'div',
            'class' => array('element-invisible'),
          ),
        )); ?>
        </nav> <!-- ID main-menu -->
        <?php endif; ?>

        <?php if ($secondary_menu): ?>
        <nav id="secondary-menu" class="navigation">
          <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'div',
            'class' => array('element-invisible'),
          ),
        )); ?>
        </nav> <!-- ID secondary-menu -->
        <?php endif; ?>

        <?php print render($page['navigation']); ?>
      </div><!-- ID navigation -->
      <?php endif; ?>

    </div><!-- CLASS inside -->
  </header>

  <?php if ($page['preface']): ?>
  <div id="preface">
    <?php print render($page['preface']); ?>
  </div><!-- ID preface -->
  <?php endif; ?>

  <div id="container" class="clearfix">

    <div id="wrapper">
      <div id="primary">
        <div class="inside" class="clearfix">

          <?php if ($breadcrumb): print '<div id="breadcrumb">' . $breadcrumb . '</div>'; endif; ?>

          <a id="content-area"></a>

          <?php print render($page['highlighted']); ?>
          <?php print render($page['help']); ?>
          <?php print $messages; ?>

          <?php if ($tabs OR $action_links): ?>
            <div id="tabs">
              <?php if ($action_links): ?>
                <ul class="action-links tabs">
                  <?php print render($action_links); ?>
                </ul>
              <?php endif; ?>
              <?php print render($tabs); ?>
            </div>
          <?php endif; ?>

          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
          <h1 class="title" id="page-title">
            <?php print $title; ?>
          </h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>

          <?php print render($page['content']); ?>

          <?php print $feed_icons; ?>

        </div><!-- CLASS inside -->
      </div><!-- ID primary -->
    </div><!-- ID wrapper -->

    <?php if ($page['secondary']): ?>
    <aside id="secondary">
      <?php print render($page['secondary']); ?>
    </aside><!-- ID secondary -->
    <?php endif; ?>

    <?php if ($page['tertiary']): ?>
    <aside id="tertiary">
      <?php print render($page['tertiary']); ?>
    </aside><!-- ID tertiary -->
    <?php endif; ?>

  </div><!-- ID container -->

  <?php if ($page['postscript']): ?>
  <div id="postscript">
    <?php print render($page['postscript']); ?>
  </div><!-- ID postscript -->
  <?php endif; ?>

  <footer id="footer" class="clearfix">
    <div class="inside">
      <?php print render($page['footer']); ?>
      <div class="copyright">Copyright &copy; <?php print date('Y') . ' ' . $site_name ?>. All rights reserved.</div>
    </div>
  </footer><!-- ID footer -->

  <?php if ($page['closure']): ?>
  <div id="closure" class="clearfix">
    <?php print render($page['closure']); ?>
  </div><!-- ID closure -->
  <?php endif; ?>

</div><!-- ID page -->
