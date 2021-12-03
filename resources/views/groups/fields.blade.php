@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>{{ $modify == 1 ? 'Modify Group' : 'New Group' }}</h4>
        <form action="{{ $modify == 1 ? route('update_group', [ 'group_id' => 1 ]) : route('create_group') }}" method="put">
          <div class="medium-4  columns">
            @foreach( $groups as $group )
                          <option value="{{ $group }}" >{{ $group }}.</option>
            @endforeach
                        </select>
          </div>
          <div class="medium-4  columns">
            <label>griup</label>
            <input name="group" type="text">
          </div>
          <div class="medium-4  columns">
            <label>Contact Name</label>
            <input name="contact_name" type="text">
          </div>
          <div class="medium-8  columns">
            <label>Address</label>
            <input name="address" type="text">
          </div>
          <div class="medium-4  columns">
            <label>Post Code</label>
            <input name="post_code" type="text">
          </div>
          <div class="medium-4  columns">
            <label>City</label>
            <input name="city" type="text">
          </div>
          <div class="medium-12  columns">
            <label>Email</label>
            <input name="email" type="text">
          </div>
          <div class="medium-12  columns">
            <input value="SAVE" class="button success hollow" type="submit">
          </div>
        </form>
      </div>
    </div>
@endsection
