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
            <td  class="td_color">学部・所属</td>
            <td class="td_border_botton">
                <select name="teacher_dept" id="teacher_dept">
                  <option value="">指定しない</option>
                  @foreach($departments as $key=>$department)
                  <option value="{{$department->dept_id}}">{{$department->faculty_name}} {{$department->dept_name}}</option>
                  @endforeach
                </select>
            </td>
          </tr>
          <tr>
            <td  class="td_color">研究分野</td>
            <td ><select name="teacher_research" id="teacher_research">
                  <option value="">指定しない</option>
                  @foreach($researches as $key=>$research) 
                     <option value="{{$key}}">{{$research}}</option>
                  @endforeach
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