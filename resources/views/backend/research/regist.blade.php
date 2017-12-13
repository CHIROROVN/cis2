@extends('backend.layouts.app')
@section('content')

<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　研究分野の新規登録</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    {!! Form::open(array('route' => ['backend.research.regist', $faculty_id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">選択中の学部/研究科名</td>
            <td>{{$faculty_name}}　　　
              <input type="button" onClick="location.href='{{route('backend.faculty.index')}}'" value="学部/研究科を変更する"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">研究分野の名称 <span class="f_caution">[*]</span></td>
            <td><input name="research_name" type="text" id="research_name" size="30" value="{{old('research_name')}}">
                @if ($errors->first('research_name'))
                  <div class="error-text"> {{$errors->first('research_name')}}</div>
                @endif
              </td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td><input type="checkbox" name="research_dspl_flag" id="research_dspl_flag" value="1" @if(old('research_dspl_flag') == 1) checked @endif >一時的に一般画面に表示しない</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" value="登録する">
      　　　　　
        <input type="reset" name="btn-reset" id="btn-reset" value="クリア"></td>
    </tr>
    {!! Form::close() !!}
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='{{route('backend.research.index',$faculty_id)}}'" value="登録済み研究分野の一覧へ"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

@endsection