<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CIS教員検索システム | 管理画面</title>
<link href="{{ asset('') }}public/backend/css/style.css" rel="stylesheet" />
</head>

<body>
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　管理者ログイン</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    @if($message = Session::get('danger'))
    <tr>
      <td>
        <div id="error" class="message">
            <a id="close" title="Message"  href="#" onClick="document.getElementById('error').setAttribute('style','display: none;');">&times;</a>
            <span>{{$message}}</span>
        </div>
        </td>
    </tr>
    @elseif($message = Session::get('success'))
    <tr>
      <td>
        <div id="success" class="message">
            <a id="close" title="Message"  href="javascript::void(0);" onClick="document.getElementById('success').setAttribute('style','display: none;');">&times;</a>
            <span>{{$message}}</span>
        </div>
        </td>
    </tr>
    @endif

    {!! Form::open(array('route' => ['backend.users.login'], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')) !!}
    <tr>
      <td align="center">
      	<table width="60%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="40%" class="col3">ログインID</td>
            <td><input type="text" name="u_login" id="u_login">
            @if ($errors->first('u_login'))
            <div class="error-text">{{$errors->first('u_login')}}</div>
            @endif
            </td>
          </tr>
          <tr>
            <td width="40%" class="col3">パスワード</td>
            <td><input type="password" name="u_passwd" id="u_passwd">
            @if ($errors->first('u_passwd'))
            <div class="error-text">{{$errors->first('u_passwd')}}</div>
            @endif
            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" value="ログイン">
      　　　　　
      <input type="reset" name="reset" id="reset" value="クリア"></td>
    </tr>
    {!! Form::close() !!}
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>
