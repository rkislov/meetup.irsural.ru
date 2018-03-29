<div style="margin:0px 50px 0px 50px;">
    {!! Html::link(route('partnersAdd'),'Добавить',['class'=>'btn btn-default']) !!}
    @if($partners)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Ссылка</th>
                <th>Пользователь</th>
                <th>Дата создания</th>

                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($partners as $k => $partner)
                <tr>
                    <td>{{$partner->id}}</td>
                    <td>
                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $partner->user['id']) )
                        <a href="{{route('partnersEdit',($partner->id))}}">{{$partner->name}}</a>
                        @else
                           {{$partner->name}}
                        @endif
                    </td>
                    <td>{{$partner->href}}</td>
                    <td>{{$partner->user['name']}}</td>
                    <td>{{$partner->created_at}}</td>
                    <td>
                        @if ( (Auth::user()->role =="admin") || (Auth::user()->id == $partner->user['id']) )
                    {!! Form::open(['url'=>route('partnersEdit',($partner->id)), 'class'=>'form-horisontal','method'=>'POST']) !!}
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