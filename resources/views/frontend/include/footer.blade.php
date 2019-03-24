<footer class="footer style2">
    <!-- Footer Top -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <h2>Contact Us</h2>
                        <ul>
                            <li><p class="white"><i class="fa fa-home"></i> &nbsp;Sigma Travel &amp; Tours Pvt. Ltd.</p></li>
                            <li><p class="white"><i class="fa fa-map-marker"></i> &nbsp;Samakhusi Kathmandu</p></li>
                            <li><p class="white"><i class="fa fa-phone"></i> &nbsp;+977-01-4387602</p></li>
                            <li><p class="white"><i class="fa fa-mobile"></i> &nbsp;+977-9851004248</p></li>
                            <li><p class="white"><i class="fa fa-envelope"></i> &nbsp; info@sigmatravelandtour.com</p></li>
                            <li><p class="white"><i class="fa fa-envelope"></i> &nbsp; info@sigmatravelandtour.com</p></li>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                </div>
                <!--/ End Single Widget -->

                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <h2>Get in Touch</h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9988.732708365245!2d85.31135130504137!3d27.73116729040435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19269f04f43b%3A0x801a6fc6a6ced894!2ssigma+travels+%26+tours!5e0!3m2!1sen!2snp!4v1530274061902" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <!--/ End Single Widget -->
                </div>
                <!-- Single Widget -->
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-widget">
                        <h2>Keep in Touch</h2>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsigmanepal.group%2F&tabs=timeline&width=280&height=220&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        <!--/ End Single Widget -->
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--/ End Footer Top -->
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bottom-inner">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 col-12">
                                <!-- Copyright -->
                                <div class="copyright">
                                    <p>&copy;Sigma Travel & Tours Pvt Ltd. All Right Reserved. Powered By: <a href="http://grafiastech.com" target="_blank">Grafias Technology </a></p>
                                </div>
                                <!--/ End Copyright -->
                            </div>
                            <div class="col-lg-5 col-md-6 col-12">
                                @foreach($affiliation as $affil)
                                <!-- Copyright -->
                                <img src="{{URL::to('backend/images/affiliation/'.$affil->image)}}">
@endforeach
                                <!--/ End Copyright -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Bottom -->
</footer>