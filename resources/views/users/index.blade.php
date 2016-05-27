@extends('layouts.default')

@section('title', 'All Users')

@section('content')

<div class="container-fluid">
  <h1>Manage Users</h1>
  <table class="table">
    <tr>
      <th>Sl</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
    @if(count($users))
      @foreach($users as $user)
        <tr>
          <td>{{$counter+=1}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            <select class="role" data-token="{!! csrf_token() !!}" data-id="{{ $user->id }}">
              @foreach($roles as $role)
                <option value="{{ $role->id }}" @if($role->name == $user->role->name) selected @endif >
                  {{$role->name}}
                </option>
              @endforeach
            </select>
          </td>
        </tr>
      @endforeach
    @endif
  </table>
</div>

<div class="alert alert-success alert-fixed-top-right" role="alert">Updated !!</div>
<div class="alert alert-warning alert-fixed-top-right alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  You cannot assign Admin Role
</div>
<div class="alert alert-danger alert-fixed-top-right alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Sorry, there was some problem.
</div>
@endsection