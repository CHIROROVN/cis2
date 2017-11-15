@extends('backend.layouts.app')
@section('content')
{!! Form::open(array('route' => 'backend.teacher.regist','id'=>'frmUpload', 'enctype'=>'multipart/form-data', 'accept-charset'=>'UTF-8')) !!} 
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　教員の新規登録</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>必要事項を入力し、「確認画面へ」ボタンをクリックしてください。なお、<span class="f_caution">[*] 印の項目は入力必須</span>です。</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">所属学科（学部）</td>
            <td><select name="teacher_dept1" id="teacher_dept1">
              <option value="">指定しない</option>
                  @foreach($departments as $key=>$department)
                  <option value="{{$department->dept_id}}">{{$department->faculty_name}} . {{$department->dept_name}}</option>
                  @endforeach

            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">所属専攻（大学院）</td>
            <td><select name="teacher_dept2" id="teacher_dept2">
              <option value="">指定しない</option>
                  @foreach($departments as $key=>$department)
                  <option value="{{$department->dept_id}}">{{$department->faculty_name}} . {{$department->dept_name}}</option>
                  @endforeach
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">役職</td>
            <td><input type="radio" name="teacher_title" id="teacher_title" value="1">
              <label for="radio">教授　　　
                <input type="radio" name="teacher_title" id="teacher_title" value="2">
              准教授　　　
              <input type="radio" name="teacher_title" id="teacher_title" value="3">
              講師　　　
              <input type="radio" name="teacher_title" id="teacher_title" value="4">
              名誉教授　　　
              <input type="radio" name="teacher_title" id="teacher_title" value="0" checked="">
              なし</label></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td>姓：
              <input type="text" name="teacher_name1f" id="teacher_name1f" value="{{old('teacher_name1f')}}">
              　　　名：
              <input type="text" name="teacher_name1g" id="teacher_name1g" value="{{old('teacher_name1g')}}"></td>

          </tr>
          <tr>
            <td width="25%" class="col3">氏名（よみ）</td>
            <td>せい：
              <input type="text" name="teacher_name2f" id="teacher_name2f" value="{{old('teacher_name2f')}}">
              　　　めい：
              <input type="text" name="teacher_name2g" id="teacher_name2g" value="{{old('teacher_name2g')}}">
              <div  id="error-teacher-name">@if ($errors->first('teacher_name2f'))<span class="error-text"> {!! $errors->first('teacher_name2f') !!} </span>@endif @if ($errors->first('teacher_name2g'))<br><span class="error-text"> {!! $errors->first('teacher_name2g') !!}</span> @endif</div></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（ローマ字）</td>
            <td>Family name：
              <input type="text" name="teacher_name3f" id="teacher_name3f" value="{{old('teacher_name3f')}}">
            　　　Given name：
               <input type="text" name="teacher_name3g" id="teacher_name3g" value="{{old('teacher_name3g')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">顔写真</td>
            <td><input type="file" name="teacher_photo" id="teacher_photo" value="{{old('teacher_photo')}}">
              <input name="img-delete" type="button" id="img-delete" value="×">
              <div class="error-text" id="error-teacher-photo" style="display: none">{{$error_photo}}</div>
              </td>
          </tr>
          <tr>
            <td width="25%" class="col3">リンク先URL</td>
            <td><input name="teacher_url" type="text" id="teacher_url" size="60" value="{{old('teacher_url')}}">
              <div class="error-text" id="error-teacher-url" style="display: none">{{$error_url}}</div>
               </td>
          </tr>
          <tr>
            <td width="25%" class="col3">分野</td>
            <td><select name="teacher_research" id="teacher_research">
              <option value="">▼選択</option>             
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位</td>
            <td><input type="text" name="teacher_degree" id="teacher_degree" value="{{old('teacher_degree')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位取得機関と年月</td>
            <td>取得機関：
              <input type="text" name="teacher_getplace" id="teacher_getplace" value="{{old('teacher_getplace')}}">
              　　　
              <select name="teacher_getyear" id="teacher_getyear">
                <option value="">----年</option>
                @for ($i = START_YEAR; $i <= END_YEAR; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
              <select name="  teacher_getmonth" id=" teacher_getmonth">
                <option value="">--月</option>
                @for ($i = 1; $i <= 12; $i++)
                <option value="{{$i}}">{{$i}}月</option>
                @endfor                   
              </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_1</td>
            <td><input type="text" name="teacher_keyword1" id="teacher_keyword1" value="{{old('teacher_keyword1')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_2</td>
            <td><input type="text" name="teacher_keyword2" id="teacher_keyword2" value="{{old('teacher_keyword2')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_3</td>
            <td><input type="text" name="teacher_keyword3" id="teacher_keyword3" value="{{old('teacher_keyword3')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_4</td>
            <td><input type="text" name="teacher_keyword4" id="teacher_keyword4" value="{{old('teacher_keyword4')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_5</td>
            <td><input type="text" name="teacher_keyword5" id="teacher_keyword5" value="{{old('teacher_keyword5')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_6</td>
            <td><input type="text" name="teacher_keyword6" id="teacher_keyword6" value="{{old('teacher_keyword6')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_7</td>
            <td><input type="text" name="teacher_keyword7" id="teacher_keyword7" value="{{old('teacher_keyword7')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_8</td>
            <td><input type="text" name="teacher_keyword8" id="teacher_keyword8" value="{{old('teacher_keyword8')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_9</td>
            <td><input type="text" name="teacher_keyword9" id="teacher_keyword9" value="{{old('teacher_keyword9')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_10</td>
            <td><input type="text" name="teacher_keyword10" id="teacher_keyword10" value="{{old('teacher_keyword10')}}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td><input type="checkbox" name="teacher_dspl_flag" id="teacher_dspl_flag" value="1">              一般側画面には表示しない</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="button" value="確認画面へ" name="btsubmit" id="btsubmit">
        　　　　　
      <input type="reset" name="button14" id="button14" value="クリア"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="window.history.back();" value="検索画面へ戻る（入力内容は保存されません）"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
$("#img-delete").on("click",function() {
   $("#teacher_photo").val("");
});

$("#teacher_photo").on("change",function() {
  var extension = $('#teacher_photo').val().split('.').pop().toLowerCase();
  if($.inArray(extension, ['gif','png','jpg','jpeg','bmp']) == -1) {      
      $("#error-teacher-photo").attr("style", "display:block");
      $("#teacher_photo").val("");
  }else{
     $("#error-teacher-photo").attr("style", "display:none");
  }

});  
var arrResearch = new Array();
<?php if(count($researches) > 0){ 
        foreach($researches as $research){
?>  arrResearch.push({'research_id':'<?php echo $research->research_id?>','research_name':'<?php echo $research->research_name?>','dept_id':'<?php echo $research->dept_id?>'});
<?php }}?>  
$("#teacher_dept1").on("change",function() {
  $('#teacher_research').val('') ;
  $("#teacher_research").html("<option value=''>▼選択</option>");  
  id = $('#teacher_dept1').val();  
  if(Array.isArray(arrResearch)){
      $.each(arrResearch, function(key, val){
        if(val.dept_id==id){
            $("#teacher_research").append(new Option(val.research_name, val.research_id)); 
        }
    });     
  }
});
$("#btsubmit").on("click",function() {
  var strLink = $("#teacher_url").val();
  if(strLink !=''){
   if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(strLink)){
        $("#error-teacher-url").attr("style", "display:none");
    }else{
       $("#error-teacher-url").attr("style", "display:block");
       return false;
    }     
  } 
  $("#frmUpload").submit();
});   
</script>  
{!! Form::close() !!} 
@endsection