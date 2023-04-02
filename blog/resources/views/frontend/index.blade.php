@extends('frontend.master_dashboard')
@section('frontend')

@php
    $blogs = App\Models\Blog::orderBy('blog_title','ASC')->get();
@endphp

                @foreach($blogs as $item)
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="{{ url('blog/details/'. $item->id) }}" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{ asset($item->blog_thumbnail) }}" alt="Image" class="img-fluid">                            
                        </div>
                        <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{ $item->blog_title }}</h2>
                    </a>                    
                    <p class="tm-pt-30">
                        {{ $item->short_description }}
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">{{ $item['category']['category_name'] }}</span>
                    </div>
                    <hr>
                    
                </article>
                @endforeach
@endsection