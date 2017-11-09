<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>CIS教員検索システム | 管理画面</title>
<link href="{{ asset('') }}public/backend/css/style.css" rel="stylesheet" />
<script src="{{ asset('') }}public/backend/js/jquery-1.11.3.min.js"></script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tbody>
    <tr>
      <td width="50%"><input type="button" onClick="location.href='{{route('backend.menu.index')}}'" value="管理者メニューへ"></td>
      <td width="50%" align="right"><input type="button" onClick="location.href='{{route('backend.users.logout')}}'" value="ログアウト"></td>
    </tr>
  </tbody>
</table>
<hr noshade>

  <!-- Content -->
    @yield('content')
  <!-- /Content -->

</body>
</html>
