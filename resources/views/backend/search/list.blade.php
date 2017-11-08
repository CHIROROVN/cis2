@extends('backend.layouts.app')
@section('content')
 <table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　登録済み教員の検索結果（一覧）</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>検索の結果、25件が該当しました。うち、1～20件を表示しています。</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr class="col3">
            <td width="1%" align="center">削除</td>
            <td width="8%" align="center">表示</td>
            <td align="center">所属</td>
            <td align="center">氏名</td>
            <td align="center">最終更新日</td>
            <td width="1%" align="center">詳細・変更</td>
          </tr>
          <tr>
            <td><input type="button" onClick="location.href='teacher_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_blue">○</span></td>
            <td>薬学科</td>
            <td>木島　孝夫</td>
            <td>2017/10/31 12:34:56</td>
            <td><input type="button" onClick="location.href='teacher_detail.html'" value="詳細・変更"></td>
          </tr>
          <tr>
            <td><input type="button" onClick="location.href='teacher_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_blue">○</span></td>
            <td>薬学科</td>
            <td>木島　孝夫</td>
            <td>2017/10/31 12:34:56</td>
            <td><input type="button" onClick="location.href='teacher_detail.html'" value="詳細・変更"></td>
          </tr>
          <tr>
            <td><input type="button" onClick="location.href='teacher_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_blue">○</span></td>
            <td>薬学科</td>
            <td>木島　孝夫</td>
            <td>2017/10/31 12:34:56</td>
            <td><input type="button" onClick="location.href='teacher_detail.html'" value="詳細・変更"></td>
          </tr>
          <tr>
            <td><input type="button" onClick="location.href='teacher_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_red">×</span></td>
            <td>薬学科</td>
            <td>木島　孝夫</td>
            <td>2017/10/31 12:34:56</td>
            <td><input type="button" onClick="location.href='teacher_detail.html'" value="詳細・変更"></td>
          </tr>
          <tr>
            <td><input type="button" onClick="location.href='teacher_delete_check.html'" value="削除"></td>
            <td align="center"><span class="f_blue">○</span></td>
            <td>薬学科</td>
            <td>木島　孝夫</td>
            <td>2017/10/31 12:34:56</td>
            <td><input type="button" onClick="location.href='teacher_detail.html'" value="詳細・変更"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input name="button11" type="button" disabled id="button11" value="前の20件を表示">
      　　　　　
      <input type="button" name="button12" id="button12" value="次の20件を表示"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='teacher_search.html'" value="条件を変えて再検索"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection