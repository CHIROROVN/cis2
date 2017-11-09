<?php
if (!function_exists('getDepartmentName')) {
	function getDepartmentName($arrDepartment,$depatment_id)
	{
		if(count($arrDepartment) <1) return '';
		foreach($arrDepartment as $val){
           if($depatment_id==$val->dept_id)   return  $val->faculty_name.' '.$val->dept_name;
		}
		
	}	

}

