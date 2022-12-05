<section>
    <div class="container mt-5">
        <h2>Creation de type</h2>
        <form action="/type" method="POST">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" name="type" id="form1Example1" class="form-control" />
              <label class="form-label" for="form1Example1">Creer un nouveau type pour vos pokemon</label>
            </div>
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Créer le type</button>
          </form>
    </div>
</section>