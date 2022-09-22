@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">                  
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Users') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('user-create')
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreate" style="color:white">
                                <span style="color:white"></span> {{ __('New') }}
                            </a>
                        @endcan
                    </div>
                </div>                  
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Users') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                   
                <form action="/users" method="get" role="search">
                    <div class="row">   
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">              
                                <input type="text" id="q" name="search" class="form-control" placeholder="Search..." onkeyup="load(1)">                            
                            </div> 
                        </div>
                        <div class="form-group">                                 
                            <button type="submit" class="btn btn-success" onclick="load(1)">search</button>
                        </div>
                    </div>
                </form>
                
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Roles') }}</th>
                                                <th width="280px">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        @foreach ($data as $key => $user)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if(!empty($user->getRoleNames()))
                                                            @foreach($user->getRoleNames() as $v)
                                                                {{ $v }}
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary" href="{{ route('users.show',$user->id) }}">{{ __('Show') }}</a>
                                                        @can('user-edit')
                                                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#ModalEdit{{$user->id}}">{{ __('Edit') }}</a>
                                                        @endcan
                                                        @can('user-delete')
                                                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#ModalDelete{{$user->id}}">{{ __('Delete')}}</a>
                                                        @endcan
                                                     </td>
                                                     @include('users.modal.edit')
                                                     @include('users.modal.delete')
                                                </tr>                                            
                                            </tbody>
                                        @endforeach
                                    </table>
                                    {!! $data->render() !!}
                                <!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->        
    @include('users.modal.create')
@endsection