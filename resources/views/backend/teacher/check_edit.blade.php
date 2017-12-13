@extends('backend.layouts.app')
@section('content')
{!! Form::open(array('route' => ['backend.teacher.save',$teacher['teacher_id']],'id'=>'frmEdit', 'enctype'=>'multipart/form-data', 'accept-charset'=>'UTF-8')) !!} 
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　 教員の新規登録（確認）</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>以下の内容で登録しますが、よろしいですか？</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">所属学科（学部）</td>
            <td>{{$teacher['dept_name1']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">所属専攻（大学院）</td>
            <td>{{$teacher['dept_name2']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">役職</td>
            <td>@if(isset($teacher['teacher_title'])){{getTeacherTitle($teacher['teacher_title'])}}@else{{getTeacherTitle(0)}}@endif</td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td>{{$teacher['teacher_name1f']}}　{{$teacher['teacher_name1g']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（よみ）</td>
            <td>{{$teacher['teacher_name2f']}}　{{$teacher['teacher_name2g']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（ローマ字）</td>
            <td>{{$teacher['teacher_name3f']}}　{{$teacher['teacher_name3g']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">顔写真</td>
            <td>@if(!empty($teacher['teacher_photo']))<img src="{{ asset('') }}public/{{$teacher['teacher_photo']}}" width="85px" height="113px"> @else 画像なし@endif</td>
          </tr>
          <tr>
            <td width="25%" class="col3">リンク先URL</td>
            <td>{{$teacher['teacher_url']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">分野</td>
            <td>{{$teacher['research_name']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位</td>
            <td>{{$teacher['teacher_degree']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位取得機関と年月</td>
            <td>{{$teacher['teacher_getplace']}}　（{{$teacher['teacher_getyear']}}年{{$teacher['teacher_getmonth']}}月）</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_1</td>
            <td>{{$teacher['teacher_keyword1']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_2</td>
            <td>{{$teacher['teacher_keyword2']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_3</td>
            <td>{{$teacher['teacher_keyword3']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_4</td>
            <td>{{$teacher['teacher_keyword4']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_5</td>
            <td>{{$teacher['teacher_keyword5']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_6</td>
            <td>{{$teacher['teacher_keyword6']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_7</td>
            <td>{{$teacher['teacher_keyword7']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_8</td>
            <td>{{$teacher['teacher_keyword8']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_9</td>
            <td>{{$teacher['teacher_keyword9']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_10</td>
            <td>{{$teacher['teacher_keyword10']}}</td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td>@if(isset($teacher['teacher_dspl_flag']))<span class="f_red">一般側画面には表示しない</span>@else <span class="f_blue">表示する</span> @endif</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="submit"  value="登録する（確認済）">
        　　　　　
      <input type="button" onClick="location.href='{{route('backend.search.detail', $teacher['teacher_id'])}}'" value="戻って修正する"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
{!! Form::close() !!} 
@endsection