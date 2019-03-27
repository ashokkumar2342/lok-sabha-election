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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
               
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> 
            @foreach ($countigTables as $table) 
            @if ($activeBoothNo !=null)
              <button type="button" class="btn btn-danger"  id="btn_table_no" button-click="booth_no{{ $activeBoothNo->id }}" onclick="callAjax(this,'{{ route('vote.details.boothno.show',[$table->pc_code,$table->ac_code,$table->table_no]) }}','div_booth_no')">T-{{ $table->table_no }}</button>
              @else
              <button type="button" hidden id="btn_booth_no" button-click="booth_no_finish" onclick="callAjax(this,'{{ route('vote.details.boothno.show',[$table->pc_code,$table->ac_code,$table->table_no]) }}','div_booth_no')">Show</button>
              @endif
            @endforeach
 
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
         <div class="row mb-12" id="div_booth_no">  
             
         </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         <!-- Main content -->
         <section class="content"> 
           <!-- Default box -->
           <div class="card" id="candidate_details_form">
             
             <!-- /.card-body -->
             
             <!-- /.card-footer-->
           </div>
           <!-- /.card -->

         </section>
         <!-- /.content -->
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->


@endsection