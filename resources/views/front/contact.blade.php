

@extends('front/layout.layout')

@section('page_title','Home')

@section('container')

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <div class="container my-2 text-success "><h2 class="text-center">{{session('msg')}}</h2></div>
        <form method="post" action="{{url('send_msg')}}">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" id="name" name="name" required data-validation-required-message="Please enter your name.">
              <div class="container my-2 text-danger">@error('name') {{$message}} @enderror</div>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" placeholder="Email Address" id="email"  name="email" required data-validation-required-message="Please enter your email address.">
              <div class="container my-2 text-danger">@error('email') {{$message}} @enderror</div>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" placeholder="Phone Number" id="phone"  name="mobile" required data-validation-required-message="Please enter your phone number.">
              <div class="container my-2 text-danger">@error('mobile') {{$message}} @enderror</div>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" id="message"  name="message" required data-validation-required-message="Please enter a message."></textarea>
              <div class="container my-2 text-danger">@error('message') {{$message}} @enderror</div>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" name="submit" id="sendMessageButton">Send</button>
        </form>
      </div>
    </div>
  </div>

  <hr>
  @endsection

