 @extends('backend.index')
 @section('title')
 Add Post
 @endsection
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Update Post</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Update Post</li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->


     <div class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="card card-default" style="width:80%">
                     <div class="card-header">
                         <div class="card-tools">
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="col-md-12">
                             <form action="{{ route("save_post") }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group">
                                     <label>Title</label>
                                     <input class="form-control" name="title" value="{{ $post->title }}" placeholder="Enter Title">
                                     <input type="hidden" name="id" value="{{ $post->id }}">
                                 </div>
                                 <div class="form-group">
                                     <label>Description</label>
                                     <textarea name="description" class="form-control" rows="3">{{ $post->description }}</textarea>
                                 </div>
                                 <div class="form-group">
                                     <select class="form-select" name="status" aria-label="Default select example">
                                         <option selected>Select Status</option>

                                         <option value="Publish" {{ ($post->status=="publish")?"selected":"" }}>Publish</option>
                                         <option value="draff" {{ ($post->status=="draff")? "selected":"" }}>Draff</option>
                                     </select>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Submit</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- /.row -->
     </div>
 </div>

 @endsection
