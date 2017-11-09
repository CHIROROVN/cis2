@extends('backend.layouts.app')
@section('content')
 {!! Form::open(array('url' => 'hoge/teacher-db/contents-adm/search','id'=>'frmSearch', 'method' => 'post')) !!} 
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　登録済み教員の検索</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>条件を指定し、「検索開始」ボタンをクリックしてください。複数の条件を指定した場合は、AND検索（共に満たす）となります。<br>
        新たに教員を登録する場合は、「新規登録」をクリックしてください。</td>
    </tr>
    <tr>
      <td align="right"><input type="button" onClick="location.href='{{route('backend.teacher.regist')}}'" value="新規登録"></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">学部・所属</td>
            <td><select name="teacher_dept" id="teacher_dept">
              <option value="">指定しない</option>
                @foreach($departments as $key=>$department)
                  <option value="{{$department->dept_id}}">{{$department->faculty_name}} {{$department->dept_name}}</option>
                @endforeach
                </select>
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td><input type="text" name="txtKeyword" id="txtKeyword" >
              を含む　※漢字または読み仮名（ひらがな）</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" value="検索開始" id="btnSubmit">
        　　　　　
        <input type="reset" name="reset" value="リセット"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
{!! Form::close() !!}
<script type="text/javascript">
$("#btnSubmit").on("click",function() { 
  /* var flag = true; 
  if (!$("[name=staff_belong]").val().replace(/ /g, "")) {  
    $("#error-staff-belong").html('<?php //echo $error['error_belong_required'];?>');             
    $("#error-staff-belong").css('display','block');   
    $('[name=staff_belong]').focus();
    flag = false;    
  }

 if (!$("#cb_year").val().replace(/ /g, "")) {  
    $("#error-cb-year").html('<?php ///echo $error['error_year_required'];?>');             
    $("#error-cb-year").css('display','block');   
    $('#cb_year').focus();
    flag = false; 
  }  
  if(flag)*/ $( "#frmSearch" ).submit();
});
</script>  
@endsection