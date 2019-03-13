<?php if ( ! defined('ABSPATH')) exit('No direct script access allowed');

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://philsbury.uk
 * @since      1.0.0
 *
 * @package    Age_Gate
 * @subpackage Age_Gate/public/partials
 */
?>
<div class="wrap">
  <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

  <?php include AGE_GATE_PATH . 'admin/partials/parts/tabs.php'; ?>

  <form class="custom-form-fields" action="admin-post.php" method="post">
    <input type="hidden" name="action" value="age_gate_advanced">
    <?php wp_nonce_field( 'age_gate_update_advanced', 'nonce'); ?>

    <h3><?php _e('Caching','age-gate'); ?></h3>
    <p><?php _e('If you have a caching solution, it is best to use a JavaScript triggered version of the age gate as this won’t be adversely affected by the cache. If you don’t have caching, the standard method is recommended.', 'age-gate'); ?></p>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="wp_age_gate_use_standard"><?php _e('Use uncachable version', 'age-gate'); ?></label>
          </th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><?php _e('Select an option', 'age-gate'); ?></legend>
              <label>
                <?php echo form_checkbox(
                  array(
                    'name' => 'ag_settings[use_js]',
                    'id' => 'wp_age_gate_use_standard'
                  ),
                  1,
                  $values['use_js']
                ); ?> <?php _e('Use JavaScript Age Gate', 'age-gate'); ?>
              </label>
            </fieldset>
          </td>
        </tr>
        <tr class="ep"<?php echo (!$values['use_js'] ? ' style="display: none;"' : '') ?>>
          <th scope="row">
            <label for="wp_age_gate_method"><?php _e('AJAX endpoint', 'age-gate'); ?></label>
          </th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><?php _e('Select an option', 'age-gate'); ?></legend>
              <label>
                <?php echo form_radio(
                  array(
                    'name' => 'ag_settings[endpoint]',
                    'id' => 'wp_age_gate_use_standard'
                  ),
                  'ajax',
                  ($values['endpoint'] === 'ajax')
                ); ?> <?php _e('Admin Ajax', 'age-gate'); ?>
              </label><br>
              <label>
                <?php echo form_radio(
                  array(
                    'name' => 'ag_settings[endpoint]',
                    'id' => 'wp_age_gate_use_standard'
                  ),
                  'rest',
                  ($values['endpoint'] === 'rest')
                ); ?> <?php _e('REST API', 'age-gate'); ?>
              </label>
              <p class="note"><?php _e('Where to send the AJAX request', 'age-gate'); ?></p>

            </fieldset>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="wp_age_gate_use_standard"><?php _e('Anonymous Age Gate', 'age-gate'); ?></label>
          </th>
          <td>
            <?php if (!$this->settings['restrictions']['multi_age']): ?>
            <fieldset>
              <legend class="screen-reader-text"><?php _e('Select an option', 'age-gate'); ?></legend>
              <label>
                <?php echo form_checkbox(
                  array(
                    'name' => 'ag_settings[anonymous_age_gate]',
                    'id' => 'wp_age_gate_anonymous_age_gate'
                  ),
                  1,
                  $values['anonymous_age_gate']
                ); ?> <?php _e('Use anonymous Age Gate', 'age-gate'); ?>
              </label>
              <p class="note"><?php _e('This option makes Age Gate only store if a user has passed the challange and not an age for extra privacy', 'age-gate'); ?></p>
            </fieldset>
            <?php else: ?>
              <p><?php _e('This setting is unavailable with "Varied ages" selected in the restrictions tab', 'age-gate'); ?></p>
            <?php endif; ?>
          </td>
        </tr>
      </tbody>
    </table>
    <h3><?php _e('Editor options','age-gate'); ?></h3>
    <p><?php _e('Tick if using Gutenberg', 'age-gate'); ?></p>
    
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="wp_age_gate_use_standard"><?php _e('Display as meta box', 'age-gate'); ?></label>
          </th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><?php _e('Select an option', 'age-gate'); ?></legend>
              <label>
                <?php echo form_checkbox(
                  array(
                    'name' => 'ag_settings[use_meta_box]',
                    'id' => 'wp_age_gate_use_meta_box'
                  ),
                  1,
                  $values['use_meta_box']
                ); ?> <?php _e('Display Age Gate post settings in a meta box', 'age-gate'); ?>
              </label>
            </fieldset>
          </td>
        </tr>
      </tbody>
    </table>

    <?php if (self::$language): ?>
    <h3><?php _e('Translations','age-gate'); ?></h3>
    <table class="form-table">
      <tr>
        <th scope="row">
          <label for="wp_age_gate_use_default_lang"><?php _e('Use default language', 'age-gate'); ?></label>
        </th>
        <td>
          <label>
            <?php echo form_checkbox(
              array(
                'name' => 'ag_settings[use_default_lang]',
                'id' => 'wp_age_gate_use_default_lang'
              ),
              1,
              $values['use_default_lang']
            ); ?>
            <?php _e('Use the default language if a translation is missing') ?>
          </label>
        </td>
      </tr>
    </table>
    <?php else: ?>
      <?php echo form_hidden('ag_settings[use_default_lang]', $values['use_default_lang']) ?>
    <?php endif; ?>
    <?php if ($this->is_dev()): ?>
    <h3><?php _e('Dev builds','age-gate'); ?></h3>
    <p><?php _e('Get notifications of new development builds. These will not be installed for you and you will only see notifications if you are already using a development version.', 'age-gate'); ?></p>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="wp_age_gate_dev_notify"><?php _e('Development Versions', 'age-gate'); ?></label>
          </th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><?php _e('Select an option', 'age-gate'); ?></legend>
              <label>
                <?php echo form_checkbox(
                  array(
                    'name' => 'ag_settings[dev_notify]',
                    'id' => 'wp_age_gate_dev_notify'
                  ),
                  1,
                  $values['dev_notify']
                ); ?> <?php _e('Show messages about new development versions', 'age-gate'); ?>
              </label>
            </fieldset>
          </td>

        </tr>
        <tr>
          <th scope="row">
            <label for="wp_age_gate_dev_hide_warning"><?php _e('Development warning', 'age-gate'); ?></label>
          </th>
          <td>
            <fieldset>
              <legend class="screen-reader-text"><?php _e('Select an option', 'age-gate'); ?></legend>
              <label>
                <?php echo form_checkbox(
                  array(
                    'name' => 'ag_settings[dev_hide_warning]',
                    'id' => 'wp_age_gate_dev_hide_warning'
                  ),
                  1,
                  $values['dev_hide_warning']
                ); ?> <?php _e('Hide the development warning message', 'age-gate'); ?>
              </label>
            </fieldset>
          </td>

        </tr>
      </tbody>
    </table>
    <?php endif; ?>

    <h3><?php _e('Custom Styling','age-gate'); ?></h3>
    <p><?php _e('You can add custom CSS for the Age Gate here.', 'age-gate'); ?></p>

    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="wp_age_gate_store_css"><?php _e('Write custom CSS to file', 'age-gate'); ?></label>
          </th>
          <td>
            <?php if (!is_writable(AGE_GATE_PATH . 'public/css/age-gate-custom.css')): ?>
              <?php
                _e('Unable to write to custom CSS file. Custom style will be enqueued inline.', 'age-gate');
                echo form_hidden('ag_settings[save_to_file]', 0);
              ?>
            <?php else: ?>
              <label>
                <?php echo form_checkbox(
                  array(
                    'name' => "ag_settings[save_to_file]",
                    'id' => "wp_age_gate_store_css"
                  ),
                  1, // value
                  $values['save_to_file'] // checked
                ); ?> <?php _e('Will save custom CSS to file and enqueue it on the front-end', 'age-gate'); ?>
              </label>
            <?php endif; ?>

          </td>
        </tr>
        <tr>
          <th scope="row">
            <?php _e('Custom CSS', 'age-gate'); ?>
          </th>
          <td>
            <div class="ag-css-editor">
              <img src="<?php echo admin_url('images/spinner-2x.gif'); ?>" alt="Loading..." class="hide-if-no-js" />
              <div id="css-editor">
                <noscript>
                  <p><?php _e('Sorry, JavaScript is required for this feature', 'age-gate'); ?></p>
                </noscript>
              </div>
            </div>

            <a href="https://agegate.io/docs/styling/css-reference" target="_blank" class="button" title="<?php _e('CSS Reference', 'age-gate'); ?>"><?php _e('CSS Reference', 'age-gate'); ?></a>
            <button type="button" class="button load-default-css hide-if-no-js" title="<?php _e('Load Default CSS', 'age-gate'); ?>"><?php _e('Load Default CSS', 'age-gate'); ?></button>

          </td>
        </tr>
      </tbody>
    </table>

    <div class="css-warning"></div>
    <?php submit_button(); ?>
  </form>
</div>

