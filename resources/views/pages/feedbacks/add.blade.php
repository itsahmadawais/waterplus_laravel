@extends('layouts.dashboard')

@section('content')
<style>
  .rate {
      height: 30px;
      padding: 0 10px;
  }
  .rate:not(:checked) > input {
      position:absolute;
      top:-9999px;
  }
  .rate:not(:checked) > label {
      float:right;
      width:1em;
      overflow:hidden;
      white-space:nowrap;
      cursor:pointer;
      font-size:30px;
      color:#ccc;
  }
  .rate:not(:checked) > label:before {
      content: '★ ';
  }
  .rate > input:checked ~ label {
      color: #ffc700;    
  }
  .rate:not(:checked) > label:hover,
  .rate:not(:checked) > label:hover ~ label {
      color: #deb217;  
  }
  .rate > input:checked + label:hover,
  .rate > input:checked + label:hover ~ label,
  .rate > input:checked ~ label:hover,
  .rate > input:checked ~ label:hover ~ label,
  .rate > label:hover ~ input:checked ~ label {
      color: #c59b08;
  }
</style>
<div class="padding">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="box">
        <div class="box-header">
          <h2>How is your experience with our service?</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
          <form role="form" method="POST" action="{{url('feedbacks')}}">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="form-group">
              <label>Give Rating</label>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
              </div>
            </div>

            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" class="form-control" name="message" placeholder="You can put your thought in the message...e.g. The water quality and the service quality is exceptional." rows="5"></textarea>
            </div>

            <div class="text-right">
              <button type="submit" class="btn primary m-b">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection