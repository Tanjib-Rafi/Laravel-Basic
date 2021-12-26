
@if(Session::has('msg'))
      <div class="alert alert-danger" role="alert">
       {{ Session::get('msg') }}
      </div>
@endif
