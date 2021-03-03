 <!-- Subheader Start -->
 <div class="subheader bg-cover dark-overlay dark-overlay-2" style="background-image: url('<?= base_url('assets/template') ?>/assets/img/subheader.jpg')">
     <div class="container">
         <div class="subheader-inner">
             <h1>Contact Us</h1>
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Pages</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                 </ol>
             </nav>
         </div>
     </div>
     <div class="shape-1"></div>
     <div class="shape-2"></div>
     <div class="shape-3"></div>
 </div>
 <!-- Subheader End -->
 <!-- Contact Info Start -->
 <div class="section section-padding bg-light">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="ct-info-box">
                     <div class="ct-info-box-icon">
                         <i class="flaticon-call"></i>
                         <h5>Call Us</h5>
                         <span>+438 329 122</span>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="ct-info-box">
                     <div class="ct-info-box-icon">
                         <i class="flaticon-email"></i>
                         <h5>E-mail Us</h5>
                         <span>joe@example.com</span>
                     </div>
                 </div>
             </div>
             <div class="col-lg-12 col-md-12 col-sm-12">
                 <div class="ct-info-box">
                     <div class="ct-info-box-icon">
                         <i class="flaticon-location"></i>
                         <h5>Our Location</h5>
                         <span>445 Mount Eden Road, Mount Eden, Auckland.</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Contact Info End -->
 <!--Contact Form Start -->
 <section class="section pt-0">
     <div class="container">
         <div class="section-title-wrap section-header">
             <h2 class="title">Send me a Message </h2>
             <p class="subtitle">
                 Send me a message about anything, let it be about cooking or a get away for a cup of coffee.
             </p>
         </div>
         <form class="mf_form_validate ajax_submit" action="sendmail.php" method="post" enctype="multipart/form-data">
             <div class="row">
                 <div class="form-group col-lg-6">
                     <input type="text" placeholder="First Name" class="form-control" name="name" value="">
                 </div>
                 <div class="form-group col-lg-6">
                     <input type="text" placeholder="Phone No." class="form-control" name="phone" value="">
                 </div>
                 <div class="form-group col-lg-12">
                     <input type="email" placeholder="Email Address" class="form-control" name="email" value="">
                 </div>
                 <div class="form-group col-lg-12">
                     <input type="text" placeholder="Subject" class="form-control" name="subject" value="">
                 </div>
                 <div class="form-group col-lg-12">
                     <textarea name="message" class="form-control" placeholder="Type your message" rows="8"></textarea>
                 </div>
             </div>
             <button type="submit" class="btn-custom primary">Submit</button>
             <div class="server_response w-100"></div>
         </form>
     </div>
 </section>
 <!--Contact Form End -->
 <!-- Newsletter start -->
 <section class="section light-bg bg-cover" style="background-image:url('assets/img/bg/1.jpg')">
     <div class="container">
         <div class="section-title-wrap section-header text-center">
             <h2 class="title">Subscribe to Our Newsletter</h2>
             <p class="subtitle">
                 Get access to my latest recipes by joining the weekly newsletter
             </p>
         </div>
         <form class="ct-newsletter" method="post">
             <input type="email" class="form-control" placeholder="Enter your email address" value="">
             <button type="submit" class="btn-custom primary" name="button"> Submit <i class="far fa-paper-plane"></i> </button>
         </form>
     </div>
 </section>
 <!-- Newsletter End -->
 <!-- Instagram Start -->
 <div class="insta-sec section pb-0">
     <div class="container">
         <div class="section-title-wrap section-header text-center">
             <span><i class="fab fa-instagram"></i></span>
             <h2 class="title">Tutorly Insta </h2>
             <p>@ mallvent</p>
         </div>
         <div class="row">
             <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                 <a href="<?= base_url('assets/template') ?>/assets/img/ig/1.jpg" class="ct-ig-item image-popup">
                     <img src="<?= base_url('assets/template') ?>/assets/img/ig/1.jpg" alt="ig">
                 </a>
             </div>
             <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                 <a href="<?= base_url('assets/template') ?>/assets/img/ig/2.jpg" class="ct-ig-item image-popup">
                     <img src="<?= base_url('assets/template') ?>/assets/img/ig/2.jpg" alt="ig">
                 </a>
             </div>
             <div class="col-lg col-sm-4 col-6 p-0">
                 <a href="<?= base_url('assets/template') ?>/assets/img/ig/3.jpg" class="ct-ig-item image-popup">
                     <img src="<?= base_url('assets/template') ?>/assets/img/ig/3.jpg" alt="ig">
                 </a>
             </div>
             <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                 <a href="<?= base_url('assets/template') ?>/assets/img/ig/4.jpg" class="ct-ig-item image-popup">
                     <img src="<?= base_url('assets/template') ?>/assets/img/ig/4.jpg" alt="ig">
                 </a>
             </div>
             <div class="col-lg col-md-4 col-sm-4 col-6 p-0">
                 <a href="<?= base_url('assets/template') ?>/assets/img/ig/5.jpg" class="ct-ig-item image-popup">
                     <img src="<?= base_url('assets/template') ?>/assets/img/ig/5.jpg" alt="ig">
                 </a>
             </div>
         </div>
     </div>
 </div>