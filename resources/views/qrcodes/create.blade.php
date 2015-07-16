@extends('app')

@section('content')

    @include('errors.credentials')

    <div class="row">
        <div class="welcome-header text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Hello, let's create a new QrCode!</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">

            <div class="white-breadcrumb">

                {!! Form::open(['class' => 'form', 'method' => 'post', 'action' => 'QrcodeController@store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', '', ['class' => 'form-control', 'id' => 'description']) !!}
                </div>

                <div class="form-group create-qrcode-form-buttons">
                    {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div><!--

        --><div class="wrap col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center ">

                <div class="qrcode-preview">




                </div>
            </div>
        </div>


    </div>

    <script>

        function log(string) {

            console.log(string);
        }

        $('.generate-qrcode').click(function(e) {

            var input = $('#description').val();

            e.preventDefault();

            $('.qrcode-container').children('svg').remove();

            if(!input) {

                $('#description').parent('.form-group').addClass('has-error');
                $('.no-qrcode').show();
                return;
            }else {  $('#description').parent('.form-group').removeClass('has-error'); }

            $('.no-qrcode').hide();

            log('clicked');

            $.ajax('/dashboard/create/preview?description='+input).done(function(data){

                log('clicked');

                $('.qrcode-container').append(data);

            }).fail(function() {

                $('.no-qrcode').show();
            })

        });

    </script>

@stop