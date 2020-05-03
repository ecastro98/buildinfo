@foreach ($revisions as $revision => $commits)
    @foreach ($commits as $index => $commit)
        <?php $logMessageLines = explode('\n', $commit->LogMessage); ?>
        <tr>
            <td style='border-top: @if ($index === 0) 1px @else 0px @endif solid #ccc; border-bottom: 0px solid #ccc;border-right: 1px solid #ccc;text-align:center;'>@if ($index === 0)<a href='?Revision={{ $commit->Revision }}&amp;Branch='>{{ $commit->Revision }}</a>@endif</td>
            <td style='border-top: 1px solid #ccc; border-bottom: 0px solid #ccc;border-right: 0px solid #ccc;text-align:center;'><img style='vertical-align:middle;' src='{{ $commit->AuthorAvatarURL }}' height='25' alt='Avatar' /> </td>
            <td style='border-top: 1px solid #ccc; border-bottom: 0px solid #ccc;border-right: 0px solid #ccc;'>{{ $commit->Author }}</td>
            <td style='border-top: 1px solid #ccc; border-bottom: 0px solid #ccc;border-right: 0px solid #ccc;text-align:center;'><a href='?Branch={{ $commit->Version }}&amp;Revision='>{{ $commit->Version }}</a></td>
            <td style='border-top: 1px solid #ccc; border-bottom: 0px solid #ccc;border-right: 0px solid #ccc;padding-left:2em;'>
                @foreach ($logMessageLines as $index => $logMessageLine)
                    <span class='commit-header' style='display: block; padding-left: 0.80em; text-indent:-0.80em; margin: 5px 0;'>
                                            @if ($index === 0)
                            <a href='https://github.com/multitheftauto/mtasa-blue/commit/{{ $commit->SHA }}'>{{ $logMessageLine }}</a>
                        @else
                            <small>{{ $logMessageLine }}</small>
                        @endif
                                        </span>
                @endforeach
            </td>
            <td style='border-top: 1px solid #ccc; border-bottom: 0px solid #ccc;border-right: 0px solid #ccc;'>{{ $commit->Date }}</td>
            <td style='border-top: 1px solid #ccc; border-bottom: 0px solid #ccc;border-right: 0px solid #ccc;'><div style='width: 100%; height: 100%' class='commit-sha'><a href='https://github.com/multitheftauto/mtasa-blue/commit/{{ $commit->SHA }}'>{{ $commit->SHA }}</a></div></td>
        </tr>
    @endforeach
@endforeach
