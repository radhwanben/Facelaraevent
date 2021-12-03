@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>New group</h4>
        <form action="/groups/new" method="post">

          <div class="medium-4  columns">
            <label>Group</label>
            <input id="group" name="group" type="text">
          </div>
          <div class="medium-4  columns">
            <label>Contact Name</label>
            <input name="contact_Name" type="text">
          </div>
          <div class="medium-8  columns">
            <label>Address</label>
            <input name="form[address]" type="text">
          </div>
          <div class="medium-4  columns">
            <label>post code</label>
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
            <input value="SAVE" class="button success hollow" type="submit">
          </div>
        </form>
      </div>
    </div>
@endsection
