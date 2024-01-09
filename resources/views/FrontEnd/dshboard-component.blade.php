<main id="main">
    <div class="container">
        <!--DashBoard-->
        <h1 style="font-size: 40px;color: black; font-weight:bold;">DashBoard</h1>
        <div class="values">
            <div class="val-Box">
                <i class="fas fa-users"aria-hidden="true"></i>
                <div>
                    <h3>{{$users->count()}}</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="val-Box">
                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                <div>
                    <h3>{{$orders->count()}}</h3>
                    <span>Total Orders</span>
                </div>
            </div>
            <div class="val-Box">
                <i class="fas fa-dollar"aria-hidden="true"></i>
                <div>
                    <h3>${{$orders->sum('total')}}</h3>
                    <span>Total Profits</span>
                </div>
            </div>
            <div class="val-Box">
                <i class="fas fa-cloud"aria-hidden="true"></i>
                <div>
                    <h3>{{$ordersItems->count()}}</h3>
                    <span>Products Sell</span>
                </div>
            </div>

        </div> <!--end dashboard-->
        <h1 style="font-size: 40px;color: black; font-weight:bold; text-align: center;">Users</h1>
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @endif
        @if(Session::has('danger'))
            <div class="alert alert-danger" role="alert">{{Session::get('danger')}}</div>
        @endif
        <dir class="board">
            <table width="100%">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                     @foreach($users as $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['first_name']}}</td>
                        <td>{{$user['last_name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td><a href={{"deleteUser/".$user['id']}}> <i class="fa fa-times fa-2x  text-danger"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </dir>



        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">On Sale</h3>
            <div class="wrap-countdown mercado-countdown" data-expire="2022/12/12 12:34:56"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                @foreach($popular_products as $p_product)
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{route('product.details',['slug'=>$p_product->slug])}}" title="{{$p_product->name}}">
                                <figure><img src="{{asset('assets/images/products')}}/{{$p_product->image}}" width="800" height="800" alt="{{$p_product->name}}"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="{{route('product.details',['slug'=>$p_product->slug])}}" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>{{$p_product->name}}</span></a>
                            <div class="wrap-price"><span class="product-price">${{$p_product->regular_price}}</span></div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Latest Products</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{asset('assets/images/digital-electronic-banner.jpg')}}" width="1170" height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                                @foreach($latest_products as $l_product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('product.details',['slug'=>$l_product->slug])}}" title="{{$l_product->name}}">
                                                <figure><img src="{{asset('assets/images/products')}}/{{$l_product->image}}" width="800" height="800" alt="{{$l_product->name}}"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{route('product.details',['slug'=>$l_product->slug])}}" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>{{$l_product->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">${{$l_product->regular_price}}</span></div>
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








</main>
