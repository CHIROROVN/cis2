@extends('frontend.layouts.app')

@section('content')
<style type="text/css">
  .td_color{
        background-color: #d0eeee;
        height: 30px; width: 25%; font-weight: bold; border-bottom: solid 1px #ffffff; 
  }
  .button{
    background-color: #13a9a9;color: #fff;width: 100px;height: 30px;
  }
</style>
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
            <td style="border-bottom: solid 1px #bbe7e7;">
                <select name="teacher_dept" id="teacher_dept">
                  <option>指定しない</option>
                </select>
            </td>
          </tr>
          <tr>
            <td class="td_color">研究分野</td>
            <td ><select name="teacher_research" id="teacher_research">
                  <option>指定しない</option>
                </select></td>
          </tr>
          <tr>
            <td class="td_color">キーワード</td>
            <td style="border-top: solid 1px #bbe7e7;"><input type="text" name="txtKeyword" id="txtKeyword"></td>
          </tr>   
          <tr>
            <td colspan="2" align="left"><br><button type="submit" class="button">検索する</button></td>   　　　　　        
           </tr>       
        </tbody>
      </table>
      {!! Form::close() !!}
  </div>
</div> 
@endsection