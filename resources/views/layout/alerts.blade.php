@if(Session::has('error'))
<div id="modalAlert" class="modal fade bs-modal-sm" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header bg-red-thunderbird bg-font-red-thunderbird">
            <h4 class="modal-title"><i class="fa fa-exclamation fa-1x"></i> ¡Error!</h4>
         </div>
         <div class="modal-body">
            <ul>
               @foreach (Session::get('error')->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn green">Aceptar</button>
         </div>
      </div>
   </div>
</div>
@endif
@if(Session::has('info'))
<div id="modalAlert" class="modal fade bs-modal-sm" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header bg-green-jungle bg-font-green-jungle">
            <h4 class="modal-title"><i class="fa fa-thumbs-o-up fa-1x"></i> ¡Exito!</h4>
         </div>
         <div class="modal-body">
            <p>{{Session::get('info')}}</p>
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn green">Aceptar</button>
         </div>
      </div>
   </div>
</div>
@endif
@if(Session::has('warning'))
<div id="modalAlert" class="modal fade bs-modal-sm" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header bg-yellow-gold bg-font-yellow-gold">
            <h4 class="modal-title"><i class="fa fa-thumbs-o-up fa-1x"></i> ¡Exito!</h4>
         </div>
         <div class="modal-body">
            <p>{{Session::get('warning')}}</p>
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn green">Aceptar</button>
         </div>
      </div>
   </div>
</div>
@endif