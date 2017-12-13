@extends('backend.layouts.app')
@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　研究分野の削除</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">選択中の学部/研究科名</td>
            <td>{{$faculty_name}}</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">研究分野の名称 <span class="f_caution">[*]</span></td>
            <td>{{$research->research_name}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td>
            	@if(empty($research->research_dspl_flag))
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
      <td align="center"><input type="button" onClick="location.href='{{route('backend.research.save_delete',[$faculty_id, $research->research_id])}}'" value="削除する（確認済）">
      　　　　　
      <input type="button" onClick="location.href='{{route('backend.research.index', $faculty_id)}}'" value="やめる"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='{{route('backend.research.index', $faculty_id)}}'" value="登録済み研究分野の一覧へ"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

@endsection