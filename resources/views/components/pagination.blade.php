@if ($page !== 1)
    <a href="index.php?Page={{ $page - 1 }}"><b>‹</b> Newer</a>
@endif
Page {{ $page }} of {{ $pagesCount }}
@if ($page === $pagesCount)
    <a href="{{ $googleHistoryUrl }}">Older (Google Code)R<b>&rsaquo;</b></a>
@else
    <a href="index.php?Page={{ $page + 1 }}">Older <b>&rsaquo;</b></a>
@endif
