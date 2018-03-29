<div class="wrapper container-fluid">
    <div class="col-lg-8 col-lg-offset-2 ">
        <form role="form" method="post" action="{{ route('usersEdit',['user'=>$data['id']]) }}">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{$data['id']}}">
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" placeholder="Андрей Иванов" name='name' value="{{ $data['name'] }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="admin@irsural.ru" name='email' value="{{ $data['email'] }}">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Повторите пароль</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Повторите пароль" name="password_confirmation">
            </div>
            <div class="form-group ">
                <label for="role">Роль</label>
                <select name="role" class="form-control" >
                    <option value="user" {{ ($data['role']=="user") ? "selected": "" }}>Пользователь</option>
                    <option value="admin" {{ ($data['role']=="admin") ? "selected": "" }}>Администратор</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Отправить</button>
        </form>
    </div>
</div>