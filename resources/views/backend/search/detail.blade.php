@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　 登録済み教員の詳細</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">所属学科（学部）</td>
            <td>薬学部　薬学科</td>
          </tr>
          <tr>
            <td width="25%" class="col3">所属専攻（大学院）</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">役職</td>
            <td><label for="radio">教授</label></td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名</td>
            <td>山田　太郎</td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（よみ）</td>
            <td>やまだ　たろう</td>
          </tr>
          <tr>
            <td width="25%" class="col3">氏名（ローマ字）</td>
            <td>Yamada Taro</td>
          </tr>
          <tr>
            <td width="25%" class="col3">顔写真</td>
            <td><img src="hoge.jpg" width="120" height="180"><!-- IF NO IMAGE -->画像なし<!-- /IF --></td>
          </tr>
          <tr>
            <td width="25%" class="col3">リンク先URL</td>
            <td>http://hoge.com/hoge/hoge/hoge.html</td>
          </tr>
          <tr>
            <td width="25%" class="col3">分野</td>
            <td>物理薬学系</td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位</td>
            <td>理学博士</td>
          </tr>
          <tr>
            <td width="25%" class="col3">学位取得機関と年月</td>
            <td>東京大学　（2017年3月）</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_1</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_2</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_3</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_4</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_5</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_6</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_7</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_8</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_9</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">専門分野キーワード_10</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="25%" class="col3">表示／非表示</td>
            <td><!-- IF SHOW --><span class="f_blue">表示する</span><!-- ELSE--><span class="f_red">一般側画面には表示しない</span><!-- /IF --></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='teacher_change.html'" value="変更する">
        　　　　　
      <input type="button" onClick="location.href='teacher_delete_check.html'" value="削除する"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="button" onClick="location.href='teacher_list.html'" value="一覧へ戻る"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
@endsection