@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　 登録済み教員の詳細</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">所属学科（学部）</td>
            <td>{{$teacher->dept_name}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">所属専攻（大学院）</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">役職</td>
            <td><label for="radio">教授</label></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td>{{$teacher->teacher_name1f}}　{{$teacher->teacher_name1g}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（よみ）</td>
            <td>{{$teacher->teacher_name2f}}　{{$teacher->teacher_name2g}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（ローマ字）</td>
            <td>{{$teacher->teacher_name3f}}　{{$teacher->teacher_name2g}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">顔写真</td>
            <td>@if(!empty($teacher->teacher_photo))<img src="{{ asset('') }}public/{{$teacher->teacher_photo}}" width="120" height="180"> @else 画像なし @endif</td>
          </tr>
          <tr>
            <td width="25%" class="col3">リンク先URL</td>
            <td>{{$teacher->teacher_url}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">分野</td>
            <td>{{$teacher->research_name}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位</td>
            <td>{{$teacher->teacher_degree}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位取得機関と年月</td>
            <td>{{$teacher->teacher_getplace}}　（{{$teacher->teacher_getyear}}年{{$teacher->teacher_getmonth}}月）</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_1</td>
            <td>{{$teacher->teacher_keyword1}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_2</td>
            <td>{{$teacher->teacher_keyword2}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_3</td>
            <td>{{$teacher->teacher_keyword3}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_4</td>
            <td>{{$teacher->teacher_keyword4}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_5</td>
            <td>{{$teacher->teacher_keyword5}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
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
            <td><input type="radio" name="radio" id="radio" value="radio">
              <label for="radio">教授　　　
                <input type="radio" name="radio2" id="radio2" value="radio2">
              准教授　　　
              <input type="radio" name="radio3" id="radio3" value="radio3">
              講師　　　
              <input type="radio" name="radio4" id="radio4" value="radio4">
              名誉教授　　　
              <input type="radio" name="radio5" id="radio5" value="radio5">
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
              <option>▼選択</option>
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
                <option>----年</option>
                <option>1937年</option>
                <option>1938年</option>
                <option>1939年</option>
                <option>1940年</option>
                <option>1941年</option>
                <option>1942年</option>
                <option>1943年</option>
                <option>1944年</option>
                <option>1945年</option>
                <option>1946年</option>
                <option>1947年</option>
                <option>1948年</option>
                <option>1949年</option>
                <option>1950年</option>
                <option>1951年</option>
                <option>1952年</option>
                <option>1953年</option>
                <option>1954年</option>
                <option>1955年</option>
                <option>1956年</option>
                <option>1957年</option>
                <option>1958年</option>
                <option>1959年</option>
                <option>1960年</option>
                <option>1961年</option>
                <option>1962年</option>
                <option>1963年</option>
                <option>1964年</option>
                <option>1965年</option>
                <option>1966年</option>
                <option>1967年</option>
                <option>1968年</option>
                <option>1969年</option>
                <option>1970年</option>
                <option>1971年</option>
                <option>1972年</option>
                <option>1973年</option>
                <option>1974年</option>
                <option>1975年</option>
                <option>1976年</option>
                <option>1977年</option>
                <option>1978年</option>
                <option>1979年</option>
                <option>1980年</option>
                <option>1981年</option>
                <option>1982年</option>
                <option>1983年</option>
                <option>1984年</option>
                <option>1985年</option>
                <option>1986年</option>
                <option>1987年</option>
                <option>1988年</option>
                <option>1989年</option>
                <option>1990年</option>
                <option>1991年</option>
                <option>1992年</option>
                <option>1993年</option>
                <option>1994年</option>
                <option>1995年</option>
                <option>1996年</option>
                <option>1997年</option>
                <option>1998年</option>
                <option>1999年</option>
                <option>2000年</option>
                <option>2001年</option>
                <option>2002年</option>
                <option>2003年</option>
                <option>2004年</option>
                <option>2005年</option>
                <option>2006年</option>
                <option>2007年</option>
                <option>2008年</option>
                <option>2009年</option>
                <option>2010年</option>
                <option>2011年</option>
                <option>2012年</option>
                <option>2013年</option>
                <option>2014年</option>
                <option>2015年</option>
                <option>2016年</option>
                <option>2017年</option>
              </select>
              <select name="select4" id="select4">
                <option>--月</option>
                <option>1月</option>
                <option>2月</option>
                <option>3月</option>
                <option>4月</option>
                <option>5月</option>
                <option>6月</option>
                <option>7月</option>
                <option>8月</option>
                <option>9月</option>
                <option>10月</option>
                <option>11月</option>
                <option>12月</option>
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
</table>6</td>
            <td>{{$teacher->teacher_keyword6}}</td><table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
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
            <td><input type="radio" name="radio" id="radio" value="radio">
              <label for="radio">教授　　　
                <input type="radio" name="radio2" id="radio2" value="radio2">
              准教授　　　
              <input type="radio" name="radio3" id="radio3" value="radio3">
              講師　　　
              <input type="radio" name="radio4" id="radio4" value="radio4">
              名誉教授　　　
              <input type="radio" name="radio5" id="radio5" value="radio5">
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
              <option>▼選択</option>
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
                <option>----年</option>
                <option>1937年</option>
                <option>1938年</option>
                <option>1939年</option>
                <option>1940年</option>
                <option>1941年</option>
                <option>1942年</option>
                <option>1943年</option>
                <option>1944年</option>
                <option>1945年</option>
                <option>1946年</option>
                <option>1947年</option>
                <option>1948年</option>
                <option>1949年</option>
                <option>1950年</option>
                <option>1951年</option>
                <option>1952年</option>
                <option>1953年</option>
                <option>1954年</option>
                <option>1955年</option>
                <option>1956年</option>
                <option>1957年</option>
                <option>1958年</option>
                <option>1959年</option>
                <option>1960年</option>
                <option>1961年</option>
                <option>1962年</option>
                <option>1963年</option>
                <option>1964年</option>
                <option>1965年</option>
                <option>1966年</option>
                <option>1967年</option>
                <option>1968年</option>
                <option>1969年</option>
                <option>1970年</option>
                <option>1971年</option>
                <option>1972年</option>
                <option>1973年</option>
                <option>1974年</option>
                <option>1975年</option>
                <option>1976年</option>
                <option>1977年</option>
                <option>1978年</option>
                <option>1979年</option>
                <option>1980年</option>
                <option>1981年</option>
                <option>1982年</option>
                <option>1983年</option>
                <option>1984年</option>
                <option>1985年</option>
                <option>1986年</option>
                <option>1987年</option>
                <option>1988年</option>
                <option>1989年</option>
                <option>1990年</option>
                <option>1991年</option>
                <option>1992年</option>
                <option>1993年</option>
                <option>1994年</option>
                <option>1995年</option>
                <option>1996年</option>
                <option>1997年</option>
                <option>1998年</option>
                <option>1999年</option>
                <option>2000年</option>
                <option>2001年</option>
                <option>2002年</option>
                <option>2003年</option>
                <option>2004年</option>
                <option>2005年</option>
                <option>2006年</option>
                <option>2007年</option>
                <option>2008年</option>
                <option>2009年</option>
                <option>2010年</option>
                <option>2011年</option>
                <option>2012年</option>
                <option>2013年</option>
                <option>2014年</option>
                <option>2015年</option>
                <option>2016年</option>
                <option>2017年</option>
              </select>
              <select name="select4" id="select4">
                <option>--月</option>
                <option>1月</option>
                <option>2月</option>
                <option>3月</option>
                <option>4月</option>
                <option>5月</option>
                <option>6月</option>
                <option>7月</option>
                <option>8月</option>
                <option>9月</option>
                <option>10月</option>
                <option>11月</option>
                <option>12月</option>
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