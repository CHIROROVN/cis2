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
  <div >所属、研究分野、キーワードから教員検索ができます。</div>
  <div >
     {!! Form::open(array('route' => 'frontend.search.teacher','id'=>'frmSearch', 'method' => 'get')) !!} 
     <table width="500px" border="1" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td class="td_color">学部・所属</td>
            <td class="td_border_botton">
                <select name="teacher_dept" id="teacher_dept">
                  <option value="">指定しない</option>
                  @if(count($departments) > 0)
                    @foreach($departments as $key=>$department)
                    <option value="{{$department->dept_id}}" @if($department->dept_id==$teacher_dept) selected="" @endif>{{$department->faculty_name}} {{$department->dept_name}}</option>
                    @endforeach
                  @endif
                </select>
            </td>
          </tr>
          <tr>
            <td class="td_color">研究分野</td>
            <td class="td_border_botton"><select name="teacher_research" id="teacher_research">
                  <option value="">指定しない</option>
                  @if($teacher_dept >0)
                    @foreach($researches as $research)
                        @if($research->faculty_id == $faculty_id)
                          <option value="{{$research->research_id}}" @if($research->research_id==$teacher_research) selected="" @endif>{{$research->research_name}}</option>
                        @endif 
                    @endforeach
                  @endif
                </select></td>
          </tr>
          <tr>
            <td class="td_color">キーワード</td>
            <td ><input type="text" name="txtKeyword" id="txtKeyword" value="@if(!empty($txtKeyword)){{$txtKeyword}}@endif"></td>
          </tr>   
          <tr>
            <td  align="left" id="btnSubmit"><button type="button" class="button" id="btSubmit">検索する</button></td> 
            <td></td>  　　　　　        
           </tr>       
        </tbody>
      </table>
      {!! Form::close() !!}
  </div>
  <header class="article-header"><h1>検索結果</h1></header>
  <div >
    <table width="95%" border="0" cellpadding="1" cellspacing="1" id="tblList">
      @if(empty($teachers) || count($teachers) < 1)
      <tr><td colspan="2"><strong style="color: #777;">該当するデータがありません。</strong></td></tr>
      @else
        @foreach($teachers as $teacher)           
          <tr><td style="vertical-align: top; width: 80px">@if(!empty($teacher->teacher_photo))<img src="{{ asset('') }}public/{{$teacher->teacher_photo}}">@endif</td>
              <td style="vertical-align: top;"><div class="flow-item">@if(!empty($teacher->teacher_url))<a href="{{$teacher->teacher_url}}" target="blank">@endif<h4>{{$teacher->teacher_name1f}} {{$teacher->teacher_name1g}} <span class="teacher_name">{{$teacher->teacher_name2f}}</span><span class="teacher_name"> {{$teacher->teacher_name2g}}</span> / <span class="teacher_name">{{$teacher->teacher_name3g}} {{$teacher->teacher_name3f}}</span><span style="float: right"><img src="{{ asset('') }}public/common/img/li_arrow_blue1.png" class="icon"></span>@if(!empty($teacher->teacher_url))</a>@endif</h4>
            <table>
              <tbody>
                <tr>
                  <th>所属</th>
                  <td @if($teacher->teacher_dept2 >0 && $teacher->teacher_dept1 >0) style="line-height: 18px;" @endif>{{getDepartmentName($departments,$teacher->teacher_dept1)}}
                      @if($teacher->teacher_dept2 >0)<br>{{getDepartmentName($departments,$teacher->teacher_dept2)}}@endif</td>
                </tr>  
                <tr>
                  <th>学位</th>
                  <td>{{$teacher->teacher_degree}} @if(!empty($teacher->teacher_getplace) || !empty($teacher->teacher_getmonth) || !empty($teacher->teacher_getyear))  ({{$teacher->teacher_getplace}} @if(!empty($teacher->teacher_getyear)){{$teacher->teacher_getyear}}年 @endif {{$teacher->teacher_getmonth}}月) @endif</td>
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
    @if ($teachers->hasPages())        
    <div style="text-align: center;"><ul class="pagination">
          <li class="{{ ($teachers->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{route('frontend.search.teacher')}}?page={{$teachers->currentPage()-1}}}&teacher_dept={{$teacher_dept}}&teacher_research={{$teacher_research}}&txtKeyword={{$txtKeyword}}" >前へ</a>           
          </li>
          @for ($i = 1; $i <= $teachers->lastPage(); $i++)
          <li class="{{ ($teachers->currentPage() == $i) ? ' active' : '' }}">
              <a href="{{route('frontend.search.teacher')}}?page={{$i}}&teacher_dept={{$teacher_dept}}&teacher_research={{$teacher_research}}&txtKeyword={{$txtKeyword}}" class="{{ ($teachers->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>
          </li>
          @endfor
          <li class="{{ ($teachers->currentPage() == $teachers->lastPage()) ? ' disabled' : '' }}"> 
            <a href="{{route('frontend.search.teacher')}}?page={{$teachers->currentPage()+1}}}&teacher_dept={{$teacher_dept}}&teacher_research={{$teacher_research}}&txtKeyword={{$txtKeyword}}">次へ</a>                                 
          </li>
        </ul>
    </div>
    @endif
  </div> 
</div> 
<script type="text/javascript">
$("#btSubmit").on("click",function() {
  var strKeyword = $('#txtKeyword').val();
   $('#txtKeyword').val(strKeyword.trim());
  $( "#frmSearch" ).submit();
});
var arrResearch = new Array();
var arrDepartment = new Array();
<?php if(count($departments) > 0){ 
         foreach($departments as $department){
?>
arrDepartment.push({'dept_id':'<?php echo $department->dept_id?>','faculty_id':'<?php echo $department->faculty_id?>'});
<?php }}?>  

<?php if(count($researches) > 0){ 
        foreach($researches as $research){
?>  arrResearch.push({'research_id':'<?php echo $research->research_id?>','research_name':'<?php echo $research->research_name?>','faculty_id':'<?php echo $research->faculty_id?>'});
<?php }}?>  
$("#teacher_dept").on("change",function() {
  $('#teacher_research').val('') ;
  $("#teacher_research").html("<option value=''>指定しない</option>");  
  dept_id = $('#teacher_dept').val();  
  var id;
  if(Array.isArray(arrDepartment)){
     $.each(arrDepartment, function(key, val){
        if(dept_id==val.dept_id) id = val.faculty_id;
     });
  } 
  if(Array.isArray(arrResearch)){
      $.each(arrResearch, function(key, val){
        if(val.faculty_id==id){
            $("#teacher_research").append(new Option(val.research_name, val.research_id)); 
        }
    });     
  }
});
</script>
@endsection