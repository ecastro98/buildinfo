<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>MTASA Build Information</title>
        <link rel="stylesheet" type="text/css" href="css.css" />
        <script type="text/javascript" src="js/index.js"></script>
    </head>
    <body>
        <form id="searchform" action="">
            <div id="test" style="background: -webkit-gradient(linear,left top,left bottom,from(#fff),to(#f1f1f1));
          background: -moz-linear-gradient(top,#fff,#f1f1f1);
          border-bottom: 1px solid #ccc;
          padding: 0 0 0 14px;
          min-height: 33px; display: flex; justify-content: space-between; flex-wrap: wrap;">
                <span style='line-height: 33px;vertical-align: middle;'>
                  <a href="?">All</a>
                  <a href="?Branch=master">Master</a>
                  <a href="?Branch=1.5">1.5</a>
                  <a href="?Branch=1.4">1.4</a>
                </span>
                <div style="line-height: 33px;vertical-align: middle;padding-right: 20px;">
                    <span style="margin-right: .25em;">
                        <input id="shortenedcommits" type="checkbox"  onclick="toggleFullMessages()">
                        <label for="shortenedcommits">Long commit messages</label>
                    </span>
                    <input name="SHA" placeholder="SHA filter" style="width:21em" value="{{ $sha }}">
                    <input name="Author" placeholder="Author filter" value="{{ $author }}">
                    <input name="Branch" placeholder="Branch filter" value="{{ $branch }}">
                    <input name="Revision" placeholder="Revision filter" value="{{ $revision }}">
                    <input type="button" onclick="document.location='index.php';" value="Reset" />
                    <input type="submit" value="Submit">
                </div>
            </div>
        </form>

        <div id="maincol">
            <div id="colcontrol">
                <div class="list">
                    <div class="googlecodelink">
                        <x-pagination :page="$page" :pagesCount="$pagesCount" :googleHistoryUrl="$googleHistoryUrl" />
                    </div>
                    <b>Committed Changes</b>
                </div>
                <table class="results" id="resultstable">
                    <tbody>
                    <tr style="text-align:center">
                        <th style="width:7ex;text-align:center"><b>Rev</b></th>
                        <th style="width:3.5em;text-align:center"><b>Avatar</b></th>
                        <th style="text-align:center;padding-right:10px;padding-left:10px;"><b>Author</b></th>
                        <th style="text-align:center;padding-right:10px;padding-left:10px;"><b>Branch</b></th>
                        <th style="width:80em;text-align:center"><b>Log Message</b></th>
                        <th style="width:22em;text-align:center"><b>Date</b></th>
                        <th style="width:54ex;text-align:center"><b>SHA</b></th>
                    </tr>
                        <x-revisions :revisions="$revisions"/>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bottomdiv">
            <div class="listbottom">
                <div class="googlecodelink">
                    <x-pagination :page="$page" :pagesCount="$pagesCount" :googleHistoryUrl="$googleHistoryUrl" />
                </div>
                <b>End of Committed Changes</b>
            </div>
        </div>
    </body>
</html>
