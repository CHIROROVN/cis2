@extends('backend.layouts.app')
@section('content')
{!! Form::open(array('route' => 'backend.teacher.edit','id'=>'frmUpload', 'enctype'=>'multipart/form-data', 'accept-charset'=>'UTF-8')) !!} 
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
                  <option value="{{$department->dept_id}}" >{{$department->faculty_name}} {{$department->dept_name}}</option>
                  @endforeach

            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">所属専攻（大学院）</td>
            <td><select name="teacher_dept2" id="teacher_dept2">
              <option value="">指定しない</option>
                  @foreach($departments as $key=>$department)
                  <option value="{{$department->dept_id}}">{{$department->faculty_name}} {{$department->dept_name}}</option>
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
              <input type="radio" name="teacher_title" id="teacher_title" value="0">
              なし</label></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td>姓：
              <input type="text" name="teacher_name1f" id="teacher_name1f">
              　　　名：
              <input type="text" name="teacher_name1g" id="teacher_name1g"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（よみ）</td>
            <td>せい：
              <input type="text" name="teacher_name2f" id="teacher_name2f">
              　　　めい：
              <input type="text" name="teacher_name2g" id="teacher_name2g"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（ローマ字）</td>
            <td>Family name：
              <input type="text" name="teacher_name3f" id="teacher_name3f">
            　　　Given name：
               <input type="text" name="teacher_name3g" id="teacher_name3g"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">顔写真</td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tbody>
                <tr>
                  <td width="1%"><input type="radio" name="chkPhoto" id="chkPhoto" value="1"></td>
                  <td>登録されている画像をそのまま利用　→　<a href="view">画像を参照</a>する</td>
                </tr>
                <tr>
                  <td width="1%"><input type="radio" name="chkPhoto" id="chkPhoto" value="2"></td>
                  <td>次の画像に差し替える：
                    <input type="file" name="teacher_photo" id="teacher_photo">
                    <input name="img-delete" type="button" id="img-delete" value="×"></td>
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
            <td><input name="teacher_url" type="text" id="teacher_url" size="60"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">分野</td>
            <td><select name="teacher_research" id="teacher_research">
              <option value="">▼選択</option>
              @foreach($researches as $key=>$research) 
                     <option value="{{$key}}">{{$research}}</option>
                  @endforeach
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位</td>
            <td><input type="text" name="teacher_degree" id="teacher_degree"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位取得機関と年月</td>
            <td>取得機関：
              <input type="text" name="teacher_getplace" id="teacher_getplace">
              　　　
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
            <td><input type="text" name="teacher_keyword1" id="teacher_keyword1"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_2</td>
            <td><input type="text" name="teacher_keyword2" id="teacher_keyword2"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_3</td>
            <td><input type="text" name="teacher_keyword3" id="teacher_keyword3"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_4</td>
            <td><input type="text" name="teacher_keyword4" id="teacher_keyword4"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_5</td>
            <td><input type="text" name="teacher_keyword5" id="teacher_keyword5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_6</td>
            <td><input type="text" name="teacher_keyword6" id="teacher_keyword6"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_7</td>
            <td><input type="text" name="teacher_keyword7" id="teacher_keyword7"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_8</td>
            <td><input type="text" name="teacher_keyword8" id="teacher_keyword8"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_9</td>
            <td><input type="text" name="teacher_keyword9" id="teacher_keyword9"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_10</td>
            <td><input type="text" name="teacher_keyword10" id="teacher_keyword10"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td><input type="checkbox" name="teacher_dspl_flag" id="teacher_dspl_flag" value="1">              一般側画面には表示しない</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='teacher_change_check.html'" value="確認画面へ"></td>
    </tr>
    <tr>
      <td align="center"><input type="reset" name="button" id="button" value="編集前の状態に戻す"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='teacher_list.html'" value="検索結果一覧画面へ戻る（編集内容は保存されません）"></td>
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
</script>  
{!! Form::close() !!} 
@endsection