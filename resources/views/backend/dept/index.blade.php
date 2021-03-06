@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　登録済み学科/専攻の一覧</td>
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
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="25%" class="col3">選択中の学部/研究科名</td>
            <td>{{$faculty_name}}　　　
              <input type="button" onClick="location.href='{{route('backend.faculty.index')}}'" value="学部/研究科を変更する"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="right"><input type="button" onClick="location.href='{{route('backend.dept.regist', $faculty_id)}}'" value="学科/専攻科の新規登録"></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr class="col3">
            <td width="5%" align="center">削除</td>
            <td width="8%" align="center">表示</td>
            <td align="center">学科/専攻名</td>
            <td width="5%" align="center">編集</td>
            <td width="24%" colspan="4" align="center">表示順序</td>
          </tr>
          @if(count($depts)>0)
          @foreach($depts as $key => $dept)
          <tr>
            <td><input type="button" onClick="location.href='{{route('backend.dept.delete', [$faculty_id, $dept->dept_id])}}'" value="削除"></td>
            <td align="center">
              @if(empty($dept->faculty_dspl_flag))
                @if(empty($dept->dept_dspl_flag))
                <span class="f_blue">○</span>
                @else
                <span class="f_red">×</span>
                @endif
              @else
                <span class="f_red">×</span>
              @endif
            </td>
            <td>{{$dept->dept_name}}</td>
            <td><input type="button" onClick="location.href='{{route('backend.dept.edit', [$faculty_id, $dept->dept_id])}}'" value="編集"></td>

            @if($key == 0)
                <td class="width-md">&nbsp;</td>
                <td class="width-sm">&nbsp;</td>
                <td class="width-sm"><input type="button" class="btn-sort" sort="{{$dept->dept_sort}}" id="{{$dept->dept_id}}" action="DOWN" value="↓"></td>
                <td class="width-md"><input type="button" class="btn-sort" sort="{{$dept->dept_sort}}" id="{{$dept->dept_id}}" action="LAST" value="LAST"></td>
                @elseif(count($depts) - 1 == $key)
                <td class="width-md"><input type="button" class="btn-sort" sort="{{$dept->dept_sort}}" id="{{$dept->dept_id}}" action="TOP" value="TOP"></td>
                <td class="width-sm"><input type="button" class="btn-sort" sort="{{$dept->dept_sort}}" id="{{$dept->dept_id}}" action="UP" value="↑"></td>
                <td class="width-sm">&nbsp;</td>
                <td class="width-md">&nbsp;</td>
                @else
                <td class="width-md"><input type="button" class="btn-sort" sort="{{$dept->dept_sort}}" id="{{$dept->dept_id}}" action="TOP" value="TOP"></td>
                <td class="width-sm"><input type="button" class="btn-sort" sort="{{$dept->dept_sort}}" id="{{$dept->dept_id}}" action="UP" value="↑"></td>
                <td class="width-sm"><input type="button" class="btn-sort" sort="{{$dept->dept_sort}}" id="{{$dept->dept_id}}" action="DOWN" value="↓"></td>
                <td class="width-md"><input type="button" class="btn-sort" sort="{{$dept->dept_sort}}" id="{{$dept->dept_id}}" action="LAST" value="LAST"></td>
                @endif
          </tr>
          @endforeach

          @else
          <tr>
                <td colspan="8" style="text-align: center;">データ無し </td>
            </tr>
          @endif
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<script>
    $(document).ready(function(){
    $('.btn-sort').click(function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            e.preventDefault();
            var id = $(this).attr('id');
            var action = $(this).attr('action');
            var sort = $(this).attr('sort');
            var faculty_id = "{{$faculty_id}}";

            $.ajax({
                type: "GET",
                url: "{{route('backend.dept.sort_ajax')}}",
                data: {id: id, action: action, sort: sort, faculty_id: faculty_id},
                dataType: 'json',
                success: function (data) {
                  //console.log(data);
                  if(data.response == 'OK'){
                      window.location.href=window.location.href;
                  }
                },
                error: function (data) {
                  console.log('Error:', data);
                }
            });

        });
});
</script>

@endsection