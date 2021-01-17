@extends('layout')
@section('content')

<!--features_items-->
<div class="features_items">
   <h2 class="title text-center">Features Items</h2>
   <div class="col-sm-4">
      <div class="product-image-wrapper">
         <div class="single-products">
            <div class="productinfo text-center">
               <img src="{{('public/frontend/images/product1.jpg')}}" alt="" />
               <h2>$56</h2>
               <p>Easy Polo Black Edition</p>
               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
               <div class="overlay-content">
                  <h2>$56</h2>
                  <p>Easy Polo Black Edition</p>
                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
               </div>
            </div>
         </div>
         <div class="choose">
            <ul class="nav nav-pills nav-justified">
               <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
               <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!--features_items-->

<!--category-tab-->
<div class="category-tab">
   <div class="col-sm-12">
      <ul class="nav nav-tabs">
         <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
         <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
         <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
         <li><a href="#kids" data-toggle="tab">Kids</a></li>
         <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
      </ul>
   </div>
   <div class="tab-content">
      <div class="tab-pane fade active in" id="tshirt" >
         <div class="col-sm-3">
            <div class="product-image-wrapper">
               <div class="single-products">
                  <div class="productinfo text-center">
                     <img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
                     <h2>$56</h2>
                     <p>Easy Polo Black Edition</p>
                     <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane fade" id="blazers" >
         <div class="col-sm-3">
            <div class="product-image-wrapper">
               <div class="single-products">
                  <div class="productinfo text-center">
                     <img src="{{('public/frontend/images/gallery4.jpg')}}" alt="" />
                     <h2>$56</h2>
                     <p>Easy Polo Black Edition</p>
                     <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane fade" id="sunglass" >
         <div class="col-sm-3">
            <div class="product-image-wrapper">
               <div class="single-products">
                  <div class="productinfo text-center">
                     <img src="{{('public/frontend/images/gallery3.jpg')}}" alt="" />
                     <h2>$56</h2>
                     <p>Easy Polo Black Edition</p>
                     <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane fade" id="kids" >
         <div class="col-sm-3">
            <div class="product-image-wrapper">
               <div class="single-products">
                  <div class="productinfo text-center">
                     <img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
                     <h2>$56</h2>
                     <p>Easy Polo Black Edition</p>
                     <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tab-pane fade" id="poloshirt" >
         <div class="col-sm-3">
            <div class="product-image-wrapper">
               <div class="single-products">
                  <div class="productinfo text-center">
                     <img src="{{('public/frontend/images/gallery2.jpg')}}" alt="" />
                     <h2>$56</h2>
                     <p>Easy Polo Black Edition</p>
                     <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--/category-tab-->


@endsection