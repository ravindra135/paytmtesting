@extends('master.front') @section('title') {{$page->title}} @endsection @section('content') @include('front.common.page_tabs')
<!-- Page Title-->
<!-- Page Content-->
<div class="pt-6 pb-1 ">
  <div class="container ">
    <!-- Categories-->
    <div class="row">
      <div class="col-lg-10  offset-md-1 mb-2 mt-4">
        <div class="card">
          <div class="card-body page_id px-4">
            <h1 class="d-block text-center page_heading">
              <b>{{$page->title}}</b>
            </h1>
            <p class="text-center know">The smarter way to stay connected | Timesquartz
            </p>
            <br />
            <hr />
            <br />
            <br />
            <div class="d-page-content"> {!! $page->details !!} <br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> @endsection