@extends('app')

<?php use Illuminate\Html\HtmlFacade; ?>

@section('content')


     @if(session('message'))

        <div class="dashboard-alert alert alert-success">

         {{ session('message') }}

        </div>

     @endif

    <div class="row">
         <div class="welcome-header text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <h2><span >Welcome, <span class="text-primary">{{Auth::user()->company}}</span></span></h2>
         </div>
    </div>

     <div class="white-breadcrumb" style="padding: 40px 25px 25px 25px;">

    <table class="table table-responsive table-bordered">
        <thead>
            <th colspan="1">
                Name
            </th>
            <th colspan="1">
                Description
            </th>
            <th>
                Modify
                <a href="/dashboard/create">
                    <div class="add-qrcode-button-background"></div>
                    <span class="pull-right fa fa-plus-circle text-info add-qrcode-button" title="Add/Create QrCode"></span>
                </a>
            </th>
        </thead>
        <tbody>

            @foreach ($qrcodes as $qrcode)

               <tr>
                   <td id="{{$qrcode->id}}-nameField">

                       {{ $qrcode->name }}

                   </td>

                   <td id="{{$qrcode->id}}-descriptionField">

                       {{ $qrcode->description }}
                   </td>
                   <td>
                       {{--<a role="button" class="btn btn-primary btn-sm fa fa-pencil-square-o" href="dashboard/{{$qrcode->id}}/edit"></a>--}}
                       <button type="button" class="edit-btn btn btn-primary btn-sm fa fa-pencil-square-o" id="{{$qrcode->id}}-edit"></button>

                       {!! Form::open(['action' => ['QrcodeController@destroy', $qrcode->id], 'method' => 'delete', 'class' => 'form-horizontal', 'style' => 'display:inline']) !!}

                            {!! Form::button('<span class="fa fa-trash"></span>', ['type' => 'submit','class' => 'btn btn-danger btn-sm']) !!}

                       {!! Form::close() !!}

                       <a role="button" class="btn btn-success btn-sm fa fa-download" href="dashboard/download?id={{$qrcode->id}}"></a>

                   </td>
               </tr>

            @endforeach

        </tbody>
    </table>
     </div>

</div>


     @include('modals.edit')


@stop

@section('additionaljs')

    <script>

        var id = '';

        $('.edit-btn').click(function(e){

            id = $(this).attr('id').split('-')[0];

            $.ajax('/dashboard/'+id+'/edit').done(function(data) {


                $('#editName').val(data.name);
                $('#editDescription').val(data.description);

                $('#editModal').modal('show');
            })
        });

        $('#editForm').on('submit', function(e) {

            e.preventDefault();

            $.ajax({
                url:    '/dashboard/'+id+'/',
                method: "PUT",
                data:   $(this).serialize()
            }).done(function() {

                $('#editModal').modal('hide');
                $('.container').prepend('<div class="dashboard-alert alert alert-success">Qrcode succesfully updated</div>');
                delay();

                $('#'+id+'-nameField').text($('#editName').val());
                $('#'+id+'-descriptionField').text($('#editDescription').val());

            }).fail(function(request, status, error){

                $('.update-errors').remove();

                var errors = '<ul class="update-errors text-danger">';
                var arr = JSON.parse(request.responseText);

                $.each(arr, function (index, obj) {
                    $.each(obj, function(index, error) {

                        errors += '<li>'+error+'</li>';
                    })
                });

                errors += '</ul>';

                $('#editModal').find('.modal-body').prepend(errors);
            });
        });

    </script>

@stop