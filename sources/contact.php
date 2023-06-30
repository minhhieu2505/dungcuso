<?php
if (!defined('SOURCES'))
	die("Error");

if (!empty($_POST['contact']) && $_POST['contact'] == 'submit') {
	$dataContact = (!empty($_POST['dataContact'])) ? $_POST['dataContact'] : null;

	/* Valid data */
	if (!empty($dataContact['email']) && !$func->isEmail($dataContact['email'])) {
		$response['messages'][] = 'Email không hợp lệ';
	}
	if (!empty($response)) {
		/* Flash data */
		if (!empty($dataContact)) {
			foreach ($dataContact as $k => $v) {
				if (!empty($v)) {
					$flash->set($k, $v);
				}
			}
		}

		/* Errors */
		$response['status'] = 'danger';
		$message = base64_encode(json_encode($response));
		$flash->set("message", $message);
		$func->redirect("lien-he");
	}

	/* Save data */
	$data = array();
	$data['fullname'] = htmlspecialchars($dataContact['fullname']);
	$data['email'] = htmlspecialchars($dataContact['email']);
	$data['phone'] = htmlspecialchars($dataContact['phone']);
	$data['address'] = htmlspecialchars($dataContact['address']);
	$data['content'] = htmlspecialchars($dataContact['content']);
	$data['date_created'] = time();
	$d->insert('contact', $data);


}
?>