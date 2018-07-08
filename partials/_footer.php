      <section class='contact top-line mobile-center'>
        <div class='block'>
          <div class='row'>
           <!-- <div class='col-md-4'>
              <div class='row'>
                <div class='col-md-2'>
                  <div class='fa fa-building-o'></div>
                </div>
                <div class='col-md-10'>

                  <p>Irvine, CA, 92604</p>
                </div>
              </div>
            </div> -->
            <div class='col-md-4'>
              <div class='row'>
                <div class='col-md-2'>
                  <div class='fa fa-phone'></div>
                </div>
                <div class='col-md-10'>
                  <p>(951) 259 3182</p>
                </div>
              </div>
            </div>
            <div class='col-md-4'>
              <div class='row'>
                <div class='col-md-2'>
                  <div class='fa fa-envelope-o'></div>
                </div>
                <div class='col-md-10'>
                  <p><a href="mailto:info@matisselaurel.codes">info@matisselaurel.codes</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer>
        <section class='text-center'>
          <div class='social'>
            <a class='icon fa fa-linkedin' target="_blank" href='https://www.linkedin.com/in/matisse-laurel'></a>
            <a class='icon fa fa-print' href='/MatisseLaurelresume.docx'></a>
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
    TweenLite.to("#brand-logo", 3, {onComplete:rollText, opacity:"1", top:"100px", ease:Power2.easeInOut});
    // console.log("rollBrand");
}
function rollText (){
    TweenLite.to("#brand-logo span", 3, {onComplete:bounceBrand, opacity:"1"});
    // console.log('rollText');
} 
function bounceBrand (){
    TweenLite.to("#brand-logo", 1, {paddingLeft:"30px", ease:Bounce.easeOut});
    // console.log("bounceBrand");
}
tapped = 0;
function tapNext(){
   el = jQuery('.next-slide');
  el.trigger('tap');
  num = tapped;
  num++;
  //  console.log(num);

  switch (num)
    {
    case 1:
          tapNextTwo(num);
      break;
    case 2:
      //          console.log('tapped'+num);
	  tapNextThree();
      break;
    default:
    }

  
}

function tapNextThree(){
 var tl = new TimelineMax()
     tl.from(".ecomtext", 0.5, {width:0}) 
  //increase size of clipPath to reveal text
   .delay(1).to(".ecomtext", 0.9, {clipPath:"inset(0px 0px 0% 1px)", opacity:1, ease:Linear.easeNone}, "reveal")
  //move line down at same speed at the same time
   .to(".ecomtext", duration, {top:"0px",  ease:Linear.easeNone}, "reveal")
  //shrink the line
    .to(".jline3", 1, { width:0});
    
  
}

function tapNextTwo(){
  var tl = new TimelineMax()
     tl.from(".jline2", 0.5, {width:0}) 
  //increase size of clipPath to reveal text
  .to(".jheader2", duration, {clipPath:"inset(0px 0px 0% 1px)", ease:Linear.easeNone}, "reveal")
  //move line down at same speed at the same time
  .to(".jline2", duration, {top:"404px", ease:Linear.easeNone}, "reveal")
  //shrink the line
    .to(".jline2", 5, { width:0});

  TweenLite.to("", 5, {onComplete:tapNext, opacity:".2", width:100, ease:Power2.easeInOut});
tapped++;
// console.log('tapped'+tapped);
}

var duration = 1;

var tl = new TimelineMax()
  //grow the line
  tl.delay(1.5).from(".jline", 0.5, {width:0}) 
  //increase size of clipPath to reveal text
  .to(".jheader", duration, {clipPath:"inset(0px 0px 0% 1px)", ease:Linear.easeNone}, "reveal")
  //move line down at same speed at the same time
  .to(".jline", duration, {top:"204px", ease:Linear.easeNone}, "reveal")
  //shrink the line
  .to(".jline", 0.5, {onComplete: tapNext, width:0})
  //fade in image
  .to(".homeslide0", 0.2, {opacity:0, ease:Linear.easeNone}, "reveal")
  .to(".homeslide", 0.5, {opacity:0.5, ease:Linear.easeNone}, "reveal");

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