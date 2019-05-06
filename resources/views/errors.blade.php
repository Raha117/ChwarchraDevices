<div class="container-fluid col-lg-4"> 
  @if($errors->any())
      <div class="alert alert-danger alert-block">
          <ul class="list-group">
            @foreach ($errors->all() as $error)
              <li class="list-group-item"> {{ $error }} </li>
            @endforeach
          </ul>
          @endif
</div>