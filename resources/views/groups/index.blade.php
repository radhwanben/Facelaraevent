@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Groups</h4>
        <div class="medium-2  columns">
          <a class="button hollow success" href="{{ route('new_group') }}">
            ADD NEW GROUP</a></div>


        <table >
          <thead>
        <tr>
            <th>ID</th>
            <th>Group</th>
            <th>Contact Name</th>
            <th>Address</th>
            <th>Post Code</th>
            <th>City</th>
            <th>Email</th>
            <th class="Actions">Actions</th>
          </tr>
        </thead>
        <tbody>

        @foreach($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->group }}</td>
                <td>{{ $group->contact_name }}</td>
                <td>{{ $group->address}}</td>
                <td>{{ $group->post_code }}</td>
                <td>{{ $group->city }}</td>
                <td>{{ $group->email }}</td>
                <td>
                  <a
                    class="hollow button"
                    href="{{ route('show_group', ['group_id' => $group->id ]) }}">
                    EDIT
                  </a>
                  <form action ="{{action('GroupController@destroy',
                    ['groups'=>$group->id])}}" method="POST">
                    @csrf
                      {!!method_field('DELETE')!!}
                      <button type="submit" class="btn btn-link" title="Delete"
                        value="DELETE">DELETE</button>
                  </form>
                  </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection
