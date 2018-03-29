<div class="content portfolio_title">
    <div class="section-title">
        <h2>{{$title}}</h2>

    </div>
</div>

<div class="portfolio">
<div id="filters" class="sixteen columns">
    <ul style="padding:0px 0px 0px 0px">
       <li><a href="{{route('pages')}}">
               <h5>Страницы</h5></a>
       </li>
        <li><a href="{{route('portfolios')}}">
                <h5>Доклады</h5></a>
        </li>
        <li><a href="{{route('services')}}">
                <h5>Стенды</h5></a>
        </li>
        <li><a href="{{route('peoples')}}">
                <h5>Люди</h5></a>
        </li>
        <li><a href="{{route('partners')}}">
                <h5>Партнеры</h5></a>
        </li>
        <li><a href="{{route('registered')}}">
                <h5>Зарегистрированные</h5></a>
        </li>

        <li><a href="{{route('users')}}">
                <h5>Пользователи</h5></a>
        </li>

        <li>
            <span><a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
            {{ __('Выход') }}
</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </span>
        </li>
    </ul>
</div>
</div>