<div class="wrapper container-fluid">
    <div class="col-lg-8 col-lg-offset-2 ">
        <form role="form" method="post" action="{{ route('changePassword',['user'=>$data['id']]) }}">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{$data['id']}}">
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Повторите пароль</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Повторите пароль" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-default">Сменить</button>
        </form>
    </div>
</div>