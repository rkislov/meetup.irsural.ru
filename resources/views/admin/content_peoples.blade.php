<div style="margin:0px 50px 0px 50px;">
    {!! Html::link(route('peoplesAdd'),'Новая страница',['class'=>'btn btn-default']) !!}
    @if($peoples)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Ф.И.О.</th>
                <th>Организация</th>
                <th>Текст</th>
                <th>Пользователь</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($peoples as $k => $people)
                <tr>
                    <td>{{$people->id}}</td>
                    <td>
                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $people->user['id']) )
                        <a href="{{route('peoplesEdit',($people->id))}}">{{$people->name}}</a>
                        @else
                            {{$people->name}}
                            @endif
                    </td>
                    <td>{{$people->position}}</td>
                    <td>{{ $people->text }}</td>
                    <td>{{ $people->user['name'] }}</td>
                    <td>{{$people->created_at}}</td>
                    <td>

                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $people->user['id']) )
                    {!! Form::open(['url'=>route('peoplesEdit',($people->id)), 'class'=>'form-horisontal','method'=>'POST']) !!}
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