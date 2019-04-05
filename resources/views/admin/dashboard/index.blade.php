@extends('layouts.app')
@section('contant')

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @if (Auth::user()->role==2)
              
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Refresh</a></li>
              @endif
               
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       @if (Auth::user()->role==1)
       @include('admin.dashboard.admin_dashboard')      
       @endif 
      <!-- /.card -->

      <!-- Default box -->
      @if (Auth::user()->role==2)
        @include('admin.dashboard.aro.dashboard')
      @endif 
        </div>
         
       </div>

    </section>
    <!-- /.content -->


@endsection