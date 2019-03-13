<?php if ( ! defined('ABSPATH')) exit('No direct script access allowed');

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://philsbury.uk
 * @since      2.0.0
 *
 * @package    Age_Gate
 * @subpackage Age_Gate/admin
 */

/**
 * The messaging settings of the plugin.
 *
 * @package    Age_Gate
 * @subpackage Age_Gate/admin
 * @author     Phil Baker
 */
class Age_Gate_Multi_Lingual extends Age_Gate_Common {

  public function __construct() {

		parent::__construct();

	}

  public function is_multi_lingual(){
    // wp_die('lang test:' . function_exists('icl_get_current_language') );
    if(function_exists('icl_get_current_language')){
      $all = icl_get_languages();
      $current = icl_get_current_language();
      $default = icl_get_default_language();

      // no languages set
      if(!$all) return;

      // set the current to be the default is none exists
      // $current = ($current === 'all' || !$current ? $default : $current);

      self::$language = (object) array(
        'current' => ($current === 'all' || !$current ? [] : $all[$current]),
        'default' => $all[$default],
      );

      unset($all[$default]);
      self::$language->languages = $all;
    }
  }

}