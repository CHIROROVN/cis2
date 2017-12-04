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
            <td  class="td_color">学部・所属</td>
            <td class="td_border_botton">
                <select name="teacher_dept" id="teacher_dept">
                  <option value="">指定しない</option>
                  @if(count($departments) > 0)
                    @foreach($departments as $key=>$department)
                    <option value="{{$department->dept_id}}">{{$department->faculty_name}}.{{$department->dept_name}}</option>
                    @endforeach
                  @endif  
                </select>
            </td>
          </tr>
          <tr>
            <td  class="td_color">研究分野</td>
            <td class="td_border_botton"><select name="teacher_research" id="teacher_research">
                  <option value="">指定しない</option>                  
                </select></td>
          </tr>
          <tr>
            <td class="td_color">キーワード</td>
            <td ><input type="text" name="txtKeyword" id="txtKeyword"></td>
          </tr>   
          <tr>
            <td  align="left" id="btnSubmit"><button type="button" class="button" id="btSubmit" >検索する</button></td>
            <td></td>   　　　　　        
           </tr>       
        </tbody>
      </table>
      {!! Form::close() !!}
  </div>
</div> 
<script type="text/javascript">  
$("#btSubmit").on("click",function() {
  var strKeyword = $('#txtKeyword').val();
   $('#txtKeyword').val(strKeyword.trim());
  $( "#frmSearch" ).submit();
});
var arrResearch = new Array();
<?php if(count($researches) > 0){ 
        foreach($researches as $research){
?>  arrResearch.push({'research_id':'<?php echo $research->research_id?>','research_name':'<?php echo $research->research_name?>','dept_id':'<?php echo $research->dept_id?>'});
<?php }}?>  
$("#teacher_dept").on("change",function() {
  $('#teacher_research').val('') ;
  $("#teacher_research").html("<option value=''>指定しない</option>");  
  id = $('#teacher_dept').val();  
  if(Array.isArray(arrResearch)){
      $.each(arrResearch, function(key, val){
        if(val.dept_id==id){
            $("#teacher_research").append(new Option(val.research_name, val.research_id)); 
        }
    });     
  }
});
</script>     
@endsection