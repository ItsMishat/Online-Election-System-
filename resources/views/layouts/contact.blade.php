<section id="contact">
<style type="text/css">
    h3{
        color: black;
    }
</style>
 <!-- Scripts -->
        <div class="container">
            <h3>Contact Us</h3>
            <hr class="sep">
            <p>Let us know what you are thinking</p>
            <div class="col-md-6 col-md-offset-3 wow fadeInUp" data-wow-delay=".3s">
                <form method="POST" action = "{{ url('/welcome') }}">
                {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="g_name" class="form-control" id="Name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name= "g_email" class="form-control" id="Email" placeholder="Email">
                    </div>
                    <div class= "form-group">
                        <input type="textarea" name="message"class="form-control" name="message" rows="3" placeholder="Write message">
                    </div>
                    <button id="g-message" type="submit" class="btn block">
                                    Send
                    </button>
                </form>
            </div>
        </div>
        <script>
            $( "#g-message" ).click(function() {
                  swal({
                  title: "Thank you!",
                  text: "Your message has been rendered to Admin",
                  type: "success",
                  confirmButtonText: "Ok",
                });  
            });
        </script>   
</section>

