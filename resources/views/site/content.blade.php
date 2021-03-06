@if(isset($pages) && is_object($pages))

    @foreach($pages as $k=>$page)
        @if($k%2 == 0)
            <section id="{{$page->alias}}" class="top_cont_outer">
                <div class="hero_wrapper">
                    <div class="container">
                        <div class="hero_section">
                            <div class="row">
                                <div class="col-lg-5 col-sm-7">
                                    <div class="top_left_cont img-circle zoomIn wow animated">
                                        {!! $page->text !!}
                                        <a href="{{ route('page',array('alias'=>$page->alias))}}" class="read_more2">Читать</a> </div>
                                </div>
                                <div class="col-lg-7   col-sm-5">
                                    <img  class="img-circle delay-03s animated wow zoomIn" src="img/{{$page->images}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section id="{{$page->alias}}"><!--Aboutus-->
                <div class="inner_wrapper">
                    <div class="container">
                        <h2>{{$page->name}}</h2>
                        <div class="inner_section">
                            <div class="row">
                                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                                    <img  class="delay-03s animated wow zoomIn" src="img/{{$page->images}}"/>
                                </div>
                                <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                                    <div class=" delay-01s animated fadeInDown wow animated">
                                        {!! $page->text !!}
                                    </div>
                                    <div class="work_bottom"> <span>Хочешь узнать подробнее......</span> <a href="{{route('page',[$page->alias])}}" class="contact_btn">Читать</a> </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </section>
        @endif





    @endforeach
@endif
<!--Aboutus-->


<!--Service-->
@if(isset($services) && is_object($services))
    <section  id="services">
        <div class="container">
            <h2>Стенды</h2>
            <div class="service_wrapper">
                @foreach($services as $k=>$service)
                    @if($k==0 || $k%3 == 0)
                        <div class="row {{($k !=0) ? ' borderTop': '' }}">
                            @endif
                            <div class="col-lg-4 {{($k%3 >0) ? 'borderLeft': ''}} {{ ($k>2) ? 'mrgTop':'' }}">
                                <div class="service_block">
                                    <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa">{{$service->icon}}</i></span> </div>
                                    <h3 class="animated fadeInUp wow">{{$service->name}}</h3>
                                    <p class="animated fadeInDown wow">{!! $service->text !!}</p>
                                </div>
                            </div>
                            @if(($k+1)%3 ==0)
                        </div>
                            @endif



                @endforeach


            </div>
        </div>
    </section>
@endif



<!--Service-->




<!-- Portfolio -->
@if(isset($portfolios) && is_object($portfolios))
    <section id="portfolio" class="content">

        <!-- Container -->
        <div class="container portfolio_title">

            <!-- Title -->
            <div class="section-title">
                <h2>Доклады</h2>
            </div>
            <!--/Title -->

        </div>
        <!-- Container -->

        <div class="portfolio-top"></div>

        <!-- Portfolio Filters -->
        <div class="portfolio">

            @if(isset($tags))
                <div id="filters" class="sixteen columns">
                    <ul class="clearfix">
                        <li><a id="all" href="#" data-filter="*" class="active">
                                <h5>All</h5>
                            </a></li>
                        @foreach($tags as $tag)
                            <li><a class="" href="#" data-filter=".{{$tag}}">
                                    <h5>{{$tag}}</h5>
                                </a></li>
                        @endforeach


                    </ul>
                </div>

            @endif


            <!--/Portfolio Filters -->

            <!-- Portfolio Wrapper -->
            <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">
                <!-- Portfolio Item -->
            @foreach($portfolios as $portfolio)

                    <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{$portfolio->filter}} isotope-item">
                        <div class="portfolio_img"> <img src="img/{{$portfolio->images}}"  alt="{{$portfolio->name}}" ></div>
                        <div class="item_overlay">
                            <div class="item_info">
                                <h4 class="project_name">{{$portfolio->name}}</h4>
                            </div>
                        </div>
                    </div>

            @endforeach


                <!--/Portfolio Item -->


            </div>
            <!--/Portfolio Wrapper -->

        </div>
        <!--/Portfolio Filters -->

        <div class="portfolio_btm"></div>


        <div id="project_container">
            <div class="clear"></div>
            <div id="project_data"></div>
        </div>


    </section>


@endif

<!--/Portfolio -->

<section class="page_section" id="partners"><!--page_section-->
    @if($partners)
    <h2>Партнеры</h2>
    <!--page_section-->
    <div class="client_logos"><!--client_logos-->
        <div class="container">
            <ul class="fadeInRight animated wow">
                @foreach($partners as $partner)
                <li><a href="{{$partner->href}}"><img src="img/{{$partner->images}}" alt="{{$partner->name}}"></a></li>
                @endforeach
                {{--<li><a href="javascript:void(0)"><img src="img/client_logo2.png" alt=""></a></li>--}}
                {{--<li><a href="javascript:void(0)"><img src="img/client_logo3.png" alt=""></a></li>--}}
                {{--<li><a href="javascript:void(0)"><img src="img/client_logo5.png" alt=""></a></li>--}}
            </ul>
        </div>
    </div>
</section>
@endif
<!--client_logos-->

@if(isset($peoples) && is_object($peoples))
    <section class="page_section team" id="team"><!--main-section team-start-->
        <div class="container">
            <h2>Люди</h2>
            <h6></h6>
            <div class="team_section clearfix">
                @foreach($peoples as $k=>$people)
                    <div class="team_area">
                        <div class="team_box wow fadeInDown delay-0{{$k*3+3}}s">
                            {{--<div class="team_box_shadow"><a href="javascript:void(0)"></a></div>--}}
                            <img src="img/{{$people->images}}" alt="{{$people->name}}" width=300 height=300>
                            {{--<ul>--}}
                            {{--<li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>--}}
                            {{--<li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>--}}
                            {{--<li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>--}}
                            {{--<li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>--}}
                            {{--</ul>--}}
                        </div>
                        <h3 class="wow fadeInDown delay-0{{$k*3+3}}s">{{$people->name}}</h3>
                        <span class="wow fadeInDown delay-0{{$k*3+3}}s">{{$people->position}}</span>
                        <p class="wow fadeInDown delay-0{{$k*3+3}}s">{!! $people->text !!}</p>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

@endif

<!--/Team-->
<!--Footer-->
<footer class="footer_wrapper" id="contact">
    <div class="container">
        <section class="page_section contact" id="contact">
            <div class="contact_section">
                <h2>Регистрация</h2>
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 wow fadeInLeft">
                    <div class="contact_info">
                        <div class="detail">
                            <h4>ООО "Институт Радиоэлектронных систем"</h4>
                            <p>620137, г.Екатеринбург, ул. Июльская д.41</p>
                        </div>
                        <div class="detail">
                            <h4>Телефон</h4>
                            <p>8 (343) 374-24-64</p>
                        </div>
                        <div class="detail">
                            <h4>Email</h4>
                            <p>zi@irsural.ru</p>
                        </div>
                    </div>



                    {{--<ul class="social_links">--}}
                        {{--<li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>--}}
                        {{--<li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>--}}
                        {{--<li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>--}}
                        {{--<li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-lg-8 wow fadeInLeft delay-06s">
                    <div class="form">
                      <form action="{{route('main')}}" method="post">
                          {{ csrf_field() }}
                        <input class="input-text" type="text" name="name" value="Ф.И.О." onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                        <input class="input-text" type="text" name="organisation" value="Организация" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
                        <input class="input-text" type="text" name="email" value="Ваш e-mail" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">


                        <input class="input-btn" type="submit" value="Регистрация">
                      </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="footer_bottom"><span>© ООО "ИРС" 2018
                {{--Образец предоставлен <a href="http://webthemez.com">WebThemez.com</a>.--}}
            </span> </div>
    </div>
</footer>