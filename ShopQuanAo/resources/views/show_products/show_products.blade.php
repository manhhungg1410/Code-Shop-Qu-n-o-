@extends('frontend.content')
@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Tìm kiếm" type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Sản phẩm</h3>
                            </div>
                            @foreach($lsTypeProducts as $type)
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">{{$type->name_type}}
                                    </a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            @foreach($type->details as $details)
                                            <a href="{{route('products',$details->id)}}" class="list-group-item list-group-item-action active">{{$details->details_name_type}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sắp xếp</span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                        <option data-display="Select">Nothing</option>
                                        <option value="1">Popularity</option>
                                        <option value="2">High Price → High Price</option>
                                        <option value="3">Low Price → High Price</option>
                                        <option value="4">Best Selling</option>
                                    </select>
                                </div>
                                <p>Số lượng sản phẩm:</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                       @foreach($list as $item)
                                            @php
                                                $sale_off = $item->sale_off;
                                                 $price_old = $item->price_old;
                                                $price_new = $price_old - (($price_old*$sale_off)/100);
                                            @endphp
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    @if($item->sale_off == 0)
                                                    <div class="type-lb">
                                                    </div>
                                                    @else
                                                        <div class="type-lb">
                                                            <p class="sale">Sale {{$item->sale_off}}%</p>
                                                        </div>
                                                    @endif
                                                    <img src="{{asset('frontend/images/img-pro-01.jpg')}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="{{route('show_details',$item->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{$item->name_product}}</h4>
                                                    @if($item->sale_off == 0)
                                                        <span>{{$price_old}}đ</span>
                                                    @else
                                                        <span style="color: red;">{{$price_new}}đ</span>
                                                        <del>{{$price_old}}đ</del>
                                                        @endif
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    </div>
                                </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
<div class="pagination">
{{$list->links("pagination::bootstrap-4")}}
</div>
    <style>
        .pagination{
            margin: 0 auto;
            width: 20%;
        }

    </style>


@endsection
