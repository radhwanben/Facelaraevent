@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>{{ $modify == 1 ? 'Modify GROUP' : 'Modify Group' }}</h4>
        <form action="{{ $modify == 1 ? route('update_group', [ 'group_id' => $group_id ]) : route('create_group') }}" method="post">
          {{ csrf_field() }}
          <div class="medium-4  columns">

          </div>
          <div class="medium-4  columns">
            <label>Group Name</label>
            <input name="group" type="text" value="{{ old('group') ? old('group') : $group }}">
            <small class="error">{{$errors->first('group')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Contact Name</label>
            <input name="contact_name" type="text" value="{{ old('contact_name') ? old('contact_name') : $contact_name }}">
            <small class="error">{{$errors->first('contact_name')}}</small>
          </div>
          <div class="medium-8  columns">
            <label>Address</label>
            <input id="adress" name="address" type="text" value="{{ old('address') ? old('address') : $address }}">
            <small class="error">{{$errors->first('address')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Post Code</label>
            <input name="post_code" type="text" value="{{ old('post_code') ? old('post_code') : $post_code }}">
            <small class="error">{{$errors->first('post_code')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>City</label>
            <input name="city" type="text" value="{{ old('city') ? old('city') : $city }}">
            <small class="error">{{$errors->first('city')}}</small>
          </div>





          <div class="medium-12  columns">
            <label>Email</label>
            <input name="email" type="text" value="{{ old('email') ? old('email') : $email }}">
            <small class="error">{{$errors->first('email')}}</small>
          </div>
          <div class="medium-12  columns">
            <input value="SAVE" class="button success hollow" type="submit">
          </div>
        </form>
      </div>
    </div>
@endsection
