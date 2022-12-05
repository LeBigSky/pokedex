<section>
    <div class="container">
        <a href="{{ route('monster.create') }}" class="btn btn-primary text-white my-5">Creer un Pocket Monster</a>
        <a href="{{ route('type.create') }}" class="btn btn-warning text-white my-5">Creer un Type</a>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>Nom</th>
                <th>Type</th>
                <th>Level</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $monsters as $monster )
                <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img
                            src="{{ asset('storage/'.$monster->image) }}"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                            />
                        <div class="ms-3">
                               <a href="/monster/{{ $monster->id }}" class="fw-bold mb-1"> {{ $monster->nom }}</a> 
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="fw-normal mb-1">{{ $monster->type->type }}</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{ $monster->level }}</p>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</section>