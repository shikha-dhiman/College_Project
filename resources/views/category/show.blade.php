@extends('category.layouts.main')

@section('content')
<div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h2 class="h3 mb-2 text-gray-800">View Client details</h2> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <a href="{{ route('category.index') }}" style="text-decoration: none;!important">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a><span class="font-weight-bold">Customer Details</span>
                            <hr>
                            @foreach($category as $key => $val)
                                <b>Category Name:</b><span>{{$val->category_name}}</span>
                            @endforeach
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