
        <div id="colorlib-main">
            <section class="ftco-section bg-light ftco-bread">
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-9 ftco-animate">
                            <p class="breadcrumbs"><span class="mr-2"><a href="index-2.html">Home</a></span> <span>Contact Us</span></p>
                            <h1 class="mb-3 bread">Contact Us</h1>

                        </div>
                    </div>
                </div>
            </section>
            <section class="ftco-section contact-section">
                <div class="container">
                    <?php if($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                    <div class="alert alert-success" id="thanks">
                        Thanks for your feedback.
                    </div>
                    <script type="text/javascript">
                        setInterval(function() {
                            document.getElementById("thanks").classList.add("hide");
                        },5000);
                    </script>
                    <?php } ?>
                    <div class="row block-9">
                        <div class="col-md-12 order-md-last d-flex">
                            <form action="/contact" class="bg-light p-5 contact-form" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div id="map" class="bg-light"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>