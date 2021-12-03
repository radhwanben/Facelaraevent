@extends('layouts.app-landon')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>New Group</h4>
        <form action="/groups/new" method="put">
          <div class="medium-4  columns">
          </div>
          <div class="medium-4  columns">
            <label>Group Name</label>
            <input name="form[name]" type="text">
          </div>
          <div class="medium-4  columns">
            <label>Contact Name</label>
            <input name="form[contact_name]" type="text">
          </div>
          <div class="medium-8  columns">
            <label>Address</label>
            <input name="form[address]" type="text">
          </div>
          <div class="medium-4  columns">
            <label>post_code</label>
            <input name="form[post_code]" type="text">
          </div>
          <div class="medium-4  columns">
            <label>City</label>
            <input name="form[city]" type="text">
          </div>
          <div class="medium-12  columns">
            <label>Email</label>
            <input name="form[email]" type="text">
          </div>
          <div class="medium-12  columns">
            <input value="save" class="button success hollow" type="submit">
          </div>
        </form>
      </div>
    </div>
@endsection
