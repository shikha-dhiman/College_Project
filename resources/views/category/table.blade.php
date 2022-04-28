@extends('category.layouts.main')

@section('content')

 <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('category.create') }}" style="text-decoration: none;!important">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            </a><span class="font-weight-bold">Category
                            </span>
                          
                             @if(session()->has('message'))
                                <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                     <div class="alert alert-success">
                                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                         {{ session()->get('message') }}
                                     </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         @foreach($category as $key => $val)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$val->category_name}}</td>
                                            <td><form action="{{ route('category.destroy', $val->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            <a class="btn btn-outline-primary" href="{{ route('category.edit',$val->id) }}"><i class="fa fa-wrench" aria-hidden="true"></i></a>
                                            <!-- <a class="btn btn-outline-success" href="{{ route('category.show',$val->id) }}"><i class="fa fa-eye"></i></a> -->
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    
@endsection