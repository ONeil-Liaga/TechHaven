@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">

	   
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Payment Setting</h1>
          </div>          
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
      
      
       <div class="col-md-12">
             @include('admin.layouts._message')

            <div class="card card-primary">
              <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                  <div class="form-group">
                    <label style="display: block;">Cash On Delivery  (On / Off)<span style="color:red"></span></label>
                    <input type="checkbox" {{ !empty($getRecord->is_cash_delivery) ? 'checked' : '' }} name="is_cash_delivery">
                  </div>

                  <hr>

                  <div class="form-group">
                    <label style="display: block;">Paypal (On / Off)<span style="color:red"></span></label>
                    <input type="checkbox" {{ !empty($getRecord->is_paypal) ? 'checked' : '' }} name="is_paypal">
                  </div>

                  <div class="form-group">
                    <label>Paypal Email ID <span style="color:red"></span></label>
                    <input type="text"  class="form-control" value="{{ $getRecord->paypal_id }}" name="paypal_id">
                  </div>

                  <div class="form-group">
                    <label>Paypal Status <span style="color:red"></span></label>
                    <select class="form-control" name="paypal_status">
                        <option {{ ($getRecord->paypal_status == 'sandbox') ? 'selected' : '' }} value="sandbox">Sandbox</option>
                        <option {{ ($getRecord->paypal_status == 'live') ? 'selected' : '' }} value="live">Live</option>
                    </select>
                  </div>

                  <hr />

                  <div class="form-group">
                    <label style="display: block;">Stripe (On / Off)<span style="color:red"></span></label>
                    <input type="checkbox" {{ !empty($getRecord->is_stripe) ? 'checked' : '' }} name="is_stripe">
                  </div>

                  <div class="form-group">
                    <label>Stripe Secret Key <span style="color:red"></span></label>
                    <input type="text"  class="form-control" value="{{ $getRecord->stripe_secret_key }}" name="stripe_secret_key">
                  </div>

                  <div class="form-group">
                    <label>Stripe Public Key <span style="color:red"></span></label>
                    <input type="text"  class="form-control" value="{{ $getRecord->stripe_public_key }}" name="stripe_public_key">
                  </div>
                  


               </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>    
        </div>       
      </div>
    </section>
</div>

@endsection

@section('script')

@endsection