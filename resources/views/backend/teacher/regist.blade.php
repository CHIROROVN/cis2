@extends('backend.layouts.app')
@section('content')
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
            <td><select name="select" id="select">
              <option>薬学部　薬学科</option>
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">所属専攻（大学院）</td>
            <td><select name="select5" id="select5">
              <option>薬学研究科　薬学専攻</option>
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">役職</td>
            <td><input type="radio" name="teacher_title" id="radio" value="1">
              <label for="radio">教授　　　
                <input type="radio" name="teacher_title" id="radio2" value="2">
              准教授　　　
              <input type="radio" name="teacher_title" id="radio3" value="3">
              講師　　　
              <input type="radio" name="teacher_title" id="radio4" value="4">
              名誉教授　　　
              <input type="radio" name="teacher_title" id="teacher_title" value="0">
              なし</label></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td>姓：
              <input type="text" name="textfield" id="textfield">
              　　　名：
              <input type="text" name="textfield2" id="textfield2"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（よみ）</td>
            <td>せい：
              <input type="text" name="textfield3" id="textfield3">
              　　　めい：
              <input type="text" name="textfield4" id="textfield4"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（ローマ字）</td>
            <td>Family name：
              <input type="text" name="textfield9" id="textfield9">
            　　　Given name：
               <input type="text" name="textfield9" id="textfield10"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">顔写真</td>
            <td><input type="file" name="textfield10" id="textfield11">
              <input name="img-delete" type="button" id="img-delete" value="×"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">リンク先URL</td>
            <td><input name="textfield11" type="text" id="textfield12" size="60"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">分野</td>
            <td><select name="select2" id="select2">
              <option value="">▼選択</option>
              @foreach($researches as $key=>$research) 
                     <option value="{{$key}}">{{$research}}</option>
                  @endforeach
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位</td>
            <td><input type="text" name="textfield6" id="textfield6"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位取得機関と年月</td>
            <td>取得機関：
              <input type="text" name="textfield7" id="textfield7">
              　　　
              <select name="select3" id="select3">
                <option value="">----年</option>
                @for ($i = START_YEAR; $i <= END_YEAR; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
              <select name="select4" id="select4">
                <option value="">--月</option>
                @for ($i = 1; $i <= 12; $i++)
                <option value="{{$i}}">{{$i}}月</option>
                @endfor                   
              </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_1</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_2</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_3</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_4</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_5</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_6</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_7</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_8</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_9</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_10</td>
            <td><input type="text" name="textfield5" id="textfield5"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td><input type="checkbox" name="checkbox" id="checkbox">              一般側画面には表示しない</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='teacher_regist_check.html'" value="確認画面へ">
        　　　　　
      <input type="reset" name="button14" id="button14" value="クリア"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='teacher_search.html'" value="検索画面へ戻る（入力内容は保存されません）"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection