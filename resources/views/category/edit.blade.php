@extends('category.layouts.main')

@section('content')
<div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <a href="{{ route('category.index') }}" style="text-decoration: none;!important">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a><span class="font-weight-bold">Update</span>
                            <hr>
                            @foreach($category as $key => $val)
                           <form action="{{ route('category.update', $val->id) }}" method="POST" enctype="multipart/form-data">
                           	@csrf
                             {{ method_field('PUT') }}
							  <div class="form-row">
							  	<div class="form-group col-md-12">
							      <label for="inputEmail4">Category Name</label>
							      <input type="text" name="categoryname" class="form-control" placeholder="Name" value="{{$val->category_name}}">
							    </div>
							   </div>
							  <button type="submit" class="btn btn-primary">Submit</button>
							</form>
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