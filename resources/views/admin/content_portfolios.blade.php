<div style="margin:0px 50px 0px 50px;">
    {!! Html::link(route('portfoliosAdd'),'Добавить',['class'=>'btn btn-primary']) !!}
    @if($portfolios)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Фильтр</th>
                <th>Пользователь</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($portfolios as $k => $portfolio)
                <tr>
                    <td>{{$portfolio->id}}</td>
                    <td>
                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $portfolio->user['id']) )
                        <a href="{{route('portfoliosEdit',($portfolio->id))}}">{{$portfolio->name}}</a>
                        @else
                            {{$portfolio->name}}
                        @endif
                    </td>
                    <td>{{$portfolio->filter}}</td>
                    <td>{{$portfolio->user['name']}}</td>
                    <td>{{$portfolio->created_at}}</td>
                    <td>
                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $portfolio->user['id']) )
                    {!! Form::open(['url'=>route('portfoliosEdit',($portfolio->id)), 'class'=>'form-horisontal','method'=>'POST']) !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>

            @endforeach
            </tbody>

        </table>

    @endif

</div>