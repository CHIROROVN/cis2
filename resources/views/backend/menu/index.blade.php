@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　管理者メニュー</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="col3"><strong>▼教員情報の管理</strong></td>
    </tr>
    <tr>
      <td>　・<a href="teacher_search.html">登録済み教員の検索／一覧／新規登録／変更／削除</a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="col3"><strong>▼マスタの管理</strong></td>
    </tr>
    <tr>
      <td>　・<a href="{{route('backend.faculty.index')}}">学部・学科・研究分野の登録／変更／削除</a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection