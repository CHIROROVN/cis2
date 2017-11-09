@extends('backend.layouts.app')
@section('content')
<table width="920" border="0" align="center" cellpadding="5" cellspacing="0">
  <tbody>
    <tr>
      <td class="col1">■教員検索システム　＞　登録済み学部/研究科の一覧</td>
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
      <td align="right"><input type="button" onClick="location.href='{{route('backend.faculty.regist')}}'" value="学部の新規登録"></td>
    </tr>
    <tr>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
            <tr class="col3">
                <td width="4%" align="center">削除</td>
                <td width="8%" align="center">表示</td>
                <td align="center">学部/研究科名</td>
                <td width="18%" align="center">配下の学科/専攻を管理</td>
                <td width="18%" align="center">配下の研究分野を管理</td>
                <td width="5%" align="center">編集</td>
                <td width="20%" colspan="4" align="center">表示順序</td>
            </tr>
            @if(count($faculty)>0)
            @foreach($faculty as $key => $fc)
            <tr>
                <td><input type="button" onClick="location.href='{{route('backend.faculty.delete',$fc->faculty_id)}}'" value="削除"></td>

                <td align="center">
                    @if(empty($fc->faculty_dspl_flag))
                    <span class="f_blue">○</span>
                    @else
                    <span class="f_red">×</span>
                    @endif
                </td>

                <td>{{$fc->faculty_name}}</td>
                <td><input type="button" onClick="location.href='{{route('backend.dept.index',$fc->faculty_id)}}'" value="配下の「学科/専攻」管理"></td>
                <td><input type="button" onClick="location.href='{{route('backend.research.index',$fc->faculty_id)}}'" value="配下の「研究分野」管理"></td>
                <td><input type="button" onClick="location.href='{{route('backend.faculty.edit',$fc->faculty_id)}}'" value="編集"></td>
                
                @if($key == 0)
                <td class="width-md">&nbsp;</td>
                <td class="width-sm">&nbsp;</td>
                <td class="width-sm"><input type="button" class="btn-sort" sort="{{$fc->faculty_sort}}" id="{{$fc->faculty_id}}" action="DOWN" value="↓"></td>
                <td class="width-md"><input type="button" class="btn-sort" sort="{{$fc->faculty_sort}}" id="{{$fc->faculty_id}}" action="LAST" value="LAST"></td>
                @elseif(count($faculty) - 1 == $key)
                <td class="width-md"><input type="button" class="btn-sort" sort="{{$fc->faculty_sort}}" id="{{$fc->faculty_id}}" action="TOP" value="TOP"></td>
                <td class="width-sm"><input type="button" class="btn-sort" sort="{{$fc->faculty_sort}}" id="{{$fc->faculty_id}}" action="UP" value="↑"></td>
                <td class="width-sm">&nbsp;</td>
                <td class="width-md">&nbsp;</td>
                @else
                <td class="width-md"><input type="button" class="btn-sort" sort="{{$fc->faculty_sort}}" id="{{$fc->faculty_id}}" action="TOP" value="TOP"></td>
                <td class="width-sm"><input type="button" class="btn-sort" sort="{{$fc->faculty_sort}}" id="{{$fc->faculty_id}}" action="UP" value="↑"></td>
                <td class="width-sm"><input type="button" class="btn-sort" sort="{{$fc->faculty_sort}}" id="{{$fc->faculty_id}}" action="DOWN" value="↓"></td>
                <td class="width-md"><input type="button" class="btn-sort" sort="{{$fc->faculty_sort}}" id="{{$fc->faculty_id}}" action="LAST" value="LAST"></td>
                @endif
            
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="10" style="text-align: center;">データ無し </td>
            </tr>
            @endif

        </tbody>
      </table>      
  </td>
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

            $.ajax({
                        type: "GET",
                        url: "{{route('backend.faculty.sort_ajax')}}",
                        data: {id: id, action: action, sort: sort},
                        dataType: 'json',
                        success: function (data) {
                                console.log(data);
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