@extends('backend.layouts.app')
@section('content')
{!! Form::open(array('route' => ['backend.teacher.edit',  $teacher->teacher_id],'id'=>'frmUpload', 'enctype'=>'multipart/form-data', 'accept-charset'=>'UTF-8')) !!} 
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　登録済み教員の変更</td>
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
                  <option value="{{$department->dept_id}}"  @if($department->dept_id==$teacher->teacher_dept1 ) selected="" @endif>{{$department->faculty_name}} {{$department->dept_name}}</option>
                  @endforeach

            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">所属専攻（大学院）</td>
            <td><select name="teacher_dept2" id="teacher_dept2">
              <option value="">指定しない</option>
                  @foreach($departments as $key=>$department)
                  <option value="{{$department->dept_id}}" @if($department->dept_id==$teacher->teacher_dept2) selected="" @endif>{{$department->faculty_name}} {{$department->dept_name}}</option>
                  @endforeach
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">役職</td>
            <td><input type="radio" name="teacher_title" id="teacher_title" value="1" @if($teacher->teacher_title==1) checked="checked"@endif>
              <label for="radio">教授　　　
                <input type="radio" name="teacher_title" id="teacher_title" value="2" @if($teacher->teacher_title==2) checked="checked"@endif>
              准教授　　　
              <input type="radio" name="teacher_title" id="teacher_title" value="3" @if($teacher->teacher_title==3) checked="checked"@endif>
              講師　　　
              <input type="radio" name="teacher_title" id="teacher_title" value="4" @if($teacher->teacher_title==4) checked="checked"@endif>
              名誉教授　　　
              <input type="radio" name="teacher_title" id="teacher_title" value="0" @if($teacher->teacher_title==0) checked="checked"@endif>
              なし</label></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td>姓：
              <input type="text" name="teacher_name1f" id="teacher_name1f" value="{{ $teacher->teacher_name1f }}">
              　　　名：
              <input type="text" name="teacher_name1g" id="teacher_name1g" value="{{ $teacher->teacher_name1g }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（よみ）</td>
            <td>せい：
              <input type="text" name="teacher_name2f" id="teacher_name2f" value="{{ $teacher->teacher_name2f }}">
              　　　めい：
              <input type="text" name="teacher_name2g" id="teacher_name2g" value="{{ $teacher->teacher_name2g }}">
              <div  id="error-teacher-name">@if ($errors->first('teacher_name2f'))<span class="error-text"> {!! $errors->first('teacher_name2f') !!} </span>@endif @if ($errors->first('teacher_name2g'))<br><span class="error-text"> {!! $errors->first('teacher_name2g') !!}</span> @endif</div></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（ローマ字）</td>
            <td>Family name：
              <input type="text" name="teacher_name3f" id="teacher_name3f" value="{{ $teacher->teacher_name3f }}">
            　　　Given name：
               <input type="text" name="teacher_name3g" id="teacher_name3g" value="{{ $teacher->teacher_name3g }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">顔写真</td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tbody>
                <tr>
                  <td width="1%"><input type="radio" name="chkPhoto" id="chkPhoto" value="1" checked="checked"></td>
                  <td>登録されている画像をそのまま利用　→　@if(!empty($teacher->teacher_photo))<a href="{{ asset('') }}public/{{$teacher->teacher_photo}}" target="blank" >画像を参照</a>する 
                       <input type="hidden" name="teacher_photo" id="teacher_photo" value="{{ $teacher->teacher_photo }}"> @else 画像なし @endif</td>
                </tr>
                <tr>
                  <td width="1%"><input type="radio" name="chkPhoto" id="chkPhoto" value="2"></td>
                  <td>次の画像に差し替える：
                    <input type="file" name="upload_photo" id="upload_photo">
                    <input name="img-delete" type="button" id="img-delete" value="×">
                    <div class="error-text" id="error-teacher-photo" style="display: none">{{$error_photo}}</div></td>
                </tr>
                <tr>
                  <td width="1%"><input type="radio" name="chkPhoto" id="chkPhoto" value="3"></td>
                  <td>登録されている画像を削除する</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td width="25%" class="col3">リンク先URL</td>
            <td><input name="teacher_url" type="text" id="teacher_url" size="60" value="{{ $teacher->teacher_url }}">
                <div class="error-text" id="error-teacher-url" style="display: none">{{$error_url}}</div>
            </td>
          </tr>
          <tr>
            <td width="25%" class="col3">分野</td>
            <td><select name="teacher_research" id="teacher_research">
              <option value="">▼選択</option>
              @if($teacher->teacher_dept1 >0)
                @foreach($researches as $research) 
                  @if($research->dept_id == $teacher->teacher_dept1)
                    <option value="{{$research->research_id}}" @if($research->research_id==$teacher->teacher_research ) selected="" @endif>{{$research->research_name}}</option>
                  @endif                   
                @endforeach
              @endif
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位</td>
            <td><input type="text" name="teacher_degree" id="teacher_degree" value="{{ $teacher->teacher_degree }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位取得機関と年月</td>
            <td>取得機関：
              <input type="text" name="teacher_getplace" id="teacher_getplace" value="{{ $teacher->teacher_getplace }}">
              　　　
              <select name="teacher_getyear" id="teacher_getyear">
                <option value="">----年</option>
                @for ($i = START_YEAR; $i <= END_YEAR; $i++)
                <option value="{{$i}}" @if($i==$teacher->teacher_getyear ) selected="" @endif>{{$i}}</option>
                @endfor
              </select>
              <select name="teacher_getmonth" id="teacher_getmonth">
                <option value="">--月</option>
                @for ($i = 1; $i <= 12; $i++)
                <option value="{{$i}}" @if($i==$teacher->teacher_getmonth ) selected="" @endif>{{$i}}月</option>
                @endfor                   
              </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_1</td>
            <td><input type="text" name="teacher_keyword1" id="teacher_keyword1" value="{{ $teacher->teacher_keyword1 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_2</td>
            <td><input type="text" name="teacher_keyword2" id="teacher_keyword2" value="{{ $teacher->teacher_keyword2 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_3</td>
            <td><input type="text" name="teacher_keyword3" id="teacher_keyword3" value="{{ $teacher->teacher_keyword3 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_4</td>
            <td><input type="text" name="teacher_keyword4" id="teacher_keyword4" value="{{ $teacher->teacher_keyword4 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_5</td>
            <td><input type="text" name="teacher_keyword5" id="teacher_keyword5" value="{{ $teacher->teacher_keyword5 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_6</td>
            <td><input type="text" name="teacher_keyword6" id="teacher_keyword6" value="{{ $teacher->teacher_keyword6 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_7</td>
            <td><input type="text" name="teacher_keyword7" id="teacher_keyword7" value="{{ $teacher->teacher_keyword7 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_8</td>
            <td><input type="text" name="teacher_keyword8" id="teacher_keyword8" value="{{ $teacher->teacher_keyword8 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_9</td>
            <td><input type="text" name="teacher_keyword9" id="teacher_keyword9" value="{{ $teacher->teacher_keyword9 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_10</td>
            <td><input type="text" name="teacher_keyword10" id="teacher_keyword10" value="{{ $teacher->teacher_keyword10 }}"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td><input type="checkbox" name="teacher_dspl_flag" id="teacher_dspl_flag" value="1" @if($teacher->teacher_dspl_flag==1 ) checked="" @endif>              一般側画面には表示しない</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="button" value="確認画面へ" name="btsubmit" id="btsubmit"></td>
    </tr>
    <tr>
      <td align="center"><input type="reset" name="button" id="button" value="編集前の状態に戻す"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="history.back();" value="検索結果一覧画面へ戻る（編集内容は保存されません）"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
$("#img-delete").on("click",function() {
   $("#upload_photo").val("");
});
$("#upload_photo").on("change",function() {
  var extension = $('#upload_photo').val().split('.').pop().toLowerCase();
  if($.inArray(extension, ['gif','png','jpg','jpeg','bmp']) == -1) {      
      $("#error-teacher-photo").attr("style", "display:block");
      $("#upload_photo").val("");
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

function isZenKatakana(str){
  str = (str==null)?"":str;
  if(str.match(/^[ァ-ヶー　]*$/)){    //"ー"の後ろの文字は全角スペースです。
    return true;
  }else{
    return false;
  }
}
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