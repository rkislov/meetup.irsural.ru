<div style="margin:0px 50px 0px 50px;">
    {!! Html::link(route('pagesAdd'),'Новая страница',['class'=>'btn btn-default']) !!}
    @if($pages)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Псевдоним</th>
                <th>Текст</th>
                <th>Пользователь</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($pages as $k => $page)
                <tr>
                    <td>{{$page->id}}</td>
                    <td>
                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $page->user['id']) )
                        <a href="{{route('pagesEdit',($page->id))}}">{{$page->name}}</a>
                        @else
                       {{$page->name}}
                        @endif
                    </td>
                    <td>{{ $page->alias }}</td>
                    <td>{{ $page->text }}</td>
                    <td>{{ $page->user['name']}}</td>
                    <td>{{$page->created_at}}</td>
                    <td>

                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $page->user['id']) )
                    {!! Form::open(['url'=>route('pagesEdit',($page->id)), 'class'=>'form-horisontal','method'=>'POST']) !!}
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