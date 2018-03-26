<!-- Header -->
<?php require_once('partials/_header.php') ?>
<!-- ./End Header -->
<section class='jumbotron' style='background:#f9ee70'>
        <section>
          <form action='php/email.php' class='row' id='form' name='form'>
            <div class='col-md-8 col-md-offset-2'>
              <div class='block'>
                <div class='title-block text-center'>
                  <h1>Say Hi!</h1>
                </div>
                <input class='form-control' id='name' name='name' placeholder='Name' type='text'>
                <input class='form-control' id='email' name='email' placeholder='E-mail' type='text'>
                <input class='form-control' id='phone' name='phone' placeholder='Phone' type='text'>
                <textarea class='form-control' id='message' name='message' placeholder='Message' type='text'></textarea>
                <div class='text-center'>
                  <button class='btn btn-default' id='send' type='submit'>Send</button>
                </div>
              </div>
            </div>
          </form>
        </section>
      </section>
<?php include_once('partials/_footer.php') ?>
