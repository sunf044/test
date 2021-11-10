<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function isAjax()
{
	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	    return true;
	}
	return false;
}
function DateThai($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth = date("n",strtotime($strDate));
	$strDay = date("j",strtotime($strDate));
	$strHour = date("H",strtotime($strDate));
	$strMinute = date("i",strtotime($strDate));
	$strSeconds = date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai = $strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
}





/* End of file fnc_helper.php */
/* Location: ./application/helpers/fnc_helper.php */
