<script type="text/javascript" src="{{url('/js/capacitaciones/nuevaForm.js')}}"></script>
@if (isset($capacitacion))
	<script>
	var userItems = [];
		@foreach($capacitacion->permitidos as $usuario)
			userItems.push({id: {{$usuario->id}}, text:'{{$usuario->datosUsuario->nombre.' '.$usuario->datosUsuario->apellido_paterno.' '.$usuario->datosUsuario->apellido_materno}}'});
		@endforeach
	</script>
	
	<form id="form-crear" method="post" action="{{url('/capacitaciones/actualizar-capacitacion')}}" class="col s12" enctype="multipart/form-data">
@else
	<form id="form-crear" method="post" action="{{url('/capacitaciones/crear')}}" class="col s12" enctype="multipart/form-data">
@endif
		{{csrf_field()}}

		<div class="row">
			<div class="col s12 l1">
				<img src="{{isset($capacitacion)?$capacitacion->ruta_imagen:''}}" alt="{{isset($capacitacion)?$capacitacion->titulo:''}}" style="width: 100%; border-radius: 5px;">
			</div>

		    <div class="file-field input-field col s12 l6">
		        <div class="btn accent-color">
		            <span>{{trans('str.capacitaciones.image')}}</span>
		            <input type="file" id="img-capacitacion" name="img-capacitacion" value="{{isset($capacitacion)?$capacitacion->ruta_imagen:''}}">
		        </div>

		        <div class="file-path-wrapper">
		            <input class="file-path validate" type="text" value="{{isset($capacitacion)?$capacitacion->ruta_imagen:''}}" placeholder="Subir imagen">
		        </div>
		    </div>
		</div>

		<div class="row">
			<div class="input-field col s12 l6">
		        <input id="titulo" name="titulo" type="text" class="validate" value="{{isset($capacitacion)?$capacitacion->titulo:''}}">
		        <label for="titulo">Título</label>
				<input type="hidden" name="capacitacion-id" id="capacitacion-id" value="{{isset($capacitacion)?$capacitacion->id:''}}">
		    </div>
	    </div>

	    <div class="row">
		    <div class="input-field col s12">
		    	<label for="descripcion">{{trans('str.capacitaciones.description')}}</label>
		    	<textarea name="descripcion" id="descripcion" class="materialize-textarea">{{isset($capacitacion)?$capacitacion->descripcion:''}}</textarea>
		    </div>
	    </div>

	    <div class="row">
		    <div class="input-field">
		    	<input value="true" type="checkbox" id="publico" name="publico" {{isset($capacitacion)?($capacitacion->publico)?"checked":"":'checked'}} />
		      	<label for="publico">{{trans('str.capacitaciones.public')}}</label>
		    </div>
	    </div>

		<div id="privado" style="margin-top: 3em; display: none;">
			<div class="row">
             	<div class="input-field col s12 ">
	                <div class="autocomplete" id="usuarios_permitidos">
	                    <div class="ac-input">
	                        <input type="text" id="id_usuarios_permitidos_autocomplete"  placeholder="{{trans('str.capacitaciones.placeHolder')}}" data-activates="usuariosPermitidosDropdown" data-beloworigin="true" autocomplete="off">
	                    </div>
	                    <ul id="usuariosPermitidosDropdown" class="dropdown-content ac-dropdown"></ul>
	                </div>
	                <label class="active" for="id_usuarios_permitidos_autocomplete">{{trans('str.capacitaciones.allowedUsers')}}</label>
	            </div>
        	</div>
			
		    <div class="row">
		    	<table id="tabla-usuarios">
		    		<thead>
		    			<tr>
		    				<th class="header" style="width: 80px;">{{trans('str.capacitaciones.id')}}</th>
		    				<th class="header">{{trans('str.capacitaciones.allowedUser')}}</th>
		    				<th class="header" style="width: 50px;">{{trans('str.capacitaciones.quit')}}</th>
		    			</tr>
		    		</thead>
		    		<tbody class="ac-users">
			    		
		    		</tbody>
		    	</table>
		    </div>
		</div>
		
		<input class="input-field btn right accent-color" type="submit" value="{{trans('str.capacitaciones.save')}}">
	</form>
