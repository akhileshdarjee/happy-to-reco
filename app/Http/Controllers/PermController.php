<?php

namespace HappyToReco\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class PermController extends Controller
{
	// define permission manager variables

	// module name specified in controller
	private static $modules = [
		'Service', 'Recommendation', 'Friends', 'Request', 'User', 'Reports'
	];

	// restrict data to this roles
	private static $roles = array('Website User', 'User');

	// set module actions
	private static $permissions = array('Read', 'Create', 'Update', 'Delete');

	// define which role can access which modules
	private static $role_modules_based_on_perm;

	// define modules wise permissions to roles
	private static $module_permissions_based_on_role;


	// list all the modules of the roles based on permissions
	public static function role_wise_modules($role = null, $action = null, $module = null) {
		// eg.
		// 'Customer' => (object) array(
		// 	'Read' => array_values(array_diff(self::$modules, array('Expense', 'ExpenseCategory', 'Income', 'Order'))), 
		// 	'Create' => array('Customer', 'Order', 'Review', 'Subscription'), 
		// 	'Update' => array('Customer', 'Order', 'Review', 'Subscription'), 
		// 	'Delete' => array('Guest', 'Booking', 'Feedback')
		// ),
		// ---------------------------------------


		self::$role_modules_based_on_perm = (object) array(
			'Website User' => (object) array(
				'Create' => array('User')
			),
			'User' => (object) array(
				'Read' => array_values(array_diff(self::$modules, array('Reports'))), 
				'Create' => array('Recommendation', 'Request', 'Friends'), 
				'Update' => array('Recommendation', 'Request', 'User'), 
				'Delete' => array('Recommendation', 'Request', 'Friends')
			),
		);

		if ($role && in_array($role, self::$roles)) {
			if (isset(self::$role_modules_based_on_perm->$role->$action)) {
				$role_modules = self::$role_modules_based_on_perm->$role->$action;
			}

			if ($module) {
				if (isset($role_modules) && in_array($module, $role_modules)) {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return isset($role_modules) ? $role_modules : false;
			}
		}
	}


	// gets the data related to the role
	public static function module_wise_permissions($role = null, $action = null, $module_name = null) {
		$user_id = Session::get('user_id');
		$user_name = Session::get('user');
		$user_login_id = Session::get('login_id');

		// eg
		// self::$module_permissions_based_on_role = array(
		// 	'Client' => (object) array(
		// 		'Read' => (object) array(
		// 			'Client' => (object) array(
		// 				'full_name' => $user_name
		// 			), 
		// 		),
		// 		'Create' => (object) array(
		// 			'Guest' => (object) array(
		// 				'company' => $user_name
		// 			), 
		// 		),
		// 		'Update' => (object) array(
		// 			'Client' => (object) array(
		// 				'full_name' => $user_name
		// 			), 
		// 		), 
		// 		'Delete' => (object) array(
		// 			'Guest' => (object) array(
		// 				'company' => $user_name
		// 			), 
		// 		)
		// 	),
		// );
		// -------------------------------------------------------------------

		self::$module_permissions_based_on_role = array(
			'Website User' => (object) array(
				'Create' => (object) array(
					'User' => (object) array(
						'role' => 'User'
					),
				),
			),
			'User' => (object) array(
				'Read' => (object) array(
					'Service' => (object) array(),
					'Recommendation' => (object) array(
						'owner' => $user_login_id
					),
					'Request' => (object) array(
						'owner' => $user_login_id
					),
					'Friends' => (object) array(
						'friend_id' => $user_id
					),
					'User' => (object) array(
						'login_id' => $user_login_id
					),
				),
				'Create' => (object) array(
					'Recommendation' => (object) array(
						'owner' => $user_login_id
					),
					'Request' => (object) array(
						'owner' => $user_login_id
					),
					'Friends' => (object) array(
						'friend_id' => $user_id
					),
				),
				'Update' => (object) array(
					'Recommendation' => (object) array(
						'owner' => $user_login_id
					),
					'Request' => (object) array(
						'owner' => $user_login_id
					),
					'User' => (object) array(
						'login_id' => $user_login_id,
						'role' => 'User'
					), 
				),
				'Delete' => (object) array(
					'Recommendation' => (object) array(
						'owner' => $user_login_id
					),
					'Request' => (object) array(
						'owner' => $user_login_id
					),
					'Friends' => (object) array(
						'friend_id' => $user_id
					),
				),
			),
		);

		if ($role && in_array($role, self::$roles)) {
			if (isset(self::$module_permissions_based_on_role[$role]->$action->$module_name)) {
				return (object) self::$module_permissions_based_on_role[$role]->$action->$module_name;
			}
			else {
				return false;
			}
		}
	}


	// gives modules and it's config list based on roles
	public static function modules_config_based_on_roles($role, $action) {
		if ($role == 'Administrator') {
			return ModuleController::modules_config();
		}
		else {
			return ModuleController::modules_config(self::role_wise_modules($role, $action));
		}
	}
}