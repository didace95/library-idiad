@extends('layout.app')
@section('content')
<section id="contact-page">
    <div class="container">
        <div class="large-title text-center">        
            <h2>Votre message ici </h2>
            <p>S’il vous plait prenez la peine d’entrer des informations correctes afin que nous puissions vous joindre sans soucis pour vous répondre <br> ou vous assister par rapport à une préoccupation.</p>
        </div> 
        <div class="row contact-wrap"> 
            {{-- <div class="status alert alert-success"></div> --}}
            <form id="" class="contact-form" name="contact-form" method="post" action="{{ url('/email') }}">
                @csrf
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control">
                    </div>                        
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Subject *</label>
                        <input type="text" name="subject" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Message *</label>
                        <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                    </div>                        
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Envoyer</button>
                    </div>
                </div>
            </form> 
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->
@endsection