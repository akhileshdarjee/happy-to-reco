<?php

namespace HappyToReco\Http\Controllers\Reports;

use DB;
use Session;
use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class UserReport extends Controller
{
	// get all rows & colummns for report
	public function get_data($request) {
		$query = DB::table('tabUser')
			->select(
				'id', 'full_name', 'login_id', 'email', 'role', 'status'
			);

		if ($request->has('filters') && $request->get('filters')) {
			$filters = $request->get('filters');
			if (isset($filters['email']) && $filters['email']) {
				$query = $query->where('email', $filters['email']);
			}
			if (isset($filters['role']) && $filters['role']) {
				$query = $query->where('role', $filters['role']);
			}
			if (isset($filters['status']) && $filters['status']) {
				$query = $query->where('status', $filters['status']);
			}
			if (isset($filters['from_date']) && isset($filters['to_date']) && $filters['from_date'] && $filters['to_date']) {
				$query = $query->where('created_at', '>=', date('Y-m-d H:i:s', strtotime($filters['from_date'])))
					->where('created_at', '<=', date('Y-m-d H:i:s', strtotime($filters['to_date'])));
			}
		}

		$rows = $query->orderBy('id', 'desc')->get();

		return array(
			'rows' => $rows,
			'columns' => ['full_name', 'login_id', 'email', 'role', 'status'],
			'module' => 'User',
			'link_field' => 'id',
			'record_identifier' => 'login_id'
		);
	}
}