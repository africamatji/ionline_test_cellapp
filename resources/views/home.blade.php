@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mobile Operator Dashboard</div>
                <div class="panel-body">

                        <div class="form-group{{ $errors->has('cell') ? ' has-error' : '' }}">
                            <label for="cell" class="col-md-4 control-label">Enter Cellphone Number</label>

                            <div class="col-md-6">
                                <input id="cell" type="cell" class="form-control" name="cell" value="{{ old('cell') }}" required autofocus>
                                <br/>
                                <a href="#" onclick="getOperator()">Get Operator</a>
                                <br/><br/>
                                Result
                                <br/><br/>
                                <ul class="list-group">
                                </ul>
                            </div>
                        </div>
               </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getOperator()
    {
        var cell = $("#cell").val();

        $.ajax({
        url: "{{URL::to('getoperator')}}/"+ cell,
        type: 'GET',
        data: {
            cell:cell,
            _token:'{{ csrf_token() }}'
        },
        success:function(res){
          $('.list-group').append(res);
          /*
          if(res.status)
          {
            $('.list-group').append('<li class="list-group-item list-group-item-success">'+res.message+'</li>');
          }
          else {
            $('.list-group').append('<li class="list-group-item list-group-item-danger">'+res.message+'</li>');
          }*/
          console.log(res);
        },
        failure:function(res){
          console.log(res);
        }
        })
    }

</script>

@endsection
