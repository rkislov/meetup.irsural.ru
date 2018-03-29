<div style="margin:0px 50px 0px 50px;">
    {!! Html::link(route('servicesAdd'),'Добавить',['class'=>'btn btn-primary']) !!}
    @if($services)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Текст</th>
                <th>Абривиатура</th>
                <th>Пользователь</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($services as $k => $service)
                <tr>
                    <td>{{$service->id}}</td>
                    <td>
                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $service->user['id']) )
                        <a href="{{route('servicesEdit',($service->id))}}">{{$service->name}}</a>
                        @else
                        {{$service->name}}
                    @endif
                    </td>

                    <td>{!! $service->text !!}</td>
                    <td>{{$service->icon}}</td>
                    <td>{{$service->user['name']}}</td>
                    <td>{{$service->created_at}}</td>
                    <td>
                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $service->user['id']) )
                    {!! Form::open(['url'=>route('servicesEdit',($service->id)), 'class'=>'form-horisontal','method'=>'POST']) !!}
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