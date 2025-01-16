<!-- Bagian Footer -->
<div>
    <footer>
        <div class="container">
            <div class="top-footer">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget-about">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwx_CYP4rS-2CG-PLAJgRR_cBC4OgBaTDgXQ&s"
                                alt="">
                            <p>SMK Antartika 1 Sidoarjo merupakan sekolah baru yang berdiri pada tahun 1975, oleh Yayasan Pendidikan Wahyuhana </p>
                        </div><!--widget-about end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget-contact">
                            <ul class="contact-add">
                                <li>
                                    <div class="contact-info">
                                        <img src="{{ url('frontend/assets/img/icon1.png') }}" alt="">
                                        <div class="contact-tt">
                                            <h4>Telpon</h4>
                                            <span>031-8962-8**</span>
                                        </div>
                                    </div><!--contact-info end-->
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <img src="{{ url('frontend/assets/img/icon2.png') }}" alt="">
                                        <div class="contact-tt">
                                            <h4>Jam Kerja</h4>
                                            <span>Senin - Jumat 8 AM - 5 PM</span>
                                        </div>
                                    </div><!--contact-info end-->
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <img src="{{ url('frontend/assets/img/icon3.png') }}" alt="">
                                        <div class="contact-tt">
                                            <h4>Alamat</h4>
                                            <span>Sidoarjo</span>
                                        </div>
                                    </div><!--contact-info end-->
                                </li>
                            </ul>
                        </div><!--widget-contact end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget-links">
                            <h3 class="widget-title">Tautan Langsung</h3>
                            <ul>
                                <li><a href="{{ route('landing.about') }}" title="">Tentang Kami </a></li>
                                <!-- <li><a href="{{ route('landing.blogs') }}" title="">Postingan </a></li> -->
                            </ul>
                        </div><!--widget-links end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget-iframe">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.288341416026!2d112.731001!3d-7.433311400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6a663d94b21%3A0x3a57baa5fb4760ce!2sSMK%20Antartika%201%20Sidoarjo!5e0!3m2!1sid!2sid!4v1736912889639!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div><!--widget-iframe end-->
                    </div>
                </div>
            </div><!--top-footer end-->
            <div class="bottom-footer">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p>© Copyrights {{ date('Y') }} SMK Antartika 1 Sidoarjo All rights reserved</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <ul class="social-links">
                            <li><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#" title=""><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!--bottom-footer end-->
        </div>
    </footer><!--footer end-->

    <!--back to top begin-->
    <button class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!--back to top end-->
</div>
