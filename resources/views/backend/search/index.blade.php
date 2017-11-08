@extends('backend.layouts.app')
@section('content')
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
      <td align="right"><input type="button" onClick="location.href='teacher_regist.html'" value="新規登録"></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">学部・所属</td>
            <td><select name="select" id="select">
              <option>指定しない</option>
            </select></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td><input type="text" name="textfield3" id="textfield3">
              を含む　※漢字または読み仮名（ひらがな）</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='teacher_list.html'" value="検索開始">
        　　　　　
        <input type="reset" name="reset" value="リセット"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection