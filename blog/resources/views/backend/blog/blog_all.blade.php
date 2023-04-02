@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Blog</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Blog</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		                    <a href="{{ route('blog.add') }}" class="btn btn-primary">Add Blog</a> 				 
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				 
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Name </th>
                                        <th>Blog Title </th>
                                        <th>Blog Thumbnail </th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>

                            <tbody>
                            @foreach($blogs as $key => $item)		
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td>{{ $item['category']['category_name']}}</td> 
                                    <td>{{ $item->blog_title }}</td>  
                                    <td> <img src="{{ asset($item->blog_thumbnail) }}" style="width: 70px; height:40px;">  </td>                                    
                                    <td>
                                        <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('blog.delete', $item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
                                    </td> 
                                </tr>
                            @endforeach
                            </tbody>

                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Name </th>
                                        <th>Blog Title </th>
                                        <th>Blog Thumbnail </th>
                                        <th>Action</th> 
                                    </tr>
                                </tfoot>

                            </table>
						</div>
					</div>
				</div>
			</div>




@endsection