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
     {!! Form::open(array('route' => 'frontend.search.teacher','id'=>'frmSearch', 'method' => 'get')) !!} 
     <table width="500px" border="1" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td class="td_color">学部・所属</td>
            <td class="td_border_botton">
                <select name="teacher_dept" id="teacher_dept">
                  <option value="">指定しない</option>
                  @foreach($departments as $key=>$department)
                  <option value="{{$department->dept_id}}" @if($department->dept_id==$teacher_dept) selected="" @endif>{{$department->faculty_name}} {{$department->dept_name}}</option>
                  @endforeach
                </select>
            </td>
          </tr>
          <tr>
            <td class="td_color">研究分野</td>
            <td class="td_border_botton"><select name="teacher_research" id="teacher_research">
                  <option value="">指定しない</option>
                  @foreach($researches as $key=>$research) 
                     <option value="{{$key}}" @if($key==$teacher_research) selected="" @endif>{{$research}}</option>
                  @endforeach
                </select></td>
          </tr>
          <tr>
            <td class="td_color">キーワード</td>
            <td ><input type="text" name="txtKeyword" id="txtKeyword" value="@if(!empty($txtKeyword)) {{$txtKeyword}} @endif"></td>
          </tr>   
          <tr>
            <td colspan="2" align="left"><br><button type="submit" class="button">検索する</button></td>   　　　　　        
           </tr>       
        </tbody>
      </table>
      {!! Form::close() !!}
  </div>
  <header class="article-header"><h1>検索結果</h1></header>
  <div style="margin: 0 29px 0px;padding: 0 8px 0px;">
    <table width="100%" border="0" cellpadding="2" cellspacing="2" id="tblList">
      @if(empty($teachers) || count($teachers) < 1)
      <tr><td colspan="2"><strong style="color: #777;">該当するデータがありません。</strong></td></tr>
      @else
        @foreach($teachers as $teacher)           
          <tr><td style="vertical-align: top; width: 15%;">@if(!empty($teacher->teacher_photo))<img src="{{ asset('') }}public/{{$teacher->teacher_photo}}">@endif</td>
              <td style="vertical-align: top;">
                <div class="flow-item">@if(!empty($teacher->teacher_url))<a href="{{$teacher->teacher_url}}" target="blank">@endif<h4>{{$teacher->teacher_name1f}} {{$teacher->teacher_name1g}} {{$teacher->teacher_name2f}} {{$teacher->teacher_name2g}} {{$teacher->teacher_name3g}} {{$teacher->teacher_name3f}}<span style="float: right"><img src="{{ asset('') }}public/common/img/li_arrow_blue1.png" class="icon"></span>@if(!empty($teacher->teacher_url))</a>@endif</h4>
            <table>
              <tbody>
                <tr>
                  <th>所属</th>
                  <td>{{getDepartmentName($departments,$teacher->teacher_dept1)}}
                      @if($teacher->teacher_dept2 >0)<br>{{getDepartmentName($departments,$teacher->teacher_dept2)}}@endif</td>
                </tr>  
                <tr>
                  <th>学位</th>
                  <td>{{$teacher->teacher_degree}} ({{$teacher->teacher_getplace}} {{$teacher->teacher_getyear}} {{$teacher->teacher_getmonth}})</td>
                </tr>
                <tr>
                  <th>専門分野</th>
                  <td>{{$teacher->research_name}}</td>
                </tr>                
              </tbody>
            </table>            
          </div>
              </td>
          </tr>
        @endforeach  
    @endif  
    </table>  
    <?php print_r($teachers);?>
    @if ($teachers->hasPages())
    <?php $teachers->setPath('search');?>
    <div><ul class="pagination">
          <li class="{{ ($teachers->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $teachers->url(1) }}">前へ</a>            
          </li>
          @for ($i = 1; $i <= $teachers->lastPage(); $i++)
          <li class="{{ ($teachers->currentPage() == $i) ? ' active' : '' }}">
              <a href="{{ $teachers->url($i) }}" class="{{ ($teachers->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>
          </li>
         @endfor

          <li class="{{ ($teachers->currentPage() == $teachers->lastPage()) ? ' disabled' : '' }}"> 
            <a href="{{ $teachers->url($teachers->currentPage()+1) }}">次へ</a>                                 
          </li>
        </ul>
    </div>
    @endif
  </div> 
</div> 
@endsection