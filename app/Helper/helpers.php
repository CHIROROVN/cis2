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

if (!function_exists('getTeacherTitle')) {
	function getTeacherTitle($teacher_title)
	{
		$arrTitle = array(1=>'教授',2=>'准教授',3=>'講師',4=>'名誉教授',0=>'なし');
		return $arrTitle[$teacher_title];
	}
}
