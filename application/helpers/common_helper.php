<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function setDateTime()
{
	return date('Y-m-d H:i:s');
}

function setDateOnly()
{
	return date('Y-m-d');
}
function convertDatedmy($dt)
{
	return date("d-m-Y", strtotime($dt));
}
function convertDate($dt)
{
	return date("d M , Y", strtotime($dt));
}

function convertDatedmyhis($dt)
{
	return date("d-m-Y H:i s", strtotime($dt));
}
function dateDiff($date1, $date2)
{
	$date1_ts = strtotime($date1);
	$date2_ts = strtotime($date2);
	$diff = $date2_ts - $date1_ts;
	return round($diff / 86400);
}
function sessionId($id)
{
	$ci = &get_instance();
	return $ci->session->userdata($id);
}
function userData($id, $data)
{
	$ci = &get_instance();
	return $ci->session->set_userdata($id, $data);
}

function insertRow($table, $data)
{
	$ci = &get_instance();
	$clean = $ci->security->xss_clean($data);
	return $ci->db->insert($table, $clean);
}

function returnId($table, $data)
{
	$ci = &get_instance();
	$ci->db->insert($table, $data);
	return $ci->db->insert_id();
}

function randomCode($length_of_string)
{
	$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	return substr(str_shuffle($str_result), 0, $length_of_string);
}

function getRowById($table, $column, $id)
{
	$ci = &get_instance();
	$get = $ci->db->get_where($table, array($column => $id));
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getDataWithLimitInOrder($table, $column, $id, $limit)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($column, $id)
		->limit($limit)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getSingleRowById($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	if ($get->num_rows() > 0) {
		return $get->row_array();
	} else {
		return false;
	}
}

function getAllRow($table)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function updateRowById($table, $column, $id, $data)
{
	$ci = &get_instance();
	$clean = $ci->security->xss_clean($data);
	$query = $ci->db->where($column, $id)
		->update($table, $clean);
	return $ci->db->affected_rows();
}

function deleteRowById($table, $column, $id)
{
	$ci = &get_instance();
	$ci->db->where($column, $id);
	$ci->db->delete($table);
	if ($ci->db->affected_rows() > 0) {
		return true;
	} else {
		return $ci->db->error();
	}
}

function deleteRowMoreId($table, $where)
{
	$ci = &get_instance();
	$ci->db->where($where);
	$ci->db->delete($table);
	if ($ci->db->affected_rows() > 0) {
		return true;
	} else {
		return $ci->db->error();
	}
}

function getAllRowInOrder($table, $column, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($column, $type)->get($table);
	if ($select->num_rows() > 0) {
		return $select->result_array();
	} else {
		return false;
	}
}

function getRowsByMoreIdWithOrder($table, $where, $column, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($column, $type)->get_where($table, $where);
	if ($select->num_rows() > 0) {
		return $select->result_array();
	} else {
		return false;
	}
}

function getDataByIdInOrder($table, $column, $id, $orderColumn, $type)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($orderColumn, $type)->get_where($table, array($column => $id));
	return $select->result_array();
}

function getAllDataWithLimitInOrder($table, $orderColumn, $type, $start, $end)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($orderColumn, $type)->limit($start, $end)->get($table);
	return $select->result_array();
}
function getDataByIdInOrderLimit($table, $column, $id, $orderColumn, $type, $start, $end)
{
	$ci = &get_instance();
	$select = $ci->db->order_by($orderColumn, $type)->limit($start, $end)->get_where($table, array($column => $id));
	return $select->result_array();
}

function getRowByMoreId($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function getNumRows($table, $where)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->get();
	return $get->num_rows();
}

function getRowByLikeInOrder($table, $where, $like, $name, $orderBy, $orderType)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from($table)
		->where($where)
		->like($like, $name, 'both')
		->order_by($orderBy, $orderType)
		->get();
	if ($get->num_rows() > 0) {
		return $get->result_array();
	} else {
		return false;
	}
}

function encryptId($id)
{
	$ci = &get_instance();
	$key = $ci->encrypt->encode($id);
	return $key;
}

function decryptId($key)
{
	$ci = &get_instance();
	$id = $ci->encrypt->decode($key);
	return $id;
}

function lastReplace($search, $replace, $subject)
{
	$pos = strrpos($subject, $search);
	if ($pos !== false) {
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}

function flashData($var, $message)
{
	$ci = &get_instance();
	return $ci->session->set_flashdata($var, $message);
}

function sendOTP($contact_no, $message_content)
{
	$user = "ekaumotp794454";
	$password = "6337";
	$senderid = "EKAUMB";
	$url = "https://kit19.com/ComposeSMS.aspx?";
	$url .= 'username=' . $user;
	$url .= '&password=' . $password;
	$url .= '&sender=' . $senderid;
	$url .= '&to=' . urlencode($contact_no);
	$url .= '&message=' . urlencode($message_content);
	$url .= '&priority=1';
	$url .= '&dnd=1';
	$url .= '&unicode=0';
	// 	$url = "http://mysmsshop.in/V2/http-api.php?apikey=aYR5fktJhboWNydD&senderid=UDHYME&number=$contact_no&message=" . urlencode($message_content) . "&format=json";
	$res = curl_init();
	curl_setopt($res, CURLOPT_URL, $url);
	curl_setopt($res, CURLOPT_RETURNTRANSFER, true);
	$result1 = curl_exec($res);
}

function getUserId($token)
{
	$ci = &get_instance();
	$ip = $ci->input->ip_address();
	$get = $ci->db->select()
		->from('user_registration')
		->where("user_registration.user_id = '" . $token['data']->id . "' AND user_status = '1' AND unique_hash = '" . $token['data']->unique_hash . "'")
		->get();
	if ($get->num_rows() > 0) {
		return $token['data']->id;
	} else {
		return false;
	}
}


function orderIdGenerateUser()
{
	$number = 'VED' . date('ydmhis');
	if (checkOrderIdExistUser($number)) {
		orderIdGenerateUser();
	}
	return $number;
}

function checkOrderIdExistUser($number)
{
	$ci = &get_instance();
	$get = $ci->db->select()
		->from('affiliate_links')
		->where("affiliate_var = '$number'")
		->get();
	if ($get->num_rows() > 0) {
		return true;
	} else {
		return false;
	}
}


function imageUpload($imageName, $path)
{
	$ci = &get_instance();
	$config['file_name'] = date('dm') . round(microtime(true) * 1000);
	$config['allowed_types'] = 'jpg|png|jpeg|webp';
	$config['upload_path'] = $path;
	$target_path = $path;
	$config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		$configi['width'] = 380;
		$configi['height'] = 260;
		$ci->load->library('image_lib');
		$ci->image_lib->initialize($configi);
		$ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}

function imageUploadWithRatio($imageName, $path, $width, $height)
{
	$ci = &get_instance();
	$config['file_name'] = date('dm') . round(microtime(true) * 1000);
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['upload_path'] = $path;
	$target_path = $path;
	$config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		$configi['width'] = $width;
		$configi['height'] = $height;
		$ci->load->library('image_lib');
		$ci->image_lib->initialize($configi);
		$ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}

function fullImage($imageName, $path)
{
	$ci = &get_instance();
	$config['file_name'] = date('dm') . round(microtime(true) * 1000);
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['upload_path'] = $path;
	$target_path = $path;
	$config['remove_spaces'] = true;
	$config['overwrite'] = false;
	$ci->load->library('upload', $config);
	$ci->upload->initialize($config);
	if ($ci->upload->do_upload($imageName)) {
		$data = array('upload_data' => $ci->upload->data());
		$path = $data['upload_data']['full_path'];
		$picture = $data['upload_data']['file_name'];
		$configi['image_library'] = 'gd2';
		$config['quality'] = '100%';
		$config['create_thumb'] = FALSE;
		$configi['source_image'] = $path;
		$configi['new_image'] = $target_path;
		$configi['maintain_ratio'] = TRUE;
		$ci->load->library('image_lib');
		$ci->image_lib->initialize($configi);
		$ci->image_lib->resize();
		return $picture;
	} else {
		return false;
	}
}

function sendNotificationUser($device_id, $title, $message)
{
	$url = 'https://fcm.googleapis.com/fcm/send';

	define('API_KEY', 'AAAA0k59dxI:APA91bGS22p4m1y4OUeTSAjMQv4YcKQjVaBNjgTiuScqtE_S2b813j-Nq_slYfD9zcGFFwsDMUxf17TPKp5L94MFhvvlbz8tITzKPNFzVHy9Hupm89pZevttM8U4EGWCBBwUHidjzybE');

	$data = array("to" => $device_id, "notification" => array("title" => $title, "body" => $message));
	$data_string = json_encode($data);
	$headers = array('Authorization: key=' . API_KEY, 'Content-Type: application/json');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	$results = curl_exec($ch);
	curl_close($ch);
	return $results;
}

function sendEmail($sendToEmail, $subject, $mail_body)
{
	require 'php/class/class.phpmailer.php';
	$base_url = "https://www.kalakarnii.in/";
	$host = 'mail.kalakarnii.in';
	$username = 'info@kalakarnii.in';
	$password = "mxgA6b)}q)(b";

	$mail = new PHPMailer;
	$mail->IsSMTP();
	$mail->Host = $host;
	$mail->Port = '587';
	$mail->SMTPAuth = true;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->SMTPSecure = '';
	$mail->From = $username;
	$mail->FromName = 'Kalakarnii';
	$mail->AddAddress($sendToEmail);
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $mail_body;
	if ($mail->Send()) {
		//  print_r($mail);
		return true;
	} else {
		return false;
		//  print_r($mail);
	}
}
function getCurrency()
{
	$currencies = array(
		'USD' => 'US Dollar - USD - $',
		// 'EUR' => 'Euro - EUR - €',
		// 'GBP' => 'Pound Sterling - GBP - £',
		// 'DZD' => 'Algerian Dinar - DZD - دج',
		// 'ARS' => 'Argentine Peso - ARS - $',
		// 'AUD' => 'Australian Dollar - AUD - $',
		// 'ATS' => 'Austrian shilling - ATS - S',
		// 'BSD' => 'Bahamian Dollar - BSD - $',
		// 'BBD' => 'Barbados Dollar - BBD - $',
		// 'BEF' => 'Belgian Franc - BEF - Fr',
		// 'BMD' => 'Bermudian Dollar - BMD - $',
		// 'BRR' => 'Brazilian real - BRR - R$',
		// 'BGL' => 'Bulgarian Lev - BGL - лв',
		// 'CAD' => 'Canadian Dollar - CAD - $',
		// 'CLP' => 'Chilean Peso - CLP - $',
		// 'CNY' => 'Yuan Renminbi - CNY - ￥',
		// 'CYP' => 'Cypriot pound - CYP - £',
		// 'CSK' => 'Czechoslovak koruna - CSK - Kč',
		// 'DKK' => 'Danish Krone - DKK - kr',
		// 'NLG' => 'Dutch guilder - NLG - ƒ',
		// 'XCD' => 'East Caribbean Dollar - XCD - $',
		// 'EGP' => 'Egyptian Pound - EGP - ج.م',
		// 'FJD' => 'Fiji Dollar - FJD - FJ$',
		// 'FIM' => 'Finnish markka - FIM - mk',
		// 'FRF' => 'French franc - FRF - Fr',
		// 'DEM' => 'Deutsche Mark - DEM - DM',
		// 'XAU' => 'Gold Ounce - XAU',
		// 'GRD' => 'Grenadian dollar - XCD - $',
		// 'HKD' => 'Hong Kong Dollar - HKD - HK$',
		// 'HUF' => 'Hungarian Forint - HUF - Ft',
		// 'ISK' => 'Icelandic Krona - ISK - kr',
		'INR' => 'Indian Rupee - INR - ₹',
		// 'IDR' => 'Rupiah - IDR - Rp',
		// 'IEP' => 'Irish Pound - IEP - IR£',
		// 'ILS' => 'New Israeli Sheqel - ILS - ₪',
		// 'ITL' => 'Italian lira - ITL - ₤',
		// 'JMD' => 'Jamaican Dollar - JMD - $',
		// 'JPY' => 'Yen - JPY - ¥',
		// 'JOD' => 'Jordanian Dinar - JOD - د.ا',
		// 'KRW' => 'Won - KRW - ₩',
		// 'LBP' => 'Lebanese Pound - LBP - ل.ل',
		// 'LUF' => 'Luxembourg franc - LUF - F',
		// 'MYR' => 'Malaysian Ringgit - MYR - RM',
		// 'MXP' => 'Mexican peso - MXP - Mex$',
		// 'NZD' => 'New Zealand Dollar - NZD - $',
		// 'NOK' => 'Norwegian Krone - NOK - kr',
		// 'PKR' => 'Pakistan Rupee - PKR - ₨',
		// 'XPD' => 'Palladium Ounce - XPD',
		// 'PHP' => 'Philippine Peso - PHP - ₱',
		// 'XPT' => 'Platinum Ounce - XPT',
		// 'PLZ' => 'Polish złoty - PLZ - zł',
		// 'PTE' => 'Portuguese escudo - PTE - $',
		// 'ROL' => 'Romanian leu - ROL - lei',
		// 'RUR' => 'Russian ruble - RUR - ₽',
		// 'SAR' => 'Saudi Riyal - SAR - ﷼',
		// 'XAG' => 'Silver Ounce - XAG',
		// 'SGD' => 'Singapore Dollar - SGD - S$',
		// 'SKK' => 'Slovak Koruna - SKK - Sk',
		// 'ZAR' => 'South Africa Rand - ZAR - R',
		// 'ESP' => 'Spanish peseta - ESP - Pta',
		// 'XDR' => 'SDR (Special Drawing Right) - XDR',
		// 'SDD' => 'Sudanese dinar - SDD - LSd',
		// 'SEK' => 'Swedish Krona - SEK - kr',
		// 'CHF' => 'Swiss Franc - CHF - CHF',
		// 'TWD' => 'New Taiwan Dollar - TWD - NT$',
		// 'THB' => 'Baht - THB - ฿',
		// 'TTD' => 'Trinidad and Tobago Dollar - TTD - TT$',
		// 'TRL' => 'Turkish lira - TRL - ₺',
		// 'VEB' => 'Venezuelan bolivar - VEB - Bs.S.',
		// 'ZMK' => 'Zambian kwacha - ZMK - ZK'
	);

	return $currencies;
}
// function stripe_keys()
// {
// 	require('stripe/init.php');
// 	$publishableKey = "pk_test_51KRAN4SD6EyjwKBG739NS2J8p2NEi9rw2TPIGLDz38qOwzJEOsKdLCxmiXdCvFIysNDwqYSXliK6hiodVjmVGrpb00WYvLivRi";
// 	$secretKey = "sk_test_51KRAN4SD6EyjwKBGacWIG5AO8dUlrVdNYdudAb2d9ThG3qBBkoRgBdK74NigLI8B7Q1AmQdEH92hvizKw9FEW22s00eBkCKOpM";
// 	\Stripe\Stripe::setApiKey($secretKey);
// }
function stripe()
{
	require 'vendor/autoload.php';

	// This is your test secret API key.
	\Stripe\Stripe::setApiKey('sk_test_51KRAN4SD6EyjwKBGacWIG5AO8dUlrVdNYdudAb2d9ThG3qBBkoRgBdK74NigLI8B7Q1AmQdEH92hvizKw9FEW22s00eBkCKOpM');

	function calculateOrderAmount(array $items): int
	{
		// Replace this constant with a calculation of the order's amount
		// Calculate the order total on the server to prevent
		// people from directly manipulating the amount on the client
		return 1400;
	}

	header('Content-Type: application/json');

	try {
		// retrieve JSON from POST body
		$jsonStr = file_get_contents('php://input');
		$jsonObj = json_decode($jsonStr);

		// Create a PaymentIntent with amount and currency
		$paymentIntent = \Stripe\PaymentIntent::create([
			'amount' => calculateOrderAmount($jsonObj->items),
			'currency' => 'eur',
			'automatic_payment_methods' => [
				'enabled' => true,
			],
		]);

		$output = [
			'clientSecret' => $paymentIntent->client_secret,
		];

		echo json_encode($output);
	} catch (Error $e) {
		http_response_code(500);
		echo json_encode(['error' => $e->getMessage()]);
	}
}

function setImage($image_nm, $location)
{
	if ($image_nm != '') {
		if (file_exists(FCPATH . $location . $image_nm)) {
			return base_url() . $location . $image_nm;
		} else {
			return base_url() . 'upload/default.png';
		}
	} else {
		return base_url() . 'upload/default.png';
	}
}
