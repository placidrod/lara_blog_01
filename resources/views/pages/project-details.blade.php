@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>Project Features</h2>
            
            <div class="panel panel-default">
                <div class="panel-heading"><h4>User Management</h4></div>
                <div class="panel-body">
                    <ol>
                        <li>Unregistered users can view posts</li>
                        <li>Four types of user roles</li>
                        <ol type="a">
                            <li>Subscriber</li>
                                <ul>
                                    <li>Can do all that Unregistered Users can</li>
                                    <!-- <li>Can comment on posts</li> -->
                                </ul>
                            <li>Author</li>
                                <ul>
                                    <li>Can do all that Subscirbers can</li>
                                    <li>Can create posts</li>
                                    <li>Can update own posts</li>
                                </ul>
                            <li>Editor</li>
                                <ul>
                                    <li>Can do all that Editors can</li>
                                    <li>Can update and delete others' posts</li>
                                </ul>                            
                            <li>Admin</li>
                                <ul>
                                    <li>Can do all that Editors can</li>
                                    <li>Can manage users</li>
                                </ul>                            
                        </ol>
                    </ol>
                    <h4>Technical Features</h4>
                    <ol>
                        <li>Viewing appropriate links based on roles</li>
                        <li>Ajax based update roles of users</li>
                        <li>Restriction to assign user as Admin</li>
                        <li>Updating user roles</li>
                        <ul>
                            <li>Automatically show and hide message for update</li>
                            <li>Show message for errors and warnings with close buttons</li>
                        </ul>
                    </ol>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><h4>Posts</h4></div>
                <div class="panel-body">
                    <ol>
                        <li>Slug based navigation</li>
                        
                    </ol>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
