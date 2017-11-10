@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　学科/専攻の編集</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">選択中の学部/研究科名</td>
            <td>薬学部</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">学科/専攻の名称 <span class="f_caution">[*]</span></td>
            <td>{{$dept->dept_name}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td>
            	@if(empty($dept->dept_dspl_flag))
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
      <td align="center"><input type="button" onClick="location.href='{{route('backend.dept.save_delete',[$faculty_id, $dept->dept_id])}}'" value="削除する（確認済）">
      　　　　　
      <input type="button" onClick="location.href='{{route('backend.dept.index',$faculty_id)}}'" value="やめる"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='{{route('backend.dept.index',$faculty_id)}}'" value="登録済み学科/専攻の一覧へ"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection