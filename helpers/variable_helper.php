<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Drupal-like procedural variable helpers for CodeIgniter.
 *
 * @package		CodeIgniter
 * @author		Sepehr Lajevardi <me@sepehr.ws>
 * @copyright	Copyright (c) 2012 Sepehr Lajevardi.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		https://github.com/sepehr/ci-db-variable
 * @version 	Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

if ( ! function_exists('variable_set'))
{
	/**
	 * Sets a key-value document while maintaining updates.
	 *
	 * @param  string $key       Document key.
	 * @param  mixed  $value     Document value.
	 * @param  bool   $overwrite Whether to overwrite existing documents or not.
	 *
	 * @return bool
	 */
	function variable_set($key, $value, $overwrite = TRUE)
	{
		$CI =& get_instance();
		isset($CI->variable_model) OR $CI->load->model('variable_model');

		return $CI->variable_model->variable_set($key, $value, $overwrite);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('variable_get'))
{
	/**
	 * Gets a value of a key-value document by key.
	 *
	 * @param  string $key     Document key.
	 * @param  mixed  $default Default value if not exists.
	 *
	 * @return mixed
	 */
	function variable_get($key, $default = NULL)
	{
		$CI =& get_instance();
		isset($CI->variable_model) OR $CI->load->model('variable_model');

		return $CI->variable_model->variable_get($key, $default);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('variable_del'))
{
	/**
	 * Deletes a key-value document by key.
	 *
	 * @param  string $key     Document key.
	 *
	 * @return bool
	 */
	function variable_del($key)
	{
		$CI =& get_instance();
		isset($CI->variable_model) OR $CI->load->model('variable_model');

		return $CI->variable_model->variable_del($key);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('vset'))
{
	/**
	 * variable_set() alias.
	 *
	 * @param  string $key       Document key.
	 * @param  mixed  $value     Document value.
	 * @param  bool   $overwrite Whether to overwrite existing documents or not.
	 *
	 * @return bool
	 */
	function vset($key, $value, $overwrite = TRUE)
	{
		return variable_set($key, $value, $overwrite);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('vget'))
{
	/**
	 * variable_get() alias.
	 *
	 * @param  string $key     Document key.
	 * @param  mixed  $default Default value if not exists.
	 *
	 * @return mixed
	 */
	function vget($key, $default = NULL)
	{
		return variable_get($key, $default);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('vdel'))
{
	/**
	 * variable_del() alias.
	 *
	 * @param  string $key     Document key.
	 *
	 * @return bool
	 */
	function vdel($key)
	{
		return variable_del($key);
	}
}

// ------------------------------------------------------------------------

/* End of file variable_helper.php */
/* Location: ./application/helpers/variable_helper.php */