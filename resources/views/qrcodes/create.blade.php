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

                {!! Form::open(['class' => 'form horizontal-form', 'method' => 'post', 'action' => 'QrcodeController@store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', '', ['class' => 'form-control', 'id' => 'description']) !!}
                </div>

                <hr style="margin-bottom: 15px;">

               <div class="container-fluid" style="padding: 0px;">

                   <div class="form-group qrcode-color-change">
                    <div class="qrcode-image text-center col-lg-5 col-md-5 col-sm-12 c0l-xs-12 nopadding">
                        {!! SimpleSoftwareIO\QrCode\Facades\QrCode::margin(0)->size(150)->generate('example') !!}
                    </div>
                    <div class="col-md-7 col-md-7 col-sm-12 col-xs-12 nopadding">
                        <label>Qrcode Color</label>
                        <div class="bfh-colorpicker" id="qrcode-color" data-name="colorpicker3" data-close="false">
                        </div>
                        {!! Form::hidden('qrcode-color', '#000000', ['id' => 'qrcode-color-value']) !!}
                        <label style="margin-top: 10px;">Qrcode Background Color</label>
                        <div class="bfh-colorpicker" id="background-color" data-name="colorpicker3" data-close="false">
                        </div>
                        {!! Form::hidden('qrcode-background-color', '#ffffff', ['id' => 'qrcode-background-color-value']) !!}
                    </div>

                    </div>

               </div>

                <hr style="margin-bottom: 15px;">

                <div class="form-group create-qrcode-form-buttons">
                    <div class="">
                        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>

        </div><!--

        --><div class="wrap col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center ">

                <div class="qrcode-preview">
                    <div class="content-preview"></div
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

        $('#description').keyup(function(){

           $('.content-preview').text($(this).val());
        });

    </script>

@stop