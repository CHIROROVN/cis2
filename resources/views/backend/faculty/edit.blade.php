@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　学部/研究科の新規登録</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">学部/研究科の名称 <span class="f_caution">[*]</span></td>
            <td><input name="textfield" type="text" id="textfield" size="30"></td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td><input type="checkbox" name="checkbox" id="checkbox">一時的に一般画面に表示しない</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='faculty_list.html'" value="登録する">
      　　　　　
        <input type="reset" name="button2" id="button2" value="クリア"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='faculty_list.html'" value="登録済み学部/研究科の一覧へ"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection