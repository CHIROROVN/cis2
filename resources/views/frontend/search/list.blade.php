@extends('frontend.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('') }}public/css/style.css" type="text/css" media="screen,print">
<div id="pnav">
  <ul>
    <li><a href="http://www.cis.ac.jp/index.html">千葉科学大学ホーム</a></li>          
    <li>教員検索</li>
  </ul>
</div>
<div id="main-full">
  <header class="article-header"><h1>教員検索</h1></header> 
  <div style="position: relative;margin: 0 29px 25px;padding: 0 8px 7px;">所属、研究分野、キーワードから教員検索ができます。</div>
  <div style="position: relative;margin: 0 29px 25px;padding: 0 8px 7px;">
     {!! Form::open(array('url' => 'hoge/teacher-db/search','id'=>'frmSearch', 'method' => 'post')) !!} 
     <table width="500px" border="1" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td class="td_color">学部・所属</td>
            <td class="td_border_botton">
                <select name="teacher_dept" id="teacher_dept">
                  <option>指定しない</option>
                </select>
            </td>
          </tr>
          <tr>
            <td class="td_color">研究分野</td>
            <td class="td_border_botton"><select name="teacher_research" id="teacher_research">
                  <option>指定しない</option>
                </select></td>
          </tr>
          <tr>
            <td class="td_color">キーワード</td>
            <td ><input type="text" name="txtKeyword" id="txtKeyword"></td>
          </tr>   
          <tr>
            <td colspan="2" align="left"><br><button type="submit" class="button">検索する</button></td>   　　　　　        
           </tr>       
        </tbody>
      </table>
      {!! Form::close() !!}
  </div>
  <header class="article-header"><h1>検索結果</h1></header>
  <div style="position: relative;margin: 0 29px 25px;padding: 0 8px 7px;">
    <table width="100%" border="0" cellpadding="2" cellspacing="2">
      <tr><td width="150px"><img src="{{ asset('') }}public/common/img/teacher_01.jpg"></td>
          <td><div  class="teacher_row">
               <div class="teacher_title">武田　光志 (たけだ　みつし）　／　Mitsushi Takeda</div>
               <table id="teacher_detail">
                 <tr><td width="100px">所属</td>
                     <td>薬学部　薬学科<br>大学院　薬学研究科　薬学専攻　博士課程</td>
                  </tr>
                  <tr><td >学位</td>
                     <td>薬学部　薬学科　教授</td>
                  </tr>
                  <tr><td >専門分野</td>
                     <td>薬学部　薬学科　教授</td>
                  </tr>   
               </table>
             </div>
          </td>
      </tr>
      <tr><td width="150px"><img src="{{ asset('') }}public/common/img/teacher_02.jpg"></td>
          <td><div  class="teacher_row">
               <div class="teacher_title">宮﨑　工 (みやざき　たくみ）　／　Takumi Miyazaki</div>
               <table id="teacher_detail">
                 <tr><td width="100px">所属</td>
                     <td>薬学部　薬学科　教授</td>
                  </tr>
                  <tr><td >学位</td>
                     <td>博士（医薬学）　（千葉大学　2009年3月）</td>
                  </tr>
                  <tr><td >専門分野</td>
                     <td>臨床薬学、コミュニケーション</td>
                  </tr>   
               </table>
             </div>
          </td>
      </tr>
      <tr><td width="150px"><img src="{{ asset('') }}public/common/img/teacher_03.jpg"></td>
          <td><div  class="teacher_row">
               <div class="teacher_title">横濱　明 (よこはま　あきら）　／　Akira Yokohama</div>
               <table id="teacher_detail">
                 <tr><td width="100px">所属</td>
                     <td>薬学部　薬学科</td>
                  </tr>
                  <tr><td >学位</td>
                     <td></td>
                  </tr>
                  <tr><td >専門分野</td>
                     <td>臨床薬学、コミュニケーション</td>
                  </tr>   
               </table>
             </div>
          </td>
      </tr>
    </table>  
  </div> 
</div> 
@endsection