#CodeIgniter DB Variable API
Dead simple Drupal-like database variable API for CodeIgniter.

## Dependencies
* [CodeIgniter Base Model](https://github.com/sepehr/ci-mongodb-base-model)

## Installation
Move each file to its corresponding directory in CodeIgniter `application/` and you're simply done. In case of using modular
version of CodeIgniter, make sure to update model paths in `helpers/variable_helper.php`. You might want to autoload the the model
and its helper in `config/autoload.php` file.

## Usage
```php
	/**
	 * Sample controller.
	 */
	class Users extends CI_Controller {

		public function blablah()
		{
			// Make sure to load/autoload the library
			$this->load->model('variable_model');

			// Using model API
			$key = this->variable_model->variable_get('key_name', 'default_value');

			// Using helper API
			$key = variable_get('key_name', 'default_value'); // Or simply vget()

			// The documentation is pretty sparse, please refer to the code.
			// @see: variable_get(), variable_set(), variable_del()
		}

	}
```

## TODOs
* Library
* API reference