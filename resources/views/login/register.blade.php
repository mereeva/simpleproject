<html>
<head>
	<title> Register Form </title>
	<style type="text/css">
		.form_element{
			width: 100%;
    		padding: 20px;
    		float:left;
		}
		.label{
			float:left;
			width: 20%;
		}
		.form_text{
			float: left;
  			width: 80%;
		}
		.subBtn{
			width: 15%;
			background-color: #E0A8AD;
		}
        #city{
            width: 18%;
        }
	</style>
</head>
<body>
Please Register 

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::open(array('url' => 'register')) !!}
	<div class="form_element">
     <div class="label"> {!! Form::label('name', 'Name:') !!} </div>
     <div class="form_text"> {!! Form::text('name') !!} </div>
    </div>
    <div class="form_element"> 
     <div class="label"> {!! Form::label('email', 'E-Mail Address:') !!} </div>
     <div class="form_text"> {!! Form::text('email') !!} </div>
    </div>
    <div class="form_element">  
     <div class="label"> {!! Form::label('city', 'City:') !!} </div>
     <div class="form_text"> {!! Form::select('city', array('Panjim' => 'Panjim', 'Mapusa' => 'Mapusa', 'Margao' => 'Margao' ) ); !!} </div>
    </div>
    <div class="form_element">  
     <div class="label"> {!! Form::label('min_rent', 'Minimum Rent:') !!} </div>
     <div class="form_text"> {!! Form::text('min_rent') !!} </div>
    </div>
    <div class="form_element"> 
     <div class="label"> {!! Form::label('max_rooms', 'Maximum Rooms:') !!} </div>
     <div class="form_text"> {!! Form::text('max_rooms') !!} </div>
 	</div>

 	<div class="form_element"> 
 	{!! Form::submit('SUBMIT', array('class'=>'subBtn') ) !!}
 	</div>

{!! Form::close() !!}
</body>
</html>