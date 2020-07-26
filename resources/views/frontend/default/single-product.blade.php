@extends('frontend.default.master')
@section('content')
    <div id="single-product">
        <div class="container">

            <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">

                    <div id="owl-single-product">
                        @forelse($product->attachments as $key => $file)
                            <div class="single-product-gallery-item" id="slide-{{ $key }}">
                                @if (file_exists(public_path(get_thumbnail("uploads/" . $file->path, '_450x337'))))
                                    <a data-rel="prettyphoto" href="{{ asset('uploads/' . get_thumbnail($file->path, '_450x337')) }}">
                                        <img class="img-responsive" alt=""
                                             src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                             data-echo="{{ asset('uploads/' . get_thumbnail($file->path, '_450x337')) }}"/>
                                    </a>
                                @else
                                    <img src="{{ asset('images/no_image.jpg') }}" alt="No Image" class="img-responsive img-thumbnail">
                                @endif
                            </div><!-- /.single-product-gallery-item -->
                        @empty
                            <div class="single-product-gallery-item" id="slide0">
                                @if (!empty($product->image) && file_exists(public_path(get_thumbnail("uploads/$product->image"))))
                                    <a data-rel="prettyphoto" href="{{ asset('uploads/' . get_thumbnail($product->image, '_450x337')) }}">
                                        <img class="img-responsive" alt=""
                                             src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                             data-echo="{{ asset('uploads/' . get_thumbnail($product->image, '_450x337')) }}"/>
                                    </a>
                                @else
                                    <img src="{{ asset('images/no_image.jpg') }}" alt="No Image" class="img-responsive img-thumbnail">
                                @endif
                            </div>
                        @endforelse
                    </div><!-- /.single-product-slider -->


                    <div class="single-product-gallery-thumbs gallery-thumbs">

                        <div id="owl-single-product-thumbnails">
                            @forelse($product->attachments as $key => $file)
                                    @if (file_exists(public_path(get_thumbnail("uploads/" . $file->path, '_80x80'))))
                                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $key }}"
                                           href="#slide-{{ $key }}">
                                            <img class="img-responsive" alt=""
                                                 src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                                 data-echo="{{ asset('uploads/' . get_thumbnail($file->path, '_80x80')) }}"/>
                                        </a>
                                    @else
                                        <img src="{{ asset('images/no_image.jpg') }}" alt="No Image" class="img-responsive img-thumbnail">
                                    @endif
                            @empty
                            @endforelse

                        </div><!-- /#owl-single-product-thumbnails -->

                        <div class="nav-holder left hidden-xs">
                            <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails"
                               href="#prev"></a>
                        </div><!-- /.nav-holder -->

                        <div class="nav-holder right hidden-xs">
                            <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails"
                               href="#next"></a>
                        </div><!-- /.nav-holder -->

                    </div><!-- /.gallery-thumbs -->

                </div><!-- /.single-product-gallery -->
            </div><!-- /.gallery-holder -->
            <div class="no-margin col-xs-12 col-sm-7 body-holder">
                <div class="body">
                    <div class="star-holder inline">
                        <div class="star" data-score="4"></div>
                    </div>
                    <div class="availability"><label>Availability:</label><span class="available">  in stock</span>
                    </div>

                    <div class="title"><a href="#">{{ $product->name }}</a></div>
                    <div class="brand">{{ $product->code }}</div>

                    <div class="social-row">
                        <span class="st_facebook_hcount"></span>
                        <span class="st_twitter_hcount"></span>
                        <span class="st_pinterest_hcount"></span>
                    </div>

                    <div class="buttons-holder">
                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                    </div>

                    {{--                    <div class="excerpt">--}}
                    {{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ornare turpis non risus--}}
                    {{--                            semper dapibus. Quisque eu vehicula turpis. Donec sodales lacinia eros, sit amet auctor--}}
                    {{--                            tellus volutpat non.</p>--}}
                    {{--                    </div>--}}

                    <div class="prices">
                        <div class="price-current">{{ number_format($product->sale_price, 0, ',', '.') }} VND</div>
                        <div class="price-prev">{{ number_format($product->regular_price, 0, ',', '.') }} VND</div>
                    </div>

                    <div class="qnt-holder">
                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#reduce"></a>
                                <input name="quantity" readonly="readonly" type="text" value="1"/>
                                <a class="plus" href="#add"></a>
                            </form>
                        </div>
                        <a id="addto-cart" href="{{ route('frontend.home.cart') }}" class="le-button huge">add to cart</a>
                    </div><!-- /.qnt-holder -->
                </div><!-- /.body -->

            </div><!-- /.body-holder -->
        </div><!-- /.container -->
    </div><!-- /.single-product -->

    <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
    <section id="single-product-tab">
        <div class="container">
            <div class="tab-holder">

                <ul class="nav nav-tabs simple">
                    <li class="active"><a href="#description" data-toggle="tab">Mô tả</a></li>
                    <li><a href="#additional-info" data-toggle="tab">Thông tin thêm</a></li>
                    <li><a href="#reviews" data-toggle="tab">Đánh giá (3)</a></li>
                </ul><!-- /.nav-tabs -->

                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        <p>{!! $product->content !!}</p>
                        <div class="meta-row">
                            <div class="inline">
                                <label>Code:</label>
                                <span>{{ $product->code }}</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>Categories:</label>
                                <span><a href="#">{{ $product->category->name }}</a>,</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>Tag:</label>
                                @forelse($product->tags as $tag)
                                    <span><a href="#">{{ $tag->name }}</a>,</span>
                                @empty
                                @endforelse

                            </div><!-- /.inline -->
                        </div><!-- /.meta-row -->
                    </div><!-- /.tab-pane #description -->

                    <div class="tab-pane" id="additional-info">
                        <ul class="tabled-data">
                            @php
                                $product->attributes = json_decode($product->attributes);
                                if (!$product->attributes) {
                                    $product->attributes = [];
                                }
                            @endphp
                            @forelse($product->attributes as $attribute)
                                <li>
                                    <label>{{ $attribute->name }}</label>
                                    <div class="value">{{ $attribute->value }}</div>
                                </li>
                            @empty
                            @endforelse
                        </ul><!-- /.tabled-data -->

                        <div class="meta-row">
                            <div class="inline">
                                <label>Code:</label>
                                <span>{{ $product->code }}</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>Categories:</label>
                                <span><a href="#">{{ $product->category->name }}</a>,</span>
                            </div><!-- /.inline -->

                            <span class="seperator">/</span>

                            <div class="inline">
                                <label>Tag:</label>
                                @forelse($product->tags as $tag)
                                    <span><a href="#">{{ $tag->name }}</a>,</span>
                                @empty
                                @endforelse

                            </div><!-- /.inline -->
                        </div><!-- /.meta-row -->
                    </div><!-- /.tab-pane #additional-info -->


                    <div class="tab-pane" id="reviews">
                        <div class="comments">
                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar"
                                                 src="{{ asset('themes/default/assets/images/default-avatar.jpg') }}">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">John Smith</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="4"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis.
                                                Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien.
                                                Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->

                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar"
                                                 src="{{ asset('themes/default/assets/images/default-avatar.jpg') }}">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">Jane Smith</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="5"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis.
                                                Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien.
                                                Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->

                            <div class="comment-item">
                                <div class="row no-margin">
                                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                        <div class="avatar">
                                            <img alt="avatar"
                                                 src="{{ asset('themes/default/assets/images/default-avatar.jpg') }}">
                                        </div><!-- /.avatar -->
                                    </div><!-- /.col -->

                                    <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                        <div class="comment-body">
                                            <div class="meta-info">
                                                <div class="author inline">
                                                    <a href="#" class="bold">John Doe</a>
                                                </div>
                                                <div class="star-holder inline">
                                                    <div class="star" data-score="3"></div>
                                                </div>
                                                <div class="date inline pull-right">
                                                    12.07.2013
                                                </div>
                                            </div><!-- /.meta-info -->
                                            <p class="comment-text">
                                                Integer id purus ultricies nunc tincidunt congue vitae nec felis.
                                                Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien.
                                                Vestibulum egestas interdum tellus id venenatis.
                                            </p><!-- /.comment-text -->
                                        </div><!-- /.comment-body -->

                                    </div><!-- /.col -->

                                </div><!-- /.row -->
                            </div><!-- /.comment-item -->
                        </div><!-- /.comments -->

                        <div class="add-review row">
                            <div class="col-sm-8 col-xs-12">
                                <div class="new-review-form">
                                    <h2>Add review</h2>
                                    <form id="contact-form" class="contact-form" method="post">
                                        <div class="row field-row">
                                            <div class="col-xs-12 col-sm-6">
                                                <label>name*</label>
                                                <input class="le-input">
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <label>email*</label>
                                                <input class="le-input">
                                            </div>
                                        </div><!-- /.field-row -->

                                        <div class="field-row star-row">
                                            <label>your rating</label>
                                            <div class="star-holder">
                                                <div class="star big" data-score="0"></div>
                                            </div>
                                        </div><!-- /.field-row -->

                                        <div class="field-row">
                                            <label>your review</label>
                                            <textarea rows="8" class="le-input"></textarea>
                                        </div><!-- /.field-row -->

                                        <div class="buttons-holder">
                                            <button type="submit" class="le-button huge">submit</button>
                                        </div><!-- /.buttons-holder -->
                                    </form><!-- /.contact-form -->
                                </div><!-- /.new-review-form -->
                            </div><!-- /.col -->
                        </div><!-- /.add-review -->

                    </div><!-- /.tab-pane #reviews -->
                </div><!-- /.tab-content -->

            </div><!-- /.tab-holder -->
        </div><!-- /.container -->
    </section><!-- /#single-product-tab -->
    <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->
    <!-- ========================================= RECENTLY VIEWED ========================================= -->
    <section id="recently-reviewd" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder hover">

                <div class="title-nav">
                    <h2 class="h1">Recently Viewed</h2>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-recently-viewed"
                           class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-recently-viewed"
                           class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                    <div class="no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            <div class="ribbon red"><span>sale</span></div>
                            <div class="image">
                                <img alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                     data-echo="{{ asset('themes/default/assets/images/products/product-11.jpg') }}"/>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="single-product.blade.php">LC-70UD1U 70" class aquos 4K ultra HD</a>
                                </div>
                                <div class="brand">Sharp</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">$1199.00</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.blade.php" class="le-button">Add to Cart</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                    <a class="btn-add-to-compare" href="#">Compare</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->

                    <div class="no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            <div class="ribbon blue"><span>new!</span></div>
                            <div class="image">
                                <img alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                     data-echo="{{ asset('themes/default/assets/images/products/product-12.jpg') }}"/>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="single-product.blade.php">cinemizer OLED 3D virtual reality TV Video</a>
                                </div>
                                <div class="brand">zeiss</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">$1199.00</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.blade.php" class="le-button">Add to cart</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                    <a class="btn-add-to-compare" href="#">Compare</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->

                    <div class=" no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">

                            <div class="image">
                                <img alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                     data-echo="{{ asset('themes/default/assets/images/products/product-13.jpg') }}"/>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="single-product.blade.php">s2340T23" full HD multi-Touch Monitor</a>
                                </div>
                                <div class="brand">dell</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">$1199.00</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.blade.php" class="le-button">Add to cart</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                    <a class="btn-add-to-compare" href="#">Compare</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->

                    <div class=" no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            <div class="ribbon blue"><span>new!</span></div>
                            <div class="image">
                                <img alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                     data-echo="{{ asset('themes/default/assets/images/products/product-14.jpg') }}"/>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="single-product.blade.php">kardon BDS 7772/120 integrated 3D</a>
                                </div>
                                <div class="brand">harman</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">$1199.00</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.blade.php" class="le-button">Add to cart</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                    <a class="btn-add-to-compare" href="#">Compare</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->

                    <div class=" no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            <div class="ribbon green"><span>bestseller</span></div>
                            <div class="image">
                                <img alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                     data-echo="{{ asset('themes/default/assets/images/products/product-15.jpg') }}"/>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="single-product.blade.php">netbook acer travel B113-E-10072</a>
                                </div>
                                <div class="brand">acer</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">$1199.00</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.blade.php" class="le-button">Add to cart</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                    <a class="btn-add-to-compare" href="#">Compare</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->

                    <div class=" no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">

                            <div class="image">
                                <img alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                     data-echo="{{ asset('themes/default/assets/images/products/product-16.jpg') }}"/>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="single-product.blade.php">iPod touch 5th generation,64GB, blue</a>
                                </div>
                                <div class="brand">apple</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">$1199.00</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.blade.php" class="le-button">Add to cart</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                    <a class="btn-add-to-compare" href="#">Compare</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->

                    <div class=" no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">

                            <div class="image">
                                <img alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                     data-echo="{{ asset('themes/default/assets/images/products/product-13.jpg') }}"/>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="single-product.blade.php">s2340T23" full HD multi-Touch Monitor</a>
                                </div>
                                <div class="brand">dell</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">$1199.00</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.blade.php" class="le-button">Add to cart</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                    <a class="btn-add-to-compare" href="#">Compare</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->

                    <div class=" no-margin carousel-item product-item-holder size-small hover">
                        <div class="product-item">
                            <div class="ribbon blue"><span>new!</span></div>
                            <div class="image">
                                <img alt="" src="{{ asset('themes/default/assets/images/blank.gif') }}"
                                     data-echo="{{ asset('themes/default/assets/images/products/product-14.jpg') }}"/>
                            </div>
                            <div class="body">
                                <div class="title">
                                    <a href="single-product.blade.php">kardon BDS 7772/120 integrated 3D</a>
                                </div>
                                <div class="brand">harman</div>
                            </div>
                            <div class="prices">
                                <div class="price-current text-right">$1199.00</div>
                            </div>
                            <div class="hover-area">
                                <div class="add-cart-button">
                                    <a href="single-product.blade.php" class="le-button">Add to cart</a>
                                </div>
                                <div class="wish-compare">
                                    <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                    <a class="btn-add-to-compare" href="#">Compare</a>
                                </div>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.product-item-holder -->
                </div><!-- /#recently-carousel -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#recently-reviewd -->
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->
@endsection