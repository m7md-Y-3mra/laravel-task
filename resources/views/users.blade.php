@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="offset-md-2 col-md-8">
       @if (isset($user))

  <div class="card">
        <div class="card-header">
           تحديث اسم المستخدم
        </div>
        <div class="card-body">
            <!-- New Task Form -->
            <form action="{{ route('users.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <!-- Task Name -->
                <div class="mb-3">
                    <label for="task-name" class="form-label">اسم المستخدم</label>
                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $user->name }}">
                </div>

                <!-- Add Task Button -->
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>تحديث اسم المستخدم
                    </button>
                </div>
            </form>
        </div>
    </div>
     
       @else
       <div class="card">
        <div class="card-header">
            مهمة جديدة
        </div>
        <div class="card-body">
            <!-- New Task Form -->
            <form action="{{ route('users.create') }}" method="POST">
                @csrf
                <!-- Task Name -->
                <div class="mb-3">
                    <label for="task-name" class="form-label">اسم المستخدم</label>
                    <input type="text" name="name" id="task-name" class="form-control" value="">
                </div>

                <!-- Add Task Button -->
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>  إضافة مستخدم جديد
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

        <!-- Current Tasks -->
        <div class="card mt-4">
            <div class="card-header">
                أسماء المستخدمين الحالية الحالية
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>اسم المستخدم</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ( $users as $user )
                       <tr>
                        <td> {{ $user->name }} </td>
                        <td>
                            <form action="{{ route('users.destroy' , $user->id) }}" method="POST" class="d-inline">
                              
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash me-2"></i> حذف 
                                </button>
                            </form>
                            <form action="{{ route('users.edit' , $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-info me-2"></i> تعديل  
                                </button>
                            </form>
                        </td>
                    </tr>
                       @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection