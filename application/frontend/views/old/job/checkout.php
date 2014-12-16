<div class="default_container">
 
   <div class="tool_container_progress">     
     
     <br>
     <div class="clearfix"></div> 
      <div class="l-row l-clear-fix">
        <div class="functions_title preview_job_ad  l-clear-fix">
            <h2>Order confirmation</h2>           
        </div>
      </div>
  </div>  
  <div class="clearfix"></div> 
    <!--form-->
      <form>
         <div class="l-row l-clear-fix">
           <h3 class="heading-three"><span class="text_pink">Nice one. </span>You are now the proud owner of a job ad pack.</h3>
           <p></p>
           <div class="clearfix"></div>
           <div class="grid_6 checkout-invoice panel-padded-border custom_ad_package_checkout_3s float_left">
                <div class="l-clear-fix">
                  <strong class="grid_3 l-float-left text-larger">Item</strong>
                  <span class="grid_2_with_1gutter l-float-right text-larger"><strong>Cost</strong></span>
                </div>
                
               <div class="l-clear-fix">
                  <div class="grid_3 l-float-left">
                      <!-- ko 'if': amountOfItems() > 0 --><span>150</span>&nbsp;x&nbsp;<!-- /ko -->
                      <span data-bind="text: description">StandOut Ad Upgrade Pack</span>
                  </div>
                  <div class="grid_2_with_1gutter l-float-right">
                      <div>$&nbsp;<div class="checkout-invoice-price l-inline-block">6750.00</div>
                      </div>
                  </div>
              </div>

              <div class="l-clear-fix">
                  <div class="grid_3_with_2gutters l-float-right">
                      <div class="grid_1_with_1gutter l-float-left">Sub-total</div>
                      <div class="grid_2_with_1gutter l-float-right">$&nbsp;<div data-bind="text: netAmount" id="subTotalAmount" class="checkout-invoice-price l-inline-block">6750.00</div>
                      </div>
                  </div>
              </div>

              <div class="l-clear-fix checkout-invoice_no-divider">
                  <div class="grid_3_with_2gutters l-float-right">
                      <div class="grid_1_with_1gutter l-float-left">GST</div>
                      <div class="grid_2_with_1gutter l-float-right">$&nbsp;<div data-bind="text: taxAmount" id="GSTAmount" class="checkout-invoice-price l-inline-block">675.00</div>
                      </div>
                  </div>
              </div>

              <div class="l-clear-fix checkout-invoice_no-divider">
                <div class="grid_3_with_2gutters l-float-right checkout-invoice_total">
                    <div class="grid_1_with_1gutter l-float-left checkout-invoice-total-title">Total</div>
                    <div class="grid_2_with_cgutter l-float-right checkout-invoice-total-value">$<div data-bind="text: totalAmount" id="totalAmount" class="checkout-invoice-price l-inline-block">7425.00</div>
                    </div>
                </div>
            </div>

            <div class="l-clear checkout-invoice_no-divider"></div>


           </div>
           <div class="grid_6 panel-padded-border l-float-right ml20">
                <span class="arrow arrow_left-medium-outer-grey">
                    <span class="arrow arrow_left-medium-inner-white"></span>
                </span>

                <div class="checkout-payment_method-inner">
                  <div>
                     <div class="text_pink heading-three">Payment options</div>                                          
                  </div>
                  <div class="no-credit-hold">                    
                      <p>Invoice, sent to registered address payable in 14 days.</p>                     
                  </div>
                  
                    <div class="btn btn_large proceed_ad_btn">
                       <a href="job_completed.html" class="white">Pay via invoice</a>
                    </div>
                  
                </div>
           </div>
         </div>
      </form>
    <!--/form-->
  <div class="clearfix"></div>
  <div class="content-base_dark">
  	<div class="l-row">
      
      <!-- <div class="grid_1 l-float-left btn_large">
      	<a href="#" class="btn_white">Save</a>
      </div> -->
      <div class="grid_1 l-float-left btn_large">
          <a class="btn_white" href="#">Cancel</a>
      </div>
    </div>
  </div>
  
</div>