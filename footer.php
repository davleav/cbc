        <footer>
            <section class="information">
                <ul class="info-sections">
                	<?php if ( is_active_sidebar( 'footer_bar_1' ) ) : ?>
                    	<?php dynamic_sidebar( 'footer_bar_1' ); ?>
                    <?php endif; ?>
                    <div style="clear: both;"></div>
                    <!--<li class="info-hours">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th colspan="2">HOURS</th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div>4902 S 1900 W, Suite 4</div>
                                    <div>Roy, UT 84067</div>
                                    <div>Phone: (801)776-2806</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Monday</td>
                                <td>8:00 AM - 7:00 PM</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>8:00 AM - 7:00 PM</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>8:00 AM - 7:00 PM</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td>8:00 AM - 7:00 PM</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>8:00 AM - 7:00 PM</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>8:00 AM - 7:00 PM</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>Closed</td>
                            </tr>
                        </table>
                        
                    </li>
                    <li class="info-directions">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th>DIRECTIONS</th>
                            </tr>
                            <tr>
                                <td><div id="map"></div></td>
                            </tr>
                        </table>
                    </li>
                    <li class="info-contact">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th>CONTACT US</th>
                            </tr>
                            <tr>
                                <td>
                                    <form action="" method="post" id="contact_form">
                                        <div><input type="text" name="name" placeholder="Name" /></div>
                                        <div><input type="text" name="email" placeholder="Email" /></div>
                                        <div><input type="text" name="phone" placeholder="Phone #" /></div>
                                        <div><textarea name="comment" placeholder="Comment"></textarea></div>
                                        <div><input type="submit" value="Submit" class="light-button" /></div>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li class="info-follow">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <th colspan="2">SOCIAL</th>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <div>Follow</div>
                                    <div class="addthis_inline_follow_toolbox"></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <div style="margin-bottom: 12px;">Share</div>
                                    <div class="addthis_inline_share_toolbox"></div> 
                                </td>
                            </tr>
                        </table>
                    </li>-->
                </ul>
            </section>
            <section class="legal">
                &copy; 2017 | <strong>Classical Ballet</strong>. All Rights Reserved &nbsp;
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer_menu' ) ); ?>
                &nbsp; Site designed by PDM
            </section>
        </footer>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f11a715b532006"></script>
        <script type="text/javascript">
            function myMap() {
                var mapOptions = {
                    center: new google.maps.LatLng(41.173749, -112.025538),
                    zoom: 13
                    //mapTypeId: google.maps.MapTypeId.HYBRID
                }
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                var marker = new google.maps.Marker({position: {lat: 41.173749, lng: -112.025538}, map: map})
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1phOo-QXv5Ws3fF_3qiyA9utVdnoT5dE&callback=myMap"></script>
        <?php wp_footer(); ?>
</body>
</html>