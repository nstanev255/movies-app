
<!-- If we are not logged in - we will use the 'plain' layout, instead we will just use the layout that is the same as the backpack's dashboard page.  -->
@extends(backpack_view( backpack_auth()->guest() ? 'layouts.plain' : 'blank'))

@section('content')
    <div class="card">
        <div class="card-body row">
            <div class="form-group col mb-3 required">
                <label> Search </label>
                <input type="text" name="title">
            </div>

            <div class="form-group col mb-3 required">
                <label> Actors </label>
                <input type="text" name="actors">
            </div>

            <div class="form-group col mb-3 required">
                <label> Producers </label>
                <input type="text" name="producers">
            </div>

            <div class="form-group col mb-3 required">
                <label> Type </label>
                <input type="text" name="type">
            </div>


        </div>
    </div>

   <table class="table table-striped table-hover nowrap rounded card-table table-vcenter card d-table shadow-xs border-xs dataTable dtr-inline collapsed has-hidden-columns">
       <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Aired</th>
                <th>Score</th>
                <th>Type</th>
                <th>Actors</th>
                <th>Producers</th>
                <th>Genres</th>
                <th>Cover</th>
            </tr>
       </thead>
       <tbody>
            <tr>

            </tr>
       </tbody>
   </table>
@endsection
