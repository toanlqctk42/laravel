@extends('backend.index')
@section('css_page')
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('/') }}backEndSource/plugins/toastr/toastr.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('/') }}backEndSource/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
@endsection
@section('title')
List Posts
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Posts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-success">
                    <div class="card-header">
                        <div class="card-tools">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <a href="{{ route('create_post')}}" class="btn btn-info float-right mr-2">add</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr id="sid{{$post->id}}">
                                        <th scope="row">{{ $post->id }}</th>
                                        <td>{{ $post->title}} </td>
                                        <td>{{ $post->description}}</td>
                                        <td>{{ $post->status}}</td>
                                        <td>
                                            <a href="{{ route('edit_post', ['post'=>$post]) }}" class="btn btn-info">Edit</a>
                                            {{-- <a href="{{ route('delete_post',['post'=>$post]) }}"
                                            class="btn btn-danger delete">Delete</a> --}}
                                            <a href="" class="toastsDefaultSuccess btn btn-danger" data-id="{{$post->id}}" data-url="{{ route('delete_post',['id'=>$post->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
{{-- <div id="toastsContainerTopRight" class="toasts-top-right fixed">
    <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header"><strong class="mr-auto">Toast Title</strong><small>Subtitle</small><button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button></div>
        <div class="toast-body">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</div>
    </div>
</div> --}}
@endsection
@section('js_page')
<!-- SweetAlert2 -->
<script src="{{ asset('/') }}backEndSource/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('/') }}backEndSource/plugins/toastr/toastr.min.js"></script>
<script>
    $(document).on('click', '.toastsDefaultSuccess', function(e) {
        e.preventDefault();
        var Toast = Swal.mixin({
            toast: true
            , position: 'top-end'
            , showConfirmButton: false
            , timer: 3000
        });
        var id = $(this).data('id');
        var url = $(this).data('url');
        event.preventDefault();
        swal.fire({
            title: "Are you sure you want to delete this record?"
            , text: "If you delete this, it will be gone forever."
            , icon: "warning"
            , type: "warning"
            , buttons: ["Cancel", "Yes!"]
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                $.ajax({
                    url: url
                    , type: "GET"
                    , success: function() {
                        Toast.fire({
                            icon: 'success'
                            , title: 'Delete Completed.'
                        })
                        $("#sid" + id).remove();
                    }
                    , error: function() {
                        Toast.fire({
                                icon: 'error'
                                , title: 'Delete Faild.'
                            })
                            , setTimeout(function() {
                                (window.location.reload())
                            }.bind(this), 2000);
                    }
                })
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });
</script>
@endsection
