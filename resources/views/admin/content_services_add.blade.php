<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('servicesAdd'), 'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name','Название:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control', 'placeholder'=>'Введите название']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('icon','Абривиатура:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('icon',old('icon'),['class'=>'form-control', 'placeholder'=>'Введите абривиатуру']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text','Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text',old('text'),['id'=>'editor','class'=>'form-control', 'placeholder'=>'Текст']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить',['class'=>'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>


    {!! Form::close() !!}
    <script>
        CKEDITOR.replace('editor')
    </script>
</div>
