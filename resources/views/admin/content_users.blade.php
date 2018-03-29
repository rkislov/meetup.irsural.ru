<div style="margin:0px 50px 0px 50px;">
    @if( Auth::user()->role =="admin")
    {!! Html::link(route('usersAdd'),'Добавить',['class'=>'btn btn-default']) !!}
    @endif
    @if($users)
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Email</th>
                @if( Auth::user()->role =="admin")
                <th>Роль</th>
                @endif
                <th>Дата создания</th>
                @if( Auth::user()->role =="admin")
                <th>Удалить</th>
                @endif


            </tr>
            </thead>
            <tbody>
            @foreach ($users as $k => $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        @if ( Auth::user()->role =="admin" )
                        <a href="{{route('usersEdit',($user->id))}}">{{$user->name}}</a>
                            @if(Auth::user()->id == $user->id)
                                <span style="background: skyblue; color: #1d2124">
                                        <a href="{{route('changePassword',['user'=>$user->id])}}">обновить пароль</a>
                                    </span>
                            @endif

                        @else
                            {{$user->name}}
                            @if(Auth::user()->id == $user->id)
                                    <span style="background: skyblue; color: #1d2124">
                                        <a href="{{route('changePassword',['user'=>$user->id])}}">обновить пароль</a>
                                    </span>
                                @endif
                            @endif
                    </td>
                    <td>{{$user->email}}</td>
                    @if( Auth::user()->role =="admin")
                    <td>{{$user->role}}</td>
                    @endif
                    <td>{{$user->created_at}}</td>
                    @if( Auth::user()->role =="admin")
                    <td>

                    {!! Form::open(['url'=>route('usersEdit',($user->id)), 'class'=>'form-horisontal','method'=>'POST']) !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
                        {!! Form::close() !!}

                    </td>
                    @endif
                </tr>

            @endforeach
            </tbody>

        </table>

    @endif

</div>