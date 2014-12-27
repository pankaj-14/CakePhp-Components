<?php
/*
 * Curl Component
 * Created bY : PANKAJ 
 */


class CurlComponent extends Component {
	// Add your code to override the core AuthComponent
	private $url,$skipper,$fields;
	
	
	public function set_url($url)
	{
		$this->url = $url;
	}
	
	public function set_skipper($skipper)
	{
		$this->skipper = $skipper;
	}
	
	public function set_fields($fields)
	{
		$this->fields = $fields;
	}
	
	public function execute()
	{
		$ch = curl_init();
		$skipper = $this->skipper;
		$fields = $this->fields;
		
		$postvars = '';
		foreach($fields as $key=>$value) {
			$postvars .= $key . "=" . $value . "&";
		}
		
		curl_setopt($ch,CURLOPT_URL,$this->url);
		curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
		curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}
	
}


?>
