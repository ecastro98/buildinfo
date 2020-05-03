<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\GithubCommit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    private const DEFAULT_PAGE = 1;
    private const DEFAULT_BRANCH = 'master';
    private const RESULTS_PER_PAGE = 10;
    private const GOOGLE_HISTORY_URL = 'https://code.google.com/p/mtasa-blue/source/list';

    public function __invoke(Request $request)
    {
        $page = (int) $request->query->get('Page');
        $safePage = !empty($page) ? $page : self::DEFAULT_PAGE;

        $filterBranch = $request->query->get('Branch') ?? self::DEFAULT_BRANCH;
        $filterRevision = $request->query->get('Revision');
        $filterAuthor = $request->query->get('Author');
        $filterSHA = $request->query->get('SHA');

        $githubCommitsQuery = GithubCommit::where('Version', $filterBranch)
            ->orderBy('Revision', 'desc')
            ->skip(self::RESULTS_PER_PAGE*($safePage-1))
            ->take(self::RESULTS_PER_PAGE);
        $githubCommitsCountQuery = DB::table('github');

        if (!empty($filterRevision)) {
            $githubCommitsQuery->where('Revision', $filterRevision);
            $githubCommitsCountQuery->where('Revision', $filterRevision);
        }

        if (!empty($filterAuthor)) {
            $githubCommitsQuery->where('Author', $filterAuthor);
            $githubCommitsCountQuery->where('Author', $filterAuthor);
        }

        if (!empty($filterSHA)) {
            $githubCommitsQuery->where('SHA', $filterSHA);
            $githubCommitsCountQuery->where('Author', $filterAuthor);
        }

        $githubCommits = $githubCommitsQuery->get();

        $pagesCount = max($githubCommitsCountQuery->count() / self::RESULTS_PER_PAGE, 1);

        // GROUP BY as it seems like not working with WHERE clause
        $groupedGithubRevisions = [];
        foreach ($githubCommits as $githubCommit) {
            $groupedGithubRevisions[$githubCommit->Revision][] = $githubCommit;
        }

        if ($safePage > $pagesCount) {
            return redirect(self::GOOGLE_HISTORY_URL);
        }

        return view('index', [
            'revisions' => $groupedGithubRevisions,
            'page' => $safePage,
            'pagesCount' => $pagesCount,
            'branch' => $filterBranch,
            'revision' => $filterRevision,
            'author' => $filterAuthor,
            'sha' => $filterSHA,
            'googleHistoryUrl' => self::GOOGLE_HISTORY_URL,
        ]);
    }
}
