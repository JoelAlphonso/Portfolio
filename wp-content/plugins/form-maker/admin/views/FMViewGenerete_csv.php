<?php

class FMViewGenerete_csv {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $model;

  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct($model) {
    $this->model = $model;
  }
  
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
	public function display() {
		$form_id = (int)$_REQUEST['form_id'];
		$params = $this->model->get_data();
		$limitstart = (int)$_REQUEST['limitstart'];
		$send_header = (int)$_REQUEST['send_header'];
		$data = $params[0];
		$title = $params[1]; 
		$is_paypal_info = $params[2];
		
		$all_keys = array();
		foreach ($data as $row) {
			$all_keys = array_merge($all_keys, $row);
		}

		$keys_array = array_keys($all_keys);
		foreach ($data as $key => $row) {
			foreach ($keys_array as $key1 => $value) {
				if(!array_key_exists ( $value , $row ))
					array_splice($row, $key1, 0, '');
			}
			$data[$key] = $row;
		}

		$tempfile = WD_FM_DIR . '/export'.$form_id.'.txt';
		$output = fopen($tempfile, "a");
		if($limitstart == 0) {
			fputcsv($output, str_replace('PAYPAL_', '', $keys_array));
		}
		
		foreach ($data as $record) {
			fputcsv($output, $record);
		}
		fclose($output);
		
		if($send_header == 1){
			$txtfile = fopen($tempfile, "r");
			$txtfilecontent = fread($txtfile, filesize($tempfile));
			fclose($txtfile);

			$filename = $title . "_" . date('Ymd') . ".csv";
			header('Content-Encoding: Windows-1252');
			header('Content-type: text/csv; charset=Windows-1252');
			header("Content-Disposition: attachment; filename=\"$filename\"");
			
			echo $txtfilecontent;
			unlink($tempfile);
			die(); 
		}

	}

	public function cleanData(&$str) {
		$str = preg_replace("/\t/", "\\t", $str);
		$str = preg_replace("/\r?\n/", "\\n", $str);
		if (strstr($str, '"'))
			$str = '"' . str_replace('"', '""', $str) . '"';
	}
  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}