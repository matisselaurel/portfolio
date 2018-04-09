      <section class='contact top-line mobile-center'>
        <div class='block'>
          <div class='row'>
            <div class='col-md-4'>
              <div class='row'>
                <div class='col-md-2'>
                  <div class='fa fa-building-o'></div>
                </div>
                <div class='col-md-10'>

                  <p>Orange County || Los Angeles</p>
                </div>
              </div>
            </div>
            <div class='col-md-4'>
              <div class='row'>
                <div class='col-md-2'>
                  <div class='fa fa-phone'></div>
                </div>
                <div class='col-md-10'>
                  <p>(747) 999 5294</p>
                </div>
              </div>
            </div>
            <div class='col-md-4'>
              <div class='row'>
                <div class='col-md-2'>
                  <div class='fa fa-envelope-o'></div>
                </div>
                <div class='col-md-10'>
                  <p>madebymatisse@gmail.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer>
        <section class='text-center'>
          <div class='social'>
            <a class='icon fa fa-linkedin' target="_blank" href='https://www.linkedin.com/in/matisse-laurel-b11a4188'></a>
            <a class='icon fa fa-print' href='/MatisseLaurelresume2017.pdf'></a>
            <!-- <a class="icon-rdio" href="http://www.rdio.com/people/matisselaurel/" target="_blank" ></a> -->
            <a class="icon-magento" target="_blank" href="http://www.magentocommerce.com/certification/directory?q=matisse&in=&country_id=&region_id=&region=&certificate_type=" ></a>
          </div>
          <div class='copy'>
            &copy; <?php echo date('Y'); ?> Matisse Laurel. All Rights Reserved.
          </div>
        </section>
      </footer>
    </div>
<script>
TweenLite.to(".shine", 2, {rotation:360, transformOrigin:"left top", background:"yellowgreen", opacity:"1"});
TweenLite.to("#img-earth", 1.5, {onComplete:rollBrand, opacity:".2", width:100, ease:Power2.easeInOut});

function rollBrand (){
    TweenLite.to("#brand-logo", 2, {onComplete:rollText, opacity:"1", backgroundColor:"#707070", width:"50%", top:"100px", ease:Power2.easeInOut});
    console.log("rollBrand");
}
function rollText (){
    TweenLite.to("#brand-logo span", 2, {onComplete:bounceBrand, opacity:"1"});
    console.log('rollText');
} 
function bounceBrand (){
    TweenLite.to("#brand-logo", 1, {paddingLeft:"30px", ease:Bounce.easeOut});
    console.log("bounceBrand");
}
</script>
    <script src="javascripts/jquery.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="javascripts/jquery.mobile.custom.min.js" type="text/javascript"></script>
    <script src="javascripts/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascripts/validation.js" type="text/javascript"></script>
    <script src="javascripts/waypoints.min.js" type="text/javascript"></script>
    <script src="javascripts/functions.js" type="text/javascript"></script>
  </body>
</html>