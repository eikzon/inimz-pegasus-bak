<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageDescription extends Model
{
	use SoftDeletes;
    
    protected $table        = 'image_description';
    protected $dates        = ['deleted_at'];
    protected $softDelete   = true;

    public function pageContent()
    {
        return $this->belongsTo(PageContent::class, 'page_content_id');
    }
}
