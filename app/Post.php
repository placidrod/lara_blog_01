<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['title', 'body'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    $proposed_slug = strtolower(str_replace(' ', '-', $value));
    $existing_slug = Post::where('slug', $proposed_slug)->first();

    if(! $existing_slug) {
      $this->attributes['slug'] = $proposed_slug;
    } else {
      $this->attributes['slug'] = $this->addNumberToSlug($proposed_slug);
    }
  }

  private function addNumberToSlug($proposed_slug)
  {
    $number_added_to_slug = 0;
    
    do {
      $number_added_to_slug += 1;
      $numbered_proposed_slug = $proposed_slug . '-' . $number_added_to_slug;
      $existing_slug = Post::where('slug', $numbered_proposed_slug)->first();
    } while($existing_slug);

    return $numbered_proposed_slug;
  }  
}
