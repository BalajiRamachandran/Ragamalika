<?php
Class xml {
	function generate_xml_from_array($array, $node_name) {
		$xml = '';

		if (is_array($array) || is_object($array)) {
			foreach ($array as $key=>$value) {
				if (is_numeric($key)) {
					$key = $node_name;
				}

				$xml .= '<' . $key . '>' . self::generate_xml_from_array($value, $node_name) . '</' . $key . '>';// . "\n";
			}
		} else {
			$xml = htmlspecialchars($array, ENT_QUOTES);// . "\n";
		}

		return trim($xml);
	}

	function generate_valid_xml_from_array($array, $node_block='ObjectXml', $node_name='Element') {
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . "\n";

		$xml .= '<' . $node_block . '>';// . "\n";
		$xml .= self::generate_xml_from_array($array, $node_name);
		$xml .= '</' . $node_block . '>';// . "\n";

		return $xml;
	}	
}
?>