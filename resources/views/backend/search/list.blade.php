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
          @if(empty($teachers) || count($teachers) < 1)
          <tr><td colspan="6"><strong style="color: #777;">該当するデータがありません。</strong></td></tr>
          @else
          @foreach($teachers as $teacher) 
          <tr>
            <td><input type="button" onClick="location.href='{{route('backend.teacher.delete',$teacher->teacher_id)}}'" value="削除"></td>
            <td align="center">@if($teacher->teacher_dspl_flag==1)<span class="f_red">×</span> @else <span class="f_blue">○</span>@endif</td>
            <td>{{$teacher->dept_name}}</td>
            <td>{{$teacher->teacher_name1f}}　{{$teacher->teacher_name1g}}</td>
            <td>{{$teacher->last_date}}</td>
            <td><input type="button" value="詳細・変更" onclick="location.href='{{route('backend.search.detail',$teacher->teacher_id)}}'"></td>
          </tr>
          @endforeach  
          @endif  
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center">
        @if ($teachers->lastPage() > 1)
            <ul class="pagination">
                <li class="{{ ($teachers->currentPage() == 1) ? ' disabled' : '' }}">
                    <input name="button11" type="button" disabled id="button11" value="前の{{LIMIT_PAGE}}件を表示" onclick="location.href='{{route('backend.search.teacher')}}?page={{ $teachers->currentPage()-1 }}&teacher_dept={{$teacher_dept}}&txtKeyword={{$txtKeyword}}'">                    
                </li>                
                <li class="{{ ($teachers->currentPage() == $teachers->lastPage()) ? ' disabled' : '' }}">                    
                    <input type="button" name="button12" id="button12" value="次の{{LIMIT_PAGE}}件を表示" onclick="location.href='{{route('backend.search.teacher')}}?page={{ $teachers->currentPage()+1 }}&teacher_dept={{$teacher_dept}}&txtKeyword={{$txtKeyword}}'">
                </li>
            </ul>

            @endif
      </td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="{{route('backend.search.index')}}?teacher_dept={{$teacher_dept}}&txtKeyword={{$txtKeyword}}" value="条件を変えて再検索"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection