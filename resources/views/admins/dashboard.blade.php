@extends('layouts.app')

@section('content')

<div class="container justify-content-center">
    <div class="row">

        <div class="col-lg-10">

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Role</th>
                        <th scope="col" class="text-center">count</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row" class="text-center align-middle">Users</th>
                        <td class="text-center align-middle">{{$usersCount}}</td>
                        <td class="text-center align-middle">
                            <a class="btn btn-success px-3" href="{{ route('users.index') }}">Show Users</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center align-middle">Editors</th>
                        <td class="text-center align-middle">{{$editorsCount}}</td>
                        <td class="text-center align-middle">
                            <a class="btn btn-success " href="{{ route('editors.index') }}">Show Editors</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center align-middle">Admins</th>
                        <td class="text-center align-middle">{{$adminsCount}}</td>
                        <td class="text-center align-middle">
                            <a class="btn btn-success " href="{{ route('admins.index') }}">Show Admins</a>
                        </td>
                    </tr>


                </tbody>
            </table>
            <!-- End Table with hoverable rows -->
        </div>
    </div>
</div>




@endsection
