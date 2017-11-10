@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　学部/研究科の削除</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">学部/研究科の名称 <span class="f_caution">[*]</span></td>
            <td>{{$faculty->faculty_name}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td>
                @if(empty($faculty->faculty_dspl_flag))
                <span class="f_blue">表示する</span>
                @else
                <span class="f_red">一般側画面には表示しない</span>
                @endif
            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='{{route('backend.faculty.save_delete', $faculty->faculty_id)}}'" value="削除する（確認済）">
      　　　　　
      <input type="button" onClick="window.history.go(-1); return false;" value="やめる"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='{{route('backend.faculty.index')}}'" value="登録済み学部/研究科の一覧へ"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection