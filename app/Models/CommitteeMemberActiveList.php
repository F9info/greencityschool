<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeMemberActiveList extends Model
{
    use HasFactory;

    public function committeeCategory()
    {
        return $this->belongsTo('App\Models\CommitteeCategory', 'committee_category_id');
    }

    public function committeeMember()
    {
        return $this->belongsTo('App\Models\CommitteeMember', 'committee_member_id');
    }
}
