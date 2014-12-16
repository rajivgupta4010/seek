

</div>
<div class="clearfix"></div>

<div id="footer_area">
    <div class="footer">
        <div class="section1">
            <div class="s_heading">Tools</div>
            <div class="clearfix"></div>
            <ul>    
                <li><a href="#">Profile</a></li>
                <li><a href="#">My activity</a></li>
                <li><a href="#">Favourite searches</a></li>
                <li><a href="#">Shortlisted jobs</a></li>
                <li><a href="#">Applied jobs</a></li>
                <li><a href="#">Search for a job</a></li>
                <li><a href="#">Advice & tips</a></li>
            </ul>
        </div>



        <div class="section1">
            <div class="s_heading">Company</div>
            <div class="clearfix"></div>
            <ul>        



                <li><a href="#">About </a></li>
                <li><a href="#">Work </a></li>
                <li><a href="#">Investor centre</a></li>
                <li><a href="#">International partners</a></li>
            </ul>
        </div>



        <div class="section1">
            <div class="s_heading">Connect</div>
            <div class="clearfix"></div>
            <ul>        
                <li><a href="#">Contact us / FAQs</a></li>
                <li><a href="#">Blogs </a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Google+</a></li>
                <li><a href="#">YouTube</a></li>
            </ul>
        </div>


        <div class="section1" style="margin: 0px; float: right;">
            <div class="s_heading">Employers</div>
            <div class="clearfix"></div>
            <ul>         
                <li><a href="#">Register for free</a></li>
                <li><a href="#">Post a job ad</a></li>
                <li><a href="#">Products & prices</a></li>
                <li><a href="#">Corporate training</a></li>
                <li><a href="#">Customer service</a></li>
                <li><a href="#">Insight Blog</a></li>
            </ul>
        </div>

        <div class="clearfix"></div>

        <div class="copyright">
            <ul>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">CareerView safely</a></li>
                <li>� CareerView 2014. All rights reserved.</li>
            </ul>
        </div>

    </div>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?PHP echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<?php
if (isset($requirepagejs) && !empty($requirepagejs)) {

    if (isset($page_identifier)) {
        ?>



        <script src="<?PHP echo base_url() . "js/page/" . $page_identifier . ".js"; ?>" type="text/javascript"></script>
        <script src="<?PHP echo base_url() . "js/page/" . $page_identifier2 . ".js"; ?>" type="text/javascript"></script>
        <?PHP
    }
}
?>




</body>
</html>
