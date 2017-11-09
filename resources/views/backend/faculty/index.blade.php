@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　登録済み学部/研究科の一覧</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><input type="button" onClick="location.href='faculty_regist.html'" value="学部の新規登録"></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr class="col3">
            <td width="1%" align="center">削除</td>
            <td width="8%" align="center">表示</td>
            <td align="center">学部/研究科名</td>
            <td width="1%" align="center">配下の学科/専攻を管理</td>
            <td width="1%" align="center">配下の研究分野を管理</td>
            <td width="1%" align="center">編集</td>
            <td colspan="4" align="center">表示順序</td>
            </tr>
          <tr>
            <td><input type="button" onClick="location.href='faculty_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_blue">○</span></td>
            <td>薬学部</td>
            <td><input type="button" onClick="location.href='department_list.html'" value="配下の「学科/専攻」管理"></td>
            <td><input type="button" onClick="location.href='research_list.html'" value="配下の「研究分野」管理"></td>
            <td><input type="button" onClick="location.href='faculty_edit.html'" value="編集"></td>
            <td width="1%">&nbsp;</td>
            <td width="1%">&nbsp;</td>
            <td width="1%"><input type="button" name="button8" id="button8" value="↓"></td>
            <td width="1%"><input type="button" name="button9" id="button9" value="LAST"></td>
          </tr>
          <tr>
            <td><input type="button" onClick="location.href='faculty_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_red">×</span></td>
            <td>薬学部</td>
            <td><input type="button" onClick="location.href='department_list.html'" value="配下の「学科/専攻」管理"></td>
            <td><input type="button" onClick="location.href='research_list.html'" value="配下の「研究分野」管理"></td>
            <td><input type="button" onClick="location.href='faculty_edit.html'" value="編集"></td>
            <td><input type="button" name="button6" id="button6" value="TOP"></td>
            <td><input type="button" name="button7" id="button7" value="↑"></td>
            <td><input type="button" name="button8" id="button8" value="↓"></td>
            <td><input type="button" name="button9" id="button9" value="LAST"></td>
            </tr>
          <tr>
            <td><input type="button" onClick="location.href='faculty_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_blue">○</span></td>
            <td>薬学部</td>
            <td><input type="button" onClick="location.href='department_list.html'" value="配下の「学科/専攻」管理"></td>
            <td><input type="button" onClick="location.href='research_list.html'" value="配下の「研究分野」管理"></td>
            <td><input type="button" onClick="location.href='faculty_edit.html'" value="編集"></td>
            <td><input type="button" name="button6" id="button6" value="TOP"></td>
            <td><input type="button" name="button7" id="button7" value="↑"></td>
            <td><input type="button" name="button8" id="button8" value="↓"></td>
            <td><input type="button" name="button9" id="button9" value="LAST"></td>
            </tr>
          <tr>
            <td><input type="button" onClick="location.href='faculty_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_blue">○</span></td>
            <td>薬学部</td>
            <td><input type="button" onClick="location.href='department_list.html'" value="配下の「学科/専攻」管理"></td>
            <td><input type="button" onClick="location.href='research_list.html'" value="配下の「研究分野」管理"></td>
            <td><input type="button" onClick="location.href='faculty_edit.html'" value="編集"></td>
            <td><input type="button" name="button6" id="button6" value="TOP"></td>
            <td><input type="button" name="button7" id="button7" value="↑"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection