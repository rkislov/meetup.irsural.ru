<div style="margin:0px 50px 0px 50px;">
    @if($registered)
        <table class="table table-hover table-striped">
            <thead>
            <tr>

                <th>Имя</th>
                <th>Организация</th>
                <th>Email</th>
                <th>Дата создания</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($registered as $k => $register)
                <tr>

                    <td>{{$register->name}}</td>
                    <td>{{$register->organisation}}</td>
                    <td>{{$register->email}}</td>
                    <td>{{$register->created_at}}</td>
                </tr>

            @endforeach
            </tbody>

        </table>

    @endif

</div>