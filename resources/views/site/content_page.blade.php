<section>

        <div class="inner_wrapper">
            <div class="container">
                <h2>{{$title}}</h2>
                <div class="inner_section">
                    <div class="row">
                        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                            <img  class="delay-03s animated wow zoomIn" src="{{asset('img/'.$page->images)}}"/>
                        </div>
                        <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                            <div class=" delay-01s animated fadeInDown wow animated">
                                {!! $page->text !!}
                                <a href="{{route('main')}}" class="read_more2" style="color: blue;">Назад</a> </div>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
</section>