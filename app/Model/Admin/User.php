<?php

namespace App\Model\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $table        = 'user';
    protected $hidden       = ['password'];
    protected $dates        = ['deleted_at'];
    protected $softDelete   = true;
    protected $fillable     = array('group_id', 'username', 'password','first_name','last_name','position','department','status');

    public function groupUser()
    {
        return $this->belongsTo(GroupUser::class, 'group_id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class, 'user_id');
    }

    public function pageContents()
    {
        return $this->hasMany(PageContent::class, 'user_id');
    }

}
