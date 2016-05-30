<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at', 'updated_at', 'deleted_at', 'published_at'];  

  protected $fillable = ['title', 'body', 'publish_status', 'published_at'];

  public function scopePublished($query)
  {
    return $query->where([ ['publish_status','published'], ['published_at', '<', Carbon::now()] ])
                ->orderBy('published_at', 'desc')
                ->get();
  }

  public function scopeUnpublished($query)
  {
    return $query->where('publish_status','<>', 'published')
                ->orderBy('updated_at')
                ->get();
  }

  public function setPublishedAtAttribute($date)
  {
    $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
  }

  public function getPublishedAtAttribute($date)
  {
    return  Carbon::parse($date)->toDateString();
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
