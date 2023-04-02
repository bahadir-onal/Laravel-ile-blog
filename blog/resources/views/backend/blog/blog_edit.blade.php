@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit Category </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Category </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
				 
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                    <form id="myForm" method="post" action="{{ route('blog.update') }}" enctype="multipart/form-data" >
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $blogs->id }}" />
                                        <input type="hidden" name="old_image" value="{{ $blogs->blog_thumbnail }}" />

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Category</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <select name="category_id" class="form-select" id="inputVendor">
                                                    <option></option>
                                                    @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}" {{ $cat->id == $blogs->category_id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Blog Title</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <input type="text" name="blog_title" value="{{ $blogs->blog_title }}" class="form-control"   />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Blog Short Description</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <textarea name="short_description" class="form-control" id="inputProductDescription" rows="3">{{ $blogs->short_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Long Description</h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <textarea id="mytextarea" name="long_description">{{ $blogs->long_description }} </textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Blog Thumbnail </h6>
                                            </div>
                                            <div class="form-group col-sm-9 text-secondary">
                                                <input type="file" name="blog_thumbnail" class="form-control"  id="image"   />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0"> </h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <img id="showImage" src="{{ asset($blogs->blog_thumbnail) }}" alt="Admin" style="width:100px; height: 100px;"  >
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
        
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#image').change(function(e){
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('#showImage').attr('src',e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                    });
                });
            </script>

@endsection