<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class GithubCommit extends Model
{
    protected $table = 'github';

    protected $fillable = [
        'Revision',
        'URL',
        'LogMessage',
        'Date',
        'SHA',
        'Author',
        'AuthorAvatarURL',
        'AuthorURL',
        'Version',
    ];
}
