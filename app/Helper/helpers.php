<?php
if (!function_exists('getDepartmentName')) {
	function getDepartmentName($arrDepartment,$depatment_id)
	{
		return isset($arrDepartment[$depatment_id])?$arrDepartment[$depatment_id]:'';
	}	
}	