<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Drupal-like procedural variable helpers for CodeIgniter.
 *
 * Requires CodeIgniter Base Model as a dependency:
 * https://github.com/sepehr/ci-mongodb-base-model
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

/**
 * Variable model class.
 *
 * @package     CodeIgniter
 * @subpackage  Models
 * @category    Models
 * @author      Sepehr Lajevardi <me@sepehr.ws>
 * @link        https://github.com/sepehr/ci-db-variable
 * @see         https://github.com/sepehr/ci-mongodb-base-model
 */
class Variable_model extends Base_Model {

	/**
	 * Indicates that model data is persisted in MongoDB.
	 */
	protected $_mongodb = TRUE;

	/**
	 * Indicates MongoDB collection name.
	 * Or the table name if not using mongodb.
	 */
	protected $_datasource = 'variables';

	/**
	 * Skip model data valdiation,
	 * we're using Form API validation layer.
	 */
	protected $skip_validation = TRUE;

	/**
	 * Contains collection fields in case that we're using
	 * MongoDB. Setting this property is optional but it's
	 * strongly recommended to be set to prevent possible
	 * SQL-like and Null byte injection attacks.
	 *
	 * This also ensure setting default values for missing fields
	 * in a document.
	 */
	protected $_fields = array('key', 'value');

	// ------------------------------------------------------------------------
	// API Functions
	// ------------------------------------------------------------------------

	/**
	 * Sets a key-value document while maintaining updates.
	 *
	 * @param  string $key       Document key.
	 * @param  mixed  $value     Document value.
	 * @param  bool   $overwrite Whether to overwrite existing documents or not.
	 *
	 * @return bool
	 */
	public function variable_set($key, $value, $overwrite = TRUE)
	{
		// Update
		if ($current = $this->get_by('key', $key))
		{
			if ($overwrite)
			{
				return $this->update($current->_id, array('value' => $value));
			}

			return -1;
		}

		// New document
		return $this->insert(array('key' => $key, 'value' => $value));
	}

	// ------------------------------------------------------------------------

	/**
	 * Gets a value of a key-value document by key.
	 *
	 * @param  string $key     Document key.
	 * @param  mixed  $default Default value if not exists.
	 *
	 * @return mixed
	 */
	public function variable_get($key, $default = NULL)
	{
		if ($document = $this->get_by('key', $key))
		{
			return $document->value;
		}

		return $default;
	}

	// ------------------------------------------------------------------------

	/**
	 * Deletes a key-value document by key.
	 *
	 * @param  string $key     Document key.
	 *
	 * @return bool
	 */
	public function variable_del($key)
	{
		return $this->delete_by(array('key' => $key));
	}

	// ------------------------------------------------------------------------

}
// End of Variable_model class

/* End of file variable_model.php */
/* Location: ./application/modules/system/models/variable_model.php */