<?php get_header(); ?>

<!-- Load Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        min-height: 320px;
        background: linear-gradient(135deg, #222E50, #445A9C);
        display: flex;
        align-items: flex-end;
        padding: 2rem;
        color: #fff !important;
        overflow: visible;
    }

    /* Floating elements */
    /*.floating-element {*/
    /*    position: absolute;*/
    /*    border-radius: 50%;*/
    /*    opacity: 0.12;*/
    /*    animation: float 12s infinite ease-in-out;*/
    /*    z-index: 0;*/
    /*}*/

    /*.circle1 { width: 180px; height: 180px; background: #fff; top: 20%; left: 8%; }*/
    /*.circle2 { width: 220px; height: 220px; background: #FFD700; top: 50%; left: 65%; animation-delay: 4s; }*/
    /*.circle3 { width: 140px; height: 140px; background: #FF6F61; top: 30%; left: 48%; animation-delay: 8s; }*/

    /*@keyframes float {*/
    /*    0%   { transform: translateY(0) translateX(0); }*/
    /*    50%  { transform: translateY(-25px) translateX(15px); }*/
    /*    100% { transform: translateY(0) translateX(0); }*/
    /*}*/

    /* Profile picture */
    .profile-pic {
        position: absolute;
        bottom: -80px;
        left: 40px;
        z-index: 2;
    }

    .profile-pic img {
        width: 250px;
        height: 250px;
        border-radius: 50%;
        object-fit: cover;
        border: 0px solid #fff;
        box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    }

    /* Hero text */
    .hero-text {
        margin-left: 300px;
        position: relative;
        z-index: 2;
        color: #fff !important;
        max-width: calc(100% - 260px);
    }

    .hero-text h1 {
        font-size: 2.4rem;
        margin: 0;
        font-weight: 700;
        color: #fff !important;
        font-family: "Poppins", geor;
    }

    .hero-text h2 {
        font-size: 1.2rem;
        margin: 0.3rem 0 1rem;
        font-weight: 400;
        color: #fff !important;
        font-family: "Georgia", serif;
    }

    .hero-quote {
        font-style: italic;
        margin-bottom: 1.2rem;
        font-size: 1rem;
        color: #f0f0f0;
    }

    /* Modern info badges */
    .hero-info-line {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .info-badge {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.9rem;
        background: rgba(255,255,255,0.12);
        border-radius: 50px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .info-badge i {
        background: #fff;
        color: #222E50;
        border-radius: 50%;
        width: 26px;
        height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
    }

    .info-badge span, 
    .info-badge a {
        color: #fff !important;
        text-decoration: none;
    }

    .info-badge:hover {
        background: rgba(255,255,255,0.25);
        transform: translateY(-2px);
    }

    /* Info Container */
    .consular-container {
        max-width: 1000px;
        margin: 10rem auto 2rem;
        padding: 2rem;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .consular-section {
        margin-top: 2rem;
          font-size: 16px;
        font-weight: 400;
        line-height: 25px;
    }

    .consular-section h3 {
        margin-bottom: 15px;
        color: #222E50;
        font-size: 25px;
        font-weight: 500;
        line-height: 20px;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 0.3rem;
    }
    
    
     /* Contact Container */
    
    .new-contact-section {
      padding: 60px 20px;
      background: transparent; /* light background */
      display: flex;
      justify-content: center;
    }

.new-contact-card {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
  max-width: 750px;
  width: 100%;
  padding: 20px 25px;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.new-contact-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}

.new-contact-title {
  font-size: 24px;
  font-weight: 600;
  color: #222;
  margin-bottom: 25px;
}

.new-contact-title span {
  color: #222E50; /* Accent color */
}

.new-contact-form {
  text-align: left;
}

/*.contact-form .ff-el-input--content input,*/
/*.contact-form .ff-el-input--content textarea {*/
/*  border-radius: 10px;*/
/*  padding: 12px 15px;*/
/*  border: 1px solid #ddd;*/
/*  width: 100%;*/
/*  font-size: 16px;*/
/*}*/

.new-contact-form .ff-btn-submit {
  background: #426B69 !important;
  color: #ffffff !important;
  padding: 20px 60px !important;
  border-radius: 14px !important;
  font-size: 16px !important;
  font-weight: 600 !important;
  line-height: 20px;
  transition: background 0.3s ease;
  border: 2px solid transparent !important;
}

/*.new-contact-form .ff-btn-submit:hover {*/
/*  background: #2F3B40 !important;*/
/*  color: #ffffff;*/
/*}*/

        
    /* Responsive */
    @media (max-width: 768px) {
        .hero-section { flex-direction: column; align-items: flex-start; min-height: 260px; }
        .profile-pic { bottom: -135px; left: 30%; }
        .profile-pic img { width: 130px; height: 130px; }
        .hero-text { margin-left: 0; margin-top: auto; max-width: 100%; }
        .hero-text h1 { font-size: 1.8rem; }
        .hero-info-line { flex-direction: column; gap: 0.7rem; }
        .info-badge { width: 100%; }
         .consular-container { margin: 8rem auto 2rem;}
    }
    
    @media (max-width: 480px) {
        .g-recaptcha {
            transform: scale(0.8);
            transform-origin: 0 0;
            margin-bottom: -12px;
        }
        .new-contact-form .ff-btn-submit {
          font-size: 14px !important;
          font-weight: 400 !important;
          line-height: 16px;
        }
        .new-contact-section {
          padding: 40px 0px;
        }
        .new-contact-card {
          max-width: 100%;
          width: 100%;
          padding: 20px 15px;
        }
    }
</style>


<!-- Hero Section -->
<div class="hero-section">
    <!-- Floating elements -->
    <!--<div class="floating-element circle1"></div>-->
    <!--<div class="floating-element circle2"></div>-->
    <!--<div class="floating-element circle3"></div>-->

    <!-- Profile Pic -->
    <div class="profile-pic">
        <?php if (get_field('profile_picture')) : ?>
            <img src="<?php the_field('profile_picture'); ?>" alt="<?php the_field('first_name'); ?>">
        <?php endif; ?>
    </div>

    <!-- Hero Text -->
    <div class="hero-text">
        <h1><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h1>
        <h2><?php the_field('designation'); ?></h2>

        <?php if (get_field('quote')) : ?>
            <div class="hero-quote">"<?php the_field('quote'); ?>"</div>
        <?php endif; ?>

        <div class="hero-info-line">
           
                <div class="info-badge">
                    <i class="fa-solid fa-message"></i>
                    <a href="https://azure-gazelle-520006.hostingersite.com/contact/" target="_blank">Contact</a>
                </div>
           
            
                        <?php if (get_field('city')) : ?>
                <div class="info-badge">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><?php the_field('city'); ?></span>
                </div>
            <?php endif; ?>
            

            <?php if (get_field('linkedin')) : ?>
                <div class="info-badge">
                    <i class="fa-brands fa-linkedin-in"></i>
                    <a href="<?php the_field('linkedin'); ?>" target="_blank">LinkedIn</a>
                </div>
            <?php endif; ?>

            <?php if (get_field('e-mail')) : ?>
                <div class="info-badge">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:<?php the_field('e-mail'); ?>"><?php the_field('e-mail'); ?></a>
                </div>
            <?php endif; ?>
            
            <?php if (get_field('date_of_birth')) : ?>
                <div class="info-badge">
                    <i class="fa-solid fas fa-calendar-alt"></i>
                    <span><?php the_field('date_of_birth'); ?></span>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>


<!-- Other sections remain -->
<div class="consular-container">
    <?php if (get_field('course')) : ?>
        <div class="consular-section">
            <h3>Course</h3>
            <p><?php the_field('course'); ?></p>
        </div>
    <?php endif; ?>

    <?php if (get_field('experience')) : ?>
        <div class="consular-section">
            <h3>Experience</h3>
            <p><?php the_field('experience'); ?></p>
        </div>
    <?php endif; ?>

    <?php if (get_field('summary')) : ?>
        <div class="consular-section">
            <h3>Summary</h3>
            <p><?php the_field('summary'); ?></p>
        </div>
    <?php endif; ?>

    <?php if (get_field('side_activities')) : ?>
        <div class="consular-section">
            <h3>Activities</h3>
            <p><?php the_field('side_activities'); ?></p>
        </div>
        
        <!-- CONTACT  FORM -->
<div class="new-contact-section">
    <div class="new-contact-card">
        <h3 class="new-contact-title">
            Come in contact with <span><?php the_field('first_name'); ?></span>
        </h3>
        <div class="new-contact-form">
            <?php echo do_shortcode('[fluentform id="1"]'); ?>
        </div>
    </div>
</div>
    <?php endif; ?>
    
     
    
    
</div>



				
<?php get_footer(); ?>