@extends('templates.mastertemplate')
@section('title', 'Date & Time Pickers')
@section('bar', 'Date & Time Pickers')
@section('content-master')
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="portlet box green">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-filter"></i>Filters
            </div>
            <div class="tools">
               <a href="" class="collapse" data-original-title="" title=""><i class="fa fa-window-minimize" aria-hidden="true"></i></a>
            </div>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="#" class="form-horizontal form-bordered">
               <div class="form-body">
                  <div class="form-group">
                     <div class="col-md-2 col-lg-2 text-center"></div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Año</label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Meses</label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Hora inicia</label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Duración</label>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <label>Programas</label>
                     </div>
                  </div>
                  <div class="form-group last">
                     <div class="col-md-2 col-lg-2 text-center"></div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <div class="form-group form-md-line-input has-info">
                           <select class="form-control">
                              <option value="2018">2018</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center multiple-select">
                        <select class="form-control selectpicker show-tick" data-actions-box="true" multiple title="Seleccione...">
                           <option value="1">Enero</option>
                           <option value="2">Febrero</option>
                           <option value="3">Marzo</option>
                           <option value="4">Abril</option>
                           <option value="5">Mayo</option>
                           <option value="6">Junio</option>
                           <option value="7">Julio</option>
                           <option value="8">Agosto</option>
                           <option value="9">Septiembre</option>
                           <option value="10">Octubre</option>
                           <option value="11">Noviembre</option>
                           <option value="12">Diciembre</option>
                        </select>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center">
                        <div class="input-group">
                           <input type="text" class="form-control timepicker timepicker-24">
                           <span class="input-group-btn">
                              <button class="btn default" type="button">
                                 <i class="fa fa-clock-o"></i>
                              </button>
                           </span>
                        </div>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center multiple-select">
                        <select class="form-control selectpicker show-tick" multiple title="Seleccione...">
                           <option value="30">30 min.</option>
                           <option value="60">60 min.</option>
                        </select>
                     </div>
                     <div class="col-md-2 col-lg-2 text-center multiple-select">
                        <select class="form-control selectpicker show-tick" multiple data-live-search="true" data-actions-box="true" title="Seleccione...">
                           <option value="Ahí viene la Marimba">Ahí viene la Marimba</option>
                           <option value="Con el son de la marimba">Con el son de la marimba</option>
                           <option value="Café Nostalgia">Café Nostalgia</option>
                           <option value="De kiosco en kiosco">De kiosco en kiosco</option>
                           <option value="Cantares de mi tierra">Cantares de mi tierra</option>
                           <option value="Raíces de Michoacán">Raíces de Michoacán</option>
                           <option value="Estrellas del Jaripeo">Estrellas del Jaripeo</option>
                           <option value="Venga a bailar Huapango">Venga a bailar Huapango</option>
                           <option value="Tercer Milenio Internacional con Jaime Maussan">Tercer Milenio Internacional con Jaime Maussan</option>
                           <option value="¡Ah, que Kiko!">¡Ah, que Kiko!</option>
                           <option value="Espacio MX">Espacio MX</option>
                           <option value="Sonora y sus ojazos negros">Sonora y sus ojazos negros</option>
                           <option value="Lo mágico de México">Lo mágico de México</option>
                           <option value="Fieras queremos el balón">Fieras queremos el balón</option>
                           <option value="Caminando Zacatecas">Caminando Zacatecas</option>
                           <option value="Tierra grupera">Tierra grupera</option>
                           <option value="México de mis amores">México de mis amores</option>
                           <option value="Migrantes">Migrantes</option>
                           <option value="Con caña y carrete">Con caña y carrete</option>
                           <option value="Una noche embarazosa">Una noche embarazosa</option>
                           <option value="MXQ Noticias">MXQ Noticias</option>
                           <option value="Personaje del barrio">Personaje del barrio</option>
                           <option value="La vaina">La vaina</option>
                           <option value="Cabalgando a la Luna">Cabalgando a la Luna</option>
                           <option value="TV4 Noticias Norteamérica">TV4 Noticias Norteamérica</option>
                           <option value="Emiliano Zapata">Emiliano Zapata</option>
                           <option value="Cantares y costumbres">Cantares y costumbres</option>
                           <option value="Del Tingo al Tango">Del Tingo al Tango</option>
                           <option value="Informe Brozo">Informe Brozo</option>
                           <option value="Los cargadores">Los cargadores</option>
                           <option value="Cuna de la Charrería">Cuna de la Charrería</option>
                           <option value="México global">México global</option>
                           <option value="Perdida">Perdida</option>
                           <option value="Con sabor Jarocho">Con sabor Jarocho</option>
                           <option value="La hora de comer">La hora de comer</option>
                           <option value="SM Noticias Michoacán">SM Noticias Michoacán</option>
                           <option value="Vitral Informativo">Vitral Informativo</option>
                           <option value="Espiritismo">Espiritismo</option>
                           <option value="La máscara de hierro">La máscara de hierro</option>
                           <option value="Veneno para las hadas">Veneno para las hadas</option>
                           <option value="Trazos de Guanajuato">Trazos de Guanajuato</option>
                           <option value="Escuadrón musical">Escuadrón musical</option>
                           <option value="Ayer y hoy">Ayer y hoy</option>
                           <option value="Programa pagado">Programa pagado</option>
                           <option value="Esta noche cena Pancho">Esta noche cena Pancho</option>
                           <option value="Los hijos ajenos">Los hijos ajenos</option>
                           <option value="De buenas">De buenas</option>
                           <option value="Como en casa">Como en casa</option>
                           <option value="Club C7">Club C7</option>
                           <option value="Ven súbete a la van">Ven súbete a la van</option>
                           <option value="Enigma de muerte">Enigma de muerte</option>
                           <option value="C7 Noticias Jalisco">C7 Noticias Jalisco</option>
                           <option value="Taller Abierto">Taller Abierto</option>
                           <option value="Porque soy mujer">Porque soy mujer</option>
                           <option value="Más noticias Veracruz">Más noticias Veracruz</option>
                           <option value="DX Deportes extremos">DX Deportes extremos</option>
                           <option value="Mente abierta">Mente abierta</option>
                           <option value="NCC Iberoamericano">NCC Iberoamericano</option>
                           <option value="Noticiero Zacatecas">Noticiero Zacatecas</option>
                           <option value="Contigo Paisano en Veracruz">Contigo Paisano en Veracruz</option>
                           <option value="RTG Guerrero Noticias">RTG Guerrero Noticias</option>
                           <option value="Liga Mexicana de Jaripeo Profesional">Liga Mexicana de Jaripeo Profesional</option>
                           <option value="Miércoles de Ceniza">Miércoles de Ceniza</option>
                           <option value="El as de la parrilla">El as de la parrilla</option>
                           <option value="Así somos en Guerrero">Así somos en Guerrero</option>
                           <option value="Historias de mi Tierra">Historias de mi Tierra</option>
                           <option value="Muñecas de media noche">Muñecas de media noche</option>
                           <option value="Marcelino, pan y vino">Marcelino, pan y vino</option>
                           <option value="La buenota risa">La buenota risa</option>
                           <option value="¿Qué hay contigo?">¿Qué hay contigo?</option>
                           <option value="En la trampa">En la trampa</option>
                           <option value="¡Qué, qué!">¡Qué, qué!</option>
                           <option value="Andar Veracruzano">Andar Veracruzano</option>
                           <option value="Contigo Paisano en Michoacán">Contigo Paisano en Michoacán</option>
                           <option value="Cruz de olvido">Cruz de olvido</option>
                           <option value="Los rateros">Los rateros</option>
                           <option value="El sabor de Vallarta">El sabor de Vallarta</option>
                           <option value="Un día Anocheció">Un día Anocheció</option>
                           <option value="Cortv Noticias Oaxaca">Cortv Noticias Oaxaca</option>
                           <option value="El Mofles y los mecánicos">El Mofles y los mecánicos</option>
                           <option value="Barrio de campeones">Barrio de campeones</option>
                           <option value="Estampas de mi provincia">Estampas de mi provincia</option>
                           <option value="Él">Él</option>
                           <option value="Susana">Susana</option>
                           <option value="Sueños de oro">Sueños de oro</option>
                           <option value="Perico el de los palotes">Perico el de los palotes</option>
                           <option value="Romance sobre ruedas">Romance sobre ruedas</option>
                           <option value="Ranger, la última misión">Ranger, la última misión</option>
                           <option value="Mofles y Canek en Máscara vs. Cabellera">Mofles y Canek en Máscara vs. Cabellera</option>
                           <option value="Ensayo de un crimen">Ensayo de un crimen</option>
                           <option value="Debate de candidatos a la Presidencia">Debate de candidatos a la Presidencia</option>
                           <option value="Debate a la presidencia de México">Debate a la presidencia de México</option>
                           <option value="Contigo paisano en Querétaro">Contigo paisano en Querétaro</option>
                           <option value="Liga Mexicana de Béisbol">Liga Mexicana de Béisbol</option>

                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-actions">
                  <div class="row">
                     <div class="col-md-offset-9 col-md-3 text-right">
                        <button type="submit" class="btn green">
                           <i class="fa fa-check"></i> Aceptar
                        </button>
                        <button type="button" class="btn red">Cancel</button>
                     </div>
                  </div>
               </div>
            </form>
            <!-- END FORM-->
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12 col-lg-12">
      <canvas id="dateTimePicker"></canvas>
   </div>
</div>
@endsection