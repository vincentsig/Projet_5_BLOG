
<?php foreach($flashs as $flash): ?>
           <li><?= $flash; ?></li>
<?php endforeach; ?>
<?=var_dump($flashs);?>

<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
             <h1>Bienvenue sur mon Portefolio</h1>
            <span class="subheading">Jettez un oeil à mes derniers projet !</span>
          </div>
      </div>
</div>




<div class="container">
    <div class="row">
    <?php foreach($posts as $post): ?>
      <div class="col-lg-6 col-md-8 mx-auto">
        <div class="post-preview">
          <a href="<?= $post->url ?>">
            <h2 class="post-title">
            <a href="<?= $post->url ?>"><?= $post->title; ?></a>
            </h2>
            <p><?= $post->lead_in ?></p>
          </a>
            <p class="post-meta">Posté par
            <?= $post->username;?>, le <?= $post->date_created;?><br>
            tag: <?= $post->category;?>
            </p>
        </div>
        <hr>
        </div>
        <?php endforeach?>
        </div>
</div>
   
  <hr>
<h2>Formulaire de contact</h2>

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Si vous avez une question ou une suggestion, n'hésitez pas à me concacter avec le formulaire suivant. Je vous contacterais dès que possible.</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <hr>


<h2>liste de toutes les catégories</h2>
<?=var_dump($_SESSION['auth']);?>
<?=var_dump($_SESSION['flash']);?>


<div>
     <ul>
     <?php  foreach($categories as $category): ?>
     
            <li>
                  <a href="<?= $category->url; ?>"><?= $category->title; ?></a>
            </li>
       <?php endforeach?>      
     </ul> 
      
</div>

