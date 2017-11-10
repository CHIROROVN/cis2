@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <input name="button11" type="button" disabled id="button11" value="前の{{LIMIT_PAGE}}件を表示" onclick="location.href='{{ $paginator->url(1) }}'">
        <!--<a href="">前の{{LIMIT_PAGE}}件を表示"</a>-->
    </li>
    <!-- @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor -->
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <!--<a href="{{ $paginator->url($paginator->currentPage()+1) }}" >次の{{LIMIT_PAGE}}件を表示</a>-->
        <input type="button" name="button12" id="button12" value="次の{{LIMIT_PAGE}}件を表示" onclick="location.href='{{ $paginator->url($paginator->currentPage()+1) }}'">
    </li>
</ul>

@endif

