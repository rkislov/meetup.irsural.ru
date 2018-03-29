<div class="wrapper container-fluid">
    <div class="col-lg-8 col-lg-offset-2 ">
        <form role="form" method="post" action="{{ route('usersAdd') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" placeholder="Андрей Иванов" name='name' value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="admin@irsural.ru" name='email' value="{{ old('email') }}">
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
                <select name="role" class="form-control" value="{{ old('role') }}">
                    <option value="user">Пользователь</option>
                    <option value="admin">Администратор</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Отправить</button>
        </form>
    </div>
</div>