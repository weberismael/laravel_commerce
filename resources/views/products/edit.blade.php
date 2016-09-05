@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Product: {{ $product->name }}</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!!  Form::open(['route'=>['products.update',$product->id],'method_field'=>'post']) !!}

        <div class="form-group">
            {!!  Form::label('category','Category:') !!}
            {!!  Form::select('category_id', $categories,$product->category_id,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('name','Name:') !!}
            {!!  Form::text('name', $product->name,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('description','Description:') !!}
            {!!  Form::textarea('description', $product->description,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!!  Form::label('price','Price:') !!}
            {!!  Form::input('number', 'price', $product->price, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('featured','Featured:') !!}
            {!! Form::hidden('featured',0) !!}
            {!! Form::checkbox('featured',1,$product->featured) !!}
            &nbsp;&nbsp;
            {!! Form::label('recommend','Recommend:') !!}
            {!! Form::hidden('recommend',0) !!}
            {!! Form::checkbox('recommend',1,$product->recommend) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Save Category',['class'=>'btn btn-primary']) !!}
            <a href="{{route('products')}}" class="btn btn-default">Voltar</a>
        </div>


        {!!  Form::close() !!}
    </div>
@endsection