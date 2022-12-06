<section>
    <div class="container mt-5">
      @include('layouts.flash')
        <h2>Modifier votre Poket Monster</h2>
        <form action="/monster/{{ $monster->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <!-- Email input -->
            <div class="d-flex justify-content-between mt-5 p-2">
                <div class="form-outline mb-4 w-50">
              <input type="text" name="nom" id="form1Example1" class="form-control" value="{{ old('nom',$monster->nom ) }}" />
              <label class="form-label" for="form1Example1">Nom</label>
            </div>
           
                <div class="form-outline mb-4 w-50 p-2">
              <input type="file" name="src" id="form1Example1" class="form-control" />
              <label class="form-label" for="form1Example1">Image</label>
            </div>
          
            </div>
            
            <div class="form-outline mb-4 w-50 ">
                <label class="form-label" for="form1Example1">Choisisez le type de pokemon</label>
                <select name="type_id" id="form1Example1" class="form-control">
               <option value="{{ $monster->type->id }}" selected>{{  $monster->type->type}}</option>
                    @foreach ($types as $type )
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-outline mb-4 w-50">
                    <input type="number" name="level" id="form1Example1" class="form-control" value="{{ old('level', $monster->level )  }}" />
                    <label class="form-label" for="form1Example1">level</label>
                  </div>
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Modifier le pokemon</button>
          </form>
    </div>
</section>