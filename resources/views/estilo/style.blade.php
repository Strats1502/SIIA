<style type="text/css">
	html,
body {
    height: 100%;
}

/* label color */
 .input-field label {
   color: {{trans('strignore.colores.primary-color')}};
 }
 /* label focus color */
 .input-field input[type=email]:focus + label, .input-field input[type=password]:focus + label {
   color: {{trans('strignore.colores.accent-color')}};
 }
 /* label underline focus color */
 .input-field input[type=email]:focus,.input-field input[type=password]:focus {
   border-bottom: 1px solid {{trans('strignore.colores.accent-color')}};
   box-shadow: 0 1px 0 0 {{trans('strignore.colores.accent-color')}};
 }
 /* valid color */
 .input-field input[type=email].valid,.input-field input[type=password].valid {
   border-bottom: 1px solid {{trans('strignore.colores.primary-color')}};
   box-shadow: 0 1px 0 0 {{trans('strignore.colores.primary-color')}};
 }
 /* invalid color */
 .input-field input[type=email].invalid, .input-field input[type=password].invalid {
   border-bottom: 1px solid {{trans('strignore.colores.primary-color')}};
   box-shadow: 0 1px 0 0 {{trans('strignore.colores.primary-color')}};
 }
 /* icon prefix focus color */
 .input-field .prefix.active {
   color: {{trans('strignore.colores.primary-color')}};
 }

 /* Color del datepicker */
 .picker__date-display, .picker__weekday-display{
    background-color: {{trans('strignore.colores.accent-color')}};
}

select.invalid ~ .select-dropdown {
      border-bottom: 1px solid {{trans('strignore.colores.select-invalid')}};
}

@media only screen and (min-width : 601px) and (max-width : 1260px) {
.toast {
width: 100%;
border-radius: 0;} }

@media only screen and (min-width : 1261px) {
.toast {
width: 100%;
border-radius: 0; } }

@media only screen and (min-width : 601px) and (max-width : 1260px) {
#toast-container {
min-width: 100%;
bottom: 0%;
top: 90%;
right: 0%;
left: 0%;} }

@media only screen and (min-width : 1261px) {
#toast-container {
min-width: 100%;
bottom: 0%;
top: 90%;
right: 0%;
left: 0%; } }



.primary-color{
  background-color: {{trans('strignore.colores.primary-color')}} !important;
}


.accent-color {
    background: {{trans('strignore.colores.accent-color')}} !important;
}

.white-color {
    background: {{trans('strignore.colores.white-color')}} !important
}
.accent-color-dark {
    background-color: {{trans('strignore.colores.accent-color')}} !important;
}

.accent-color-dark-text {
    background-color: {{trans('strignore.colores.accent-color')}} !important;
}

.accent-color-text{
  color: {{trans('strignore.colores.accent-color')}} !important;
}

.primary-color-text{
  color: {{trans('strignore.colores.primary-color')}} !important;
}

.grey-color-text {
    color: #484848;
}

.action-btn-pos {
    bottom: 35px; 
    right: 45px;
}

.container {
    width: 95%;
}

.checkbox-accent-color[type="checkbox"].filled-in:checked + label:after{
     border: 2px solid {{trans('strignore.colores.accent-color')}};
     background-color: {{trans('strignore.colores.accent-color')}};
}

.input-field input[type=text]:focus + label { color:  {{trans('strignore.colores.accent-color')}}; } /* label underline focus color */
.input-field input[type=text]:focus { border-bottom: 1px solid  {{trans('strignore.colores.accent-color')}}; box-shadow: 0 1px 0 0  {{trans('strignore.colores.accent-color')}}; }


textarea + label[data-error]:after {
  white-space: nowrap;
  font-size: 12px;
  margin-top:15px;
}

li.page.active{
  background-color: {{trans('strignore.colores.accent-color')}} !important;
}

/*data table color */
table.table thead .sorting_asc {
    background-color: {{trans('strignore.colores.accent-color')}};
    color: #fff;
    font-weight:bold;
    font-size: 13px;
}

table.table thead .sorting_desc {
    background-color: {{trans('strignore.colores.accent-color')}};
    color: #fff;
    font-weight:bold;
    font-size: 13px;
}


table.table thead .sorting {
    background-color: {{trans('strignore.colores.primary-color')}};
    color: #fff;
    font-weight:bold;
    font-size: 13px;
}


.modal {
	width: 80%;

}

.deleteP {
    display: none;
}

.anuncio:hover .deleteP {
    display: block;
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
}


input:not([type]):focus:not([readonly]),
input[type=text]:focus:not([readonly]),
input[type=password]:focus:not([readonly]),
input[type=email]:focus:not([readonly]),
input[type=url]:focus:not([readonly]),
input[type=time]:focus:not([readonly]),
input[type=date]:focus:not([readonly]),
input[type=datetime]:focus:not([readonly]),
input[type=datetime-local]:focus:not([readonly]),
input[type=tel]:focus:not([readonly]),
input[type=number]:focus:not([readonly]),
input[type=search]:focus:not([readonly]),
textarea.materialize-textarea:focus:not([readonly]) {
    border-bottom: 1px solid {{trans('strignore.colores.primary-color')}};
    box-shadow: 0 1px 0 0 {{trans('strignore.colores.primary-color')}};
}

input:not([type]):focus:not([readonly]) + label,
input[type=text]:focus:not([readonly]) + label,
input[type=password]:focus:not([readonly]) + label,
input[type=email]:focus:not([readonly]) + label,
input[type=url]:focus:not([readonly]) + label,
input[type=time]:focus:not([readonly]) + label,
input[type=date]:focus:not([readonly]) + label,
input[type=datetime]:focus:not([readonly]) + label,
input[type=datetime-local]:focus:not([readonly]) + label,
input[type=tel]:focus:not([readonly]) + label,
input[type=number]:focus:not([readonly]) + label,
input[type=search]:focus:not([readonly]) + label,
textarea.materialize-textarea:focus:not([readonly]) + label {
    color: {{trans('strignore.colores.primary-color')}};
}

input:not([type]).valid, input:not([type]):focus.valid,
input[type=text].valid,
input[type=text]:focus.valid,
input[type=password].valid,
input[type=password]:focus.valid,
input[type=email].valid,
input[type=email]:focus.valid,
input[type=url].valid,
input[type=url]:focus.valid,
input[type=time].valid,
input[type=time]:focus.valid,
input[type=date].valid,
input[type=date]:focus.valid,
input[type=datetime].valid,
input[type=datetime]:focus.valid,
input[type=datetime-local].valid,
input[type=datetime-local]:focus.valid,
input[type=tel].valid,
input[type=tel]:focus.valid,
input[type=number].valid,
input[type=number]:focus.valid,
input[type=search].valid,
input[type=search]:focus.valid,
textarea.materialize-textarea.valid,
textarea.materialize-textarea:focus.valid {
    border-bottom: 1px solid {{trans('strignore.colores.primary-color')}};
    box-shadow: 0 1px 0 0 {{trans('strignore.colores.primary-color')}};
}

input:not([type]).valid + label:after,
input:not([type]):focus.valid + label:after,
input[type=text].valid + label:after,
input[type=text]:focus.valid + label:after,
input[type=password].valid + label:after,
input[type=password]:focus.valid + label:after,
input[type=email].valid + label:after,
input[type=email]:focus.valid + label:after,
input[type=url].valid + label:after,
input[type=url]:focus.valid + label:after,
input[type=time].valid + label:after,
input[type=time]:focus.valid + label:after,
input[type=date].valid + label:after,
input[type=date]:focus.valid + label:after,
input[type=datetime].valid + label:after,
input[type=datetime]:focus.valid + label:after,
input[type=datetime-local].valid + label:after,
input[type=datetime-local]:focus.valid + label:after,
input[type=tel].valid + label:after,
input[type=tel]:focus.valid + label:after,
input[type=number].valid + label:after,
input[type=number]:focus.valid + label:after,
input[type=search].valid + label:after,
input[type=search]:focus.valid + label:after,
textarea.materialize-textarea.valid + label:after,
textarea.materialize-textarea:focus.valid + label:after {
    content: attr(data-success);
    color: {{trans('strignore.colores.primary-color')}};
    opacity: 1;
}


/**
Div contenedor para las imágenes que se cortarán al centro.
 */
.center-cropped {

    height: 280px;
    position:relative;
    overflow: hidden;
}

/* Set the image to fill its parent and make transparent */
.center-cropped img {
    position: absolute;
    left: -100%;         /* anchor the image corners outside the viewable area (increase for large images) */
    right: -100%;
    top: -100%;
    bottom: -100%;
    width: auto;         /* set height (swap these for variable height) */
    margin: auto;        /* centre the image */
}


#toast-container {
    bottom: auto !important;
    left: auto !important;
    top: 10%;
    right:2%;
}


img#image{
    margin-top: 50px;
}

.side-nav {
    height: 100%;
    padding-bottom: 0;
}

.brand-logo img {
    vertical-align:middle;
}


</style>