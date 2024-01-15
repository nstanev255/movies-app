<!-- If we are not logged in - we will use the 'plain' layout, instead we will just use the layout that is the same as the backpack's dashboard page.  -->
@extends(backpack_view( backpack_auth()->guest() ? 'layouts.plain' : 'blank'))

@section('content')
    <form name="search" id="search" method="get" action="{{url('/')}}" >
        <div class="card">
            <div class="card-body row">
                <div class="form-group col mb-3">
                    <label for="title"> Title </label>
                    <input id="title" class="form-control" type="text" name="title">
                </div>

                <div class="form-group col mb-3">
                    <label for="year"> Year </label>
                    <input class="form-control" id="year" type="number" min="1800" max="2099" name="year">
                </div>

                <div class="form-group col">
                    <label for="genres[]"> Genres </label>
                    <select class="form-control" id="genres[]" name="genres[]" multiple>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col mb-3">
                    <label for="producers[]"> Producers </label>
                    <select class="form-control" id="producers[]" type="text" name="producers[]" multiple>
                        @foreach($producers as $producer)
                            <option value="{{$producer->id}}">{{$producer->name}}</option>
                        @endforeach
                    </select>
                </div>

                    <button class="form-control" type="submit">Search</button>
            </div>

        </div>
    </form>

    <table
        class="table table-striped table-hover nowrap rounded card-table table-vcenter card d-table shadow-xs border-xs dataTable dtr-inline collapsed has-hidden-columns">
        <thead>
        <tr>
            <th>Title</th>
            <th>Synopsis</th>
            <th>Aired</th>
            <th>Score</th>
            <th>Genres</th>
            <th>Producers</th>
            <th>Cover</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td>{{$movie->title}}</td>
                <td>{{strlen($movie->synopsis) > 50 ? substr($movie->synopsis, 0, 47) . '...' : $movie->synopsis}}</td>
                <td>{{$movie->aired}}</td>
                <td>{{$movie->score}}</td>
                <td>{{ $movie->genres->pluck('name')->implode(', ') }}</td>
                <td>{{ $movie->producers->pluck('name')->implode(', ')  }}</td>
                <td><img alt="{{$movie->title}}" src="{{$movie->image}}" width="100px" height="100px"></td>

            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-center p-2"> {{ $movies->links() }} </div>
@endsection
