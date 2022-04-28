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
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body"> 
                            <a href="{{ route('category.index') }}" style="text-decoration: none;!important">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a><span class="font-weight-bold">Add</span>
                            <hr>
                           <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label class="font-weight-bold" for="inputEmail4">Category Name</label>
                                  <input type="text" name="categoryname" class="form-control" id="inputEmail4" placeholder="Category Name" required>
                                </div>
                               </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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