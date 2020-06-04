<?php
/**
 * Template Name: Главная
 */
get_header();
$path_to_files = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', __DIR__));
?>
  <section class="top" id="home" style="background: url(<?= get_template_directory_uri();?>/img/new-bg.jpg) no-repeat center; background-size: cover;background-position: bottom;
    height: 100vh;">
    <div class="container">
      <div class="top-wrap">
        <form class="calculator active" >
          <h2 class="calculator__title">Get Your Quote ONLINE</h2>
          <p class="calculator__subtitle">Moving Cost Calculator</p>
          <div id="calculatorform" class="calculator-center">
            <input id="date" type="text" name="date" placeholder="Move Date" class="small" readonly>
            <input type="text" name="zipcode1" placeholder="Zip from..." class="small">
            <input type="text" name="zipcode2" placeholder="Zip to..." class="small">
            <select id="from" name="from" class="medium" >
              <option value="" selected disabled>Type from..</option>
              <option value="2">Elevator</option>
              <option value="2">No stairs - Ground floor</option>
              <option value="3">Stairs - 2nd floor</option>
              <option value="4">Stairs - 3d floor</option>
              <option value="5">Stairs - 4th floor</option>
              <option value="2">Private house</option>
              <option value="2">Storage unit</option>
            </select>
            <select id="to" name="to" class="medium" >
              <option value="" selected disabled>Type to..</option>
              <option value="2">Elevator</option>
              <option value="2">No stairs - Ground floor</option>
              <option value="3">Stairs - 2nd floor</option>
              <option value="4">Stairs - 3d floor</option>
              <option value="5">Stairs - 4th floor</option>
              <option value="2">Private house</option>
              <option value="2">Storage unit</option>
            </select>
            <select id="move" name="move" class="big">
              <option value="" selected disabled>Select Size Of Move...</option>
              <option value="2">One room or less</option>
              <option value="2">Studio Apt.</option>
              <option value="2">1 bedroom Apt.</option>
              <option value="2">2 bedroom Apt.</option>
              <option value="3">3+ bedroom Apt.</option>
              <option value="2">2 bedroom house/Townhouse</option>
              <option value="3">3 bedroom house/Townhouse</option>
              <option value="4">4 bedroom house/Townhouse</option>
              <option value="3">Office/Commercial move</option>
            </select>
          </div>
          <button id="calc" class="calculator-btn">CALCULATE</button>
        </form>
        <div class="result" id="result">
          <button class="result_back">BACK</button>
          <h2 class="result__title">Moving calculator result</h2>
          <p class="result__subtitle">Moving a <span id="result_move">2 bedroom Apt.</span>, from <span id="result_from">Stairs - 2nd floor</span> to <span id="result_to">Elevator</span> should take approximately:</p>
          <div class="result_zip">  
            <div class="result_zip_wrap">
              <div class="fromcity">Boston</div>
              <span>,</span>
              <div class="fromstate">MA</div>
            </div>   
            <img loading="lazy" src="<?= get_template_directory_uri();?>/img/right-arrow.png" alt="">
            <div class="result_zip_wrap">
              <div class="tocity">Boston</div>
              <span>,</span>
              <div class="tostate">MA</div> 
            </div>
          </div>
          <div class="result_movers">
            <div class="result_movers__crew"><strong id="movers_crew">2</strong> movers crew</div>
            <div class="result_movers__cost"><strong>$</strong><span id="movers_cost">80</span> / hour</div>
          </div>
          <div class="result_work">          
            <div class="result_work__time">estimated job time</div>
            <div class="result_work__hour"><strong id="min">2</strong> <strong>-</strong> <strong id="max">4</strong> hours*</div>
          </div>
          <div class="result_all">
            <div class="result_all__travel" >Travel time: <span id="travel_time">20</span> min+.</div>
            <div class="result_all__quote">Estimated Quote: $<span id="cost_min">160</span> - $<span id="cost_max">320</span></div>
          </div>
          <div class="distance">
						<span class="label">Distance:</span> 
            <span class="distance" id="distance"></span>
            <span>miles</span>
					</div>
          <p class="result__subtitle">Note: The above information provides an estimated quote.<br> For more detailes call or email us.</p>
          <button class="result__book">Book</button>
        </div>
        <div class="book">
          <h2 class="book__title">Contact Information</h2>
          <div class="book__subtitle">No commintments or credit card required</div>
          <div class="book-form">
            <input type="text" class="medium" name="name" placeholder="First Name" >
            <input type="text" class="medium" name="lname" placeholder="Last Name">
            <input type="email" class="medium" name="email" placeholder="Email">
            <input type="tel" class="medium" name="phone" placeholder="Phone Number">
            <div class="book-form-title">
              Move Date & Start Time
            </div>
            <input type="text" id="date_input" class="medium" name="date" placeholder="" disabled value="">
            <select class="medium" name="start_time" id="" class="">
              <option selected disabled>Start Time</option>
              <option>Morning</option>
              <option>Noon</option>
              <option>Afternoon</option>
            </select>
            <div class="book-form-title">
              Additional comments/requests
            </div>
            <textarea class="textarea" name="comments" rows="5" placeholder="Please include information on heavy, oversize, fragile items, extra stops, or anything else that may affect the moving time."></textarea>
            <button class="book-form__btn" id="book_now">Book now</button>
          </div>
        </div>
        <div id="my-calendar"></div>
        <h1 class="title">YOU REST, WE WORK</h1>
      </div>
    </div>
    <!-- <?php echo do_shortcode('[wpdevart_booking_calendar id="1"]'); ?> -->
  </section>
  <!-- /.top -->

  <section class="page page-dark" id="services">
      <div class="page-wrap">
        <h1 class="title">SERVICES</h1>
        <p class="subtitle">Lotus Moving company offers local, residential and commercial, moving services.</p>
        <div class="services">
          <a href="#local" class="services__link">
            <img src="<?= get_template_directory_uri();?>/img/boston-870x550.jpg" alt="">
            <h1>LOCAL MOVING</h1>
          </a>
          <a href="#interstate" class="services__link">
            <img src="<?= get_template_directory_uri();?>/img/roads_in_USA.jpg" alt="">
            <h1>INTERSTATE MOVING</h1>
          </a>
          <a href="#packing" class="services__link">
            <img src="<?= get_template_directory_uri();?>/img/boxes-for-shipping (1).jpg" alt="">
            <h1>PACKING</h1>
          </a>
          <a href="#special" class="services__link">
            <img src="<?= get_template_directory_uri();?>/img/350a.1.jpg" alt="">
            <h1>SPECIAL SERVICES</h1>
          </a>
        </div>
      </div>
  </section>
  <!-- /.services -->

  <section class="page page-light" id="local">
    <div class="container">
      <div class="page-wrap">
        <h1 class="title">LOCAL MOVING</h1>
        <p class="subtitle">We are happy to help your with any kind of moving.</p>
        <div class="local">
          <div class="local-wrap">
            <div class="local__link">
              <img src="<?= get_template_directory_uri();?>/img/r1.0.jpg" alt="">
              <h1>Residential Moving</h1>
            </div>
            <p class="local-wrap__subtitle">Moving servise from small
              appartments to big houses.</p>
          </div>
          <div class="local-wrap">
            <div class="local__link">
              <img src="<?= get_template_directory_uri();?>/img/Rectangle 2.5.png" alt="">
              <h1>Commercial Moving</h1>
            </div>
            <p class="local-wrap__subtitle">Office and commercial moving 
servises for the companies.</p>
          </div>
          <div class="local-wrap">
            <div class="local__link">
              <img src="<?= get_template_directory_uri();?>/img/IMG_1671.jpg" alt="">
              <h1>Local Labor Help</h1>
            </div>
            <p class="local-wrap__subtitle">Loading and uploding, 
packing and unpacking help.</p>
          </div>
        </div>
        <p class="bottitle">Lotus Moving Company provides special offers for the student moving. </p>
      </div>
    </div>
  </section>
  <!-- /.local -->

  <section class="page" id="interstate">
    <div class="container">
      <div class="page-wrap">
        <h1 class="title">LONG DISTANCE INTERSTATE MOVING</h1>
        <div class="interstate">
          <div class="interstate-wrap">
            <div class="interstate-wrap__link">
              <img loading="lazy" src="<?= get_template_directory_uri();?>/img/USA-New-York.jpg" alt="">
              <h1>Boston <img src="<?= get_template_directory_uri();?>/img/Group.png" alt=""> Nyc</h1>
              <p>from <img src="<?= get_template_directory_uri();?>/img/dollar.png" alt=""><strong>900</strong></p>
            </div>
          </div>
          <div class="interstate-wrap-big">
            <div class="interstate-wrap-big__link">
              <img  src="<?= get_template_directory_uri();?>/img/Washington-DC.jpg" alt="">
              <h1>WASHINGTON</h1>
              <p>from <img src="<?= get_template_directory_uri();?>/img/dollar.png" alt=""><strong>1600</strong></p>
            </div>
            <div class="interstate-wrap-big__link">
              <img  src="<?= get_template_directory_uri();?>/img/miami.jpg" alt="">
              <h1>MIAMI</h1>
              <p>from <img src="<?= get_template_directory_uri();?>/img/dollar.png" alt=""><strong>3200</strong></p>
            </div>
            <div class="interstate-wrap-big__link">
              <img  src="<?= get_template_directory_uri();?>/img/Chicago.jpg" alt="">
              <h1>CHICAGO</h1>
              <p>from <img src="<?= get_template_directory_uri();?>/img/dollar.png" alt=""><strong>1300</strong></p>
            </div>
            <div class="interstate-wrap-big__link">
              <img src="<?= get_template_directory_uri();?>/img/LosAngeles.jpg" alt="">
              <h1>LOS ANGELES</h1>
              <p>from <img src="<?= get_template_directory_uri();?>/img/dollar.png" alt=""><strong>4500</strong></p>
            </div>
          </div>
        </div>
        <p class="bottitle">We work for other destinations. For getting more information<br>
          and prices call or text <strong>+1 781 558 4376</strong></p>
      </div>
    </div>
  </section>
  <!-- /.interstate -->

  <section class="page page-light" id="packing">
    <div class="container">
      <div class="page-wrap">
        <h1 class="title">FULL PACKING SERVICES</h1>
        <div class="packing">
          <img loading="lazy" src="<?= get_template_directory_uri();?>/img/Rectangle 4.png" alt="">
          <div class="packing-wrap">
            <p><strong>Lotus Moving Company</strong> offers you full packing and
              unpacking services.<br>
              We will be ready to pack up evething - from the small
              appartment to a big house</p>
            <h3>PACKING MATERIALS</h3>
            <p>We have all necessary packing materials to pack your stuff</p>
            <h4>PACKING SUPPLIES RATES: </h4>
            <table>
              <tr>
                <th class="left item">ITEM</th>
                <th class="price">PRICE</th>
              </tr>
              <tr>
                <td class="left">MEDIUM “LINEN” BOX</td>
                <td class="center">$4.00</td>
              </tr>
              <tr>
                <td class="left">LARGE “LINEN” BOX</td>
                <td class="center">$5.00</td>
              </tr>
              <tr>
                <td class="left">PICTURE/MIRROR/DISH BOX</td>
                <td class="center">$7.00</td>
              </tr>
              <tr>
                <td class="left">WARDROBE BOX: rent $10</td>
                <td class="center">$15.00</td>
              </tr>
              <tr>
                <td class="left">REAM PACKAGING PAPER (bundle)</td>
                <td class="center">$30.00</td>
              </tr>
              <tr>
                <td class="left">TV BOX</td>
                <td class="center">$30.00</td>
              </tr>
              <tr>
                <td class="left">MOVING PAD: rent $10</td>
                <td class="center">$20.00</td>
              </tr>
              <tr>
                <td class="left">HOISTING FEE $20/flighy of stairs/item</td>
                <td class="center">$20.00</td>
              </tr>
              <tr>
                <td class="left">TAPE</td>
                <td class="center">$3.00</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.packing -->

  <section class="page page-dark" id="special">
    <div class="container">
      <div class="page-wrap">
        <h1 class="title">SPECIAL SERVICES</h1>
        <p class="subtitle">Lotus Moving Company provides additional moving services </p>
        <div class="special">
          <div class="special-wrap">
            <div class="special-wrap-text">
              <h2>PIANO MOVING <img src="<?= get_template_directory_uri();?>/img/green-dollar.png" alt="">120</h2>
              <p>Our company can help you with moving a piano<br> to your new appartment or house.</p>
              <strong>Piano moving service includes:</strong>
              <ul>
                <li>Using special piano board</li>
                <li>Packing with blankets</li>
                <li>Using moving straps</li>
              </ul>
            </div>
            <img loading="lazy" src="<?= get_template_directory_uri();?>/img/piano-452890_1280.jpg" alt="">
          </div>
          <div class="special-wrap">
            <div class="special-wrap-text">
              <h2>PARKING PERMITS</h2>
              <p>Our main problem in moving is parking. Tracks usually
                take at least 2 parking slots and u definitely have to
                think about getting parking permit.</p>
              <p>We recommend getting moving parking permits in Boston.
                Because if you are not going to do this your estimated
                time will be wrong. Because movers have to park the truck
                in any available spot closest to the apartment.</p>
              <p>Also customers responsible for any parking tickets
                (if you are not purchasing moving permit from city hall).</p>
            </div>
            <img src="<?= get_template_directory_uri();?>/img/temporary-park.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.special -->

  <section class="page" id="prices">
    <div class="container">
      <div class="page-wrap">
        <h1 class="title">PRICES</h1>
        <div class="prices">
          <div class="prices-wrap">
            <h2>2 MOVERS & TRUCK
              STARTING FROM</h2>
            <p><img loading="lazy" src="<?= get_template_directory_uri();?>/img/gd.png" alt=""><strong>90</strong>/ hour</p>
            <ul>
              <li>One moving truck</li>
              <li>All equipment</li>
              <li>Gas/tolls</li>
            </ul>
          </div>
          <div class="prices-wrap prices-wrap-big">
            <h2>3 MOVERS & TRUCK
              STARTING FROM</h2>
            <p><img loading="lazy" src="<?= get_template_directory_uri();?>/img/gd.png" alt=""><strong>130</strong>/ hour</p>
            <ul>
              <li>One moving truck</li>
              <li>All equipment</li>
              <li>Gas/tolls</li>
            </ul>
          </div>
          <div class="prices-wrap">
            <h2>4 MOVERS & TRUCK
              STARTING FROM</h2>
            <p><img loading="lazy" src="<?= get_template_directory_uri();?>/img/gd.png" alt=""><strong>165</strong>/ hour</p>
            <ul>
              <li>One moving truck</li>
              <li>All equipment</li>
              <li>Gas/tolls</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.prices -->

  <div class="page page-cont" id="contact">
    <div class="container">
      <div class="page-wrap">
        <h1 class="title">CONTACT US</h1>
        <div class="contact">
          <div class="contact-wrap">
            <div class="contact-info">
              <h3 class="contact-info__title">PHONE NUMBER</h3>
              <a href="tel:+17816584376" class="contact-info__text">+1 781 658 4376</a>
            </div>
            <div class="contact-info">
              <h3 class="contact-info__title">email</h3>
              <a href="mailto:lotusmovingllc@gmail.com" class="contact-info__text">lotusmovingllc@gmail.com</a>
            </div>
            <div class="contact-info">
              <h3 class="contact-info__title">ADDRESS</h3>
              <p class="contact-info__text">Boston, MA, USA</p>
            </div>
          </div>
          <?php echo do_shortcode( '[contact-form-7 id="11" title="Feedback"]' ); ?>
          <!-- <form class="form">
            <input type="text" placeholder="name" name="name" id="name" class="form-input" >
            <input type="email" placeholder="email" name="email" id="email" class="form-input" >
            <input type="tel" placeholder="phone" name="tel" id="tel" class="form-input" >
            <textarea name="msg" id="msg" cols="1" rows="1" placeholder="message" class="form-input" ></textarea>
            <input type="button" value="SEND US MESSAGE VIA EMAIL" id="send" class="form-btn">
          </form> -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.contact -->

<div class="success">
    <div class="success_img"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px" class=""><g><ellipse style="fill:#7AC499" cx="256" cy="256" rx="256" ry="255.832" data-original="#32BEA6" class="active-path" data-old_color="#32BEA6"/><polygon style="fill:#FFFFFF" points="235.472,392.08 114.432,297.784 148.848,253.616 223.176,311.52 345.848,134.504   391.88,166.392 " data-original="#FFFFFF" class="" data-old_color="#FFFFFF"/></g> </svg></div>
</div>
<div class="overlay"></div>

  <script>
    const path_to_files = '<?= get_template_directory_uri() . '/page-src/main'; ?>';
  </script>
<?
get_footer();
?>

  
