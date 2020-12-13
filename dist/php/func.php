<?

	function senderEmail($toSend, $subject, $fromName, $fromEmail)
	{
		if (!$_POST['phone']) {
			exit();
		}

		$ref = $_SERVER['HTTP_REFERER'];
				$result=parse_url($ref);
				parse_str($result['query'],$params);

				if (isset($params['utm_source']) || isset($params['utm_medium']) ||
				isset($params['utm_campaign']) || isset($params['utm_content']) || isset($params['utm_term'])){
				$utm .= "<p><strong>Источник:</strong> ".$params['utm_source'];
				$utm .= "<p><strong>Тип трафика:</strong> ".$params['utm_medium'];
				$utm .= "<p><strong>Кампания:</strong> ".$params['utm_campaign'];
				$utm .= "<p><strong>Объявление:</strong> ".$params['utm_content'];
				$utm .= "<p><strong>Кл. фраза:</strong> ".$params['utm_term'];
		} else {
				$utm .= "<p><strong>Нет данных</strong>";
		}

		$name 		= $_POST['name'];
		$phone 		= $_POST['phone'];
		$region		= $_POST['region'];
		$msg = "<p><strong>Имя:</strong> " . $name . "</p>\r\n";
		$msg .= "<p><strong>Телефон:</strong> " . $phone . "</p>\r\n";
		$msg .= "<p><strong>Регион:</strong> " . $region . "</p>\r\n";
		$msg .= "<p><strong>UTM-метки:</strong> " . $utm . "</p>\r\n";

		$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
		$headers .= "From: =?UTF-8?B?" . base64_encode($fromName) . "?= <" . $fromEmail . ">\r\n";

		if (mail($toSend, "=?UTF-8?B?" . base64_encode($subject) . "?=", $msg, $headers)) {
			echo json_encode(array('status' => 'OK'));
		}
	}




/*
	function senderEmail($toSend, $subject, $fromName, $fromEmail)
	{
		if (!$_POST['phone']) {
			exit();
		}

		$name 		= $_POST['name'];
		$phone 		= $_POST['phone'];
		$region		= $_POST['region'];
		$product	= $_POST['product-name'];

		$utm_medium		= $_POST['utm_medium'];
		$utm_campaign	= $_POST['utm_campaign'];
		$utm_content	= $_POST['utm_content'];
		$utm_term		= $_POST['utm_term'];
		$yclid			= $_POST['yclid'];

		$msg = "<p><strong>Имя:</strong> " . $name . "</p>\r\n";
		$msg .= "<p><strong>Телефон:</strong> " . $phone . "</p>\r\n";
		$msg .= "<p><strong>Регион:</strong> " . $region . "</p>\r\n";
		// $msg .= "<p><strong>Товар:</strong> " . $product . "</p>\r\n";

    $msg .= "<p><strong>utm_source:</strong> " . $utm_source . "</p>\r\n";
    $msg .= "<p><strong>utm_medium:</strong> " . $utm_medium . "</p>\r\n";
    $msg .= "<p><strong>utm_campaign:</strong> " . $utm_campaign . "</p>\r\n";
    $msg .= "<p><strong>utm_content:</strong> " . $utm_content . "</p>\r\n";
    $msg .= "<p><strong>utm_term:</strong> " . $utm_term . "</p>\r\n";
    $msg .= "<p><strong>yclid:</strong> " . $yclid . "</p>\r\n";


		$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
		$headers .= "From: =?UTF-8?B?" . base64_encode($fromName) . "?= <" . $fromEmail . ">\r\n";

		if (mail($toSend, "=?UTF-8?B?" . base64_encode($subject) . "?=", $msg, $headers)) {
			echo json_encode(array('status' => 'OK'));
		}
	}

?>


