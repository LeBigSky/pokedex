<section>
    <div class="container d-flex justify-content-center">
        <div class="card" style="background: linear-gradient(180deg, rgb(228, 174, 48) 23%, rgba(249, 229, 3, 0.584) 95%);">
          <div class="border rounded m-3">
            <img src="{{ asset('storage/'.$monster->image->src) }}"  class="card-img-top" alt="" style="width:350px;"/>
          </div>
            
   
            <div class="card-body style" >
              <h2 class="card-title text-center border rounded" style="font-weight: bold; background-color: white" > {{ $monster->nom }}</h2>
              <div class="border rounded p-2 my-1" style="background-color: white">
                <h3 class="card-text text-center">type: {{ $monster->type->type }}</h3>
              <h3 class="card-text text-center">level: {{ $monster->level }}</h3>
              </div>
              
              <div class="d-flex justify-content-around my-2 gap-2">
                <a href="{{ $monster->id }}/edit" class="btn btn-info w-50 ">Edit</a>
                <form action="/monster/{{ $monster->id }}" method="POST">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</section>