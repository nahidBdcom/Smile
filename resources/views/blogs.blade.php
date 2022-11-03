@extends('layouts.smile.master')

@section('seo_meta')

        <title>{{ $mainContent["seo_titlle"] }}</title>
        <meta name="description" content="{{ $mainContent["meta_description"] }}">
        <meta name="keywords" content="{{ $mainContent["meta_keyword"] }}">
@endsection     

@section('social_media_meta')

        @include('partials.social_media_meta')
@endsection     



@section('additional-style')
@endsection



@section('content')
        <div class="container-fluid smile-content-title d-flex align-items-center justify-content-center">
                <div class="row">
                        <div class="col-12">{{ $mainContent["title"] }}</div>
                </div>
        </div>
        @include('partials.blog_search')
        <div class="container s-pt-50">
            <div class="row">
                <div class="col-12 col-md-4 cat-filter-block">
                    <select class="form-select"  id="cat-filter-select" name="cat" placeholder="Select category">
                        <option value="0">All</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-12 col-md-4 blog-sort-block">
                    <select class="form-select"  id="blog-sort-select" name="sort" placeholder="Sort by">
                        @foreach ($sort_options as $optionsKey => $optionsValue)
                        <option value="{{$optionsKey}}" {{$optionsKey=="CDD"?"selected":""}} >{{$optionsValue}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>

        <div class="container s-p-50">
            <div class="row blogsRow">
                @foreach($blogs as $blog)
                <div class="col-12 col-md-4 s-pb-25 filter cat-0 cat-{{ $blog->category_id }} " data-date="{{$blog->created_at}}" data-title="{{$blog->title}}">
                    <a href="{{ url("/blog/". $blog->slug) }}">
                        <img src="{{ asset( "/storage/". $blog->image ) }}" class="rounded" style="width:100%;">
                        <span class="blog-title">{{ $blog->title }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
@endsection      



@section('additional-javascripts')

    <script language="javascript">

        $(document).ready(function() {
            var $blogsRow =$('.blogsRow');
            var $categoryFilter =$('#cat-filter-select');
            var $blogSort =$('#blog-sort-select');

            $categoryFilter.on("change", function (e) { 
                var categoryValue = $(this).val();

                if(categoryValue==0) {
                    $('.filter').show(1000);
                }else{
                    $(".filter").not('.cat-'+categoryValue).hide('3000');
                    $('.filter').filter('.cat-'+categoryValue).show('3000');
                }
            });  

            function getSortedAscending(selector, attrName) {
                return $($(selector).toArray().sort(function(a, b){
                    var aVal = a.getAttribute(attrName),
                        bVal = b.getAttribute(attrName);
                    return aVal > bVal ? 1 : -1;
                }));
            }

            function getSortedDscending(selector, attrName) {
                
                return $($(selector).toArray().sort(function(a, b){
                    
                    var aVal = a.getAttribute(attrName),
                        bVal = b.getAttribute(attrName);
                        
                    return aVal < bVal ? 1 : -1;
                }));
            }

            $blogSort.on("change", function (e) { 
                var sortValue = $(this).val();
                
                if(sortValue =="titleA"){
                    $blogsRow.html(getSortedAscending('.filter', 'data-title'));
                }else if(sortValue =="titleD"){
                    $blogsRow.html(getSortedDscending('.filter', 'data-title'));
                }else if(sortValue =="CDA"){
                    $blogsRow.html(getSortedAscending('.filter', 'data-date'));
                }else if(sortValue =="CDD"){
                    $blogsRow.html(getSortedDscending('.filter', 'data-date'));
                }
                //$('body').append($blogsRow);
            });

            



        });          

    </script>
@endsection      
