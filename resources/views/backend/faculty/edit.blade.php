@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　学部/研究科の変更</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
     {!! Form::open(array('route' => ['backend.faculty.edit', $faculty_id], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">学部/研究科の名称 <span class="f_caution">[*]</span></td>
            <td><input name="faculty_name" type="text" id="faculty_name" size="30" value="@if(old('faculty_name')){{old('faculty_name')}}@else{{$faculty->faculty_name}}@endif">
              @if ($errors->first('faculty_name'))
                <div class="error-text"> {{$errors->first('faculty_name')}}</div>
              @endif
            </td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td><input type="checkbox" name="faculty_dspl_flag" id="faculty_dspl_flag" value="1" @if(old('faculty_dspl_flag') == 1 || $faculty->faculty_dspl_flag == 1) checked @endif >一時的に一般画面に表示しない</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" value="変更する">      　　　　　
        <input type="reset" name="btn-reset" id="btn-reset" value="クリア"></td>
    </tr>
    {!! Form::close() !!}
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