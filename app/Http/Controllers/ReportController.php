<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

	public static $controllers_path = "App\\Http\\Controllers";

	// Show list of all reports for the app
	public static function show() {
		if (Session::get('role') == 'Administrator') {
			return view('index', array('data' => [], 'file' => 'layouts.app.reports'));
		}
		else {
			return back()->withInput()->with(['msg' => 'You are not authorized to view "Reports" detail(s)']);
		}
	}

	public function showReport(Request $request, $report_name) {
		$user_role = Session::get('role');
		$user_name = Session::get('user');

		if ($request->has('download') && $request->get('download') == 'Yes') {
			$columns = $this->report_view_columns($report_name);
			$rows = $this->get_records($request, $report_name, $user_role, $user_name);
			return $this->downloadReport($report_name, $columns, $rows);
		}
		else {
			if ($request->ajax()) {
				return $this->get_records($request, $report_name, $user_role, $user_name);
			}
			else {
				$columns = $this->report_view_columns($report_name);
				$rows = $this->get_records($request, $report_name, $user_role, $user_name);
				$report_view_data = $this->prepare_report_view_data($rows, $columns, $report_name);

				return view('templates.report_view', $report_view_data);
			}
		}
	}


	public function report_view_columns($report_name)
	{
		$report_controller = App::make(self::$controllers_path . "\\Reports\\" . ucwords(camel_case($report_name)));
		return $report_controller->get_columns();
	}


	public function get_records($request, $report_name, $user_role, $user_name) {
		$report_controller = App::make(self::$controllers_path . "\\Reports\\" . ucwords(camel_case($report_name)));
		return $report_controller->get_rows($request, $user_role, $user_name);
	}


	// Returns an array of all data to be passed to report view
	public function prepare_report_view_data($rows, $columns, $report_name) {
		$report_view_data = [
			'rows' => $rows,
			'columns' => $columns,
			'title' => ucwords(str_replace("_", " ", $report_name)),
			'file' => 'layouts.reports.' . strtolower(str_replace(" ", "_", $report_name)),
			'count' => count($rows)
		];

		return $report_view_data;
	}


	// make downloadable xls file for report
	public function downloadReport($report_name, $columns, $rows, $suffix = null, $action = null, $custom_rows = null) {
		// file name for download
		if ($suffix) {
			$filename = $report_name . "-" . date('Y-m-d H:i:s') . "-" . $suffix;
		}
		else {
			$filename = $report_name . "-" . date('Y-m-d H:i:s');
		}

		$data_to_export['sheets'][] = [
			'header' => $columns,
			'sheet_title' => $report_name,
			'details' => $rows
		];

		$report = Excel::create($filename, function($excel) use($data_to_export, $custom_rows) {
			foreach($data_to_export['sheets'] as $data_sheet) {
				$excel->sheet($data_sheet['sheet_title'], function($sheet) use($data_sheet, $custom_rows) {
					$column_header = $data_sheet['header'];

					foreach ($column_header as $key => $value) {
						$column_header[$key] = ucwords(str_replace("_", " ", $column_header[$key]));
						if (strpos($column_header[$key], 'Id') !== false) {
							$column_header[$key] = str_replace("Id", "ID", $column_header[$key]);
						}
					}
					$data = [];
					array_push($data, $column_header);

					foreach($data_sheet['details'] as $excel_row){
						array_push($data, (array) $excel_row);
					}

					// Add custom rows to file
					if ($custom_rows) {
						if (isset($custom_rows['after_line']) && $custom_rows['after_line']) {
							for ($i = 0; $i < $custom_rows['after_line']; $i++) { 
								array_push($data, []);
							}
						}

						if (isset($custom_rows['rows']) && $custom_rows['rows']) {
							foreach ($custom_rows['rows'] as $key => $value) {
								array_push($data, array($key, $value));
							}
						}
					}

					$sheet->fromArray($data, null, 'A1', false, false);
				});
			}
		});

		if ($action) {
			if ($action == "store") {
				return $report->store('xls', false, true);
			}
			else {
				$report->download('xls');
			}
		}
		else {
			$report->download('xls');
		}
	}
}