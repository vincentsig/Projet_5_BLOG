   <!-- Page footerr -->
   <footer>
   <div class="container">
      <div class="row">
          <div class="col-lg-9 col-md-10 mx-auto">
          </div>
          <div class="col-lg-3 col-md-10 mx-auto">
          <?php if (isset($_SESSION['auth'])): ?>
            <?php if (($_SESSION['auth']->role_id == 1)): ?>
          <a button class="btn btn-primary" href="index.php?page=admin.index.dashboard">espace administration</a>
            <?php endif; ?>
            <?php endif; ?>
          </div>
      </div>
    </div>
    <br>

  



    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
          <li class="list-inline-item">
              <a href="https://www.linkedin.com/in/vincent-signoret-082944168/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://twitter.com/SignoretVincent?lang=en">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.facebook.com/vincent.signoret">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://github.com/vincentsig">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Signoret - Vincent</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>