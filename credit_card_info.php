
	<?php
 if(!isset($_SESSION))
   {
   session_start();
   }

  ?>
  <html>
	<body> 
     <div align = "center"> 
      <div style = "width:300px; border: solid 1px #333333; " align = "left">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Payment Info</b></div> 
            <div style = "margin:30px"> 
         <form action = "regaction.php" method = "post"> 
                 <div class="creditCardForm">
    
    <div class="payment">
        <form>
            <div class="form-group owner">
                <label for="owner">Owner: </label>
                <input type="text" class="form-control" id="owner">
            </div>
            <div class="form-group CVV">
                <label for="cvv">CVV: </label>
                <input type="text" class="form-control" id="cvv">
            </div>
            <div class="form-group" id="card-number-field">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber">
            </div>
            <div class="form-group" id="expiration-date">
                <label>Expiration Date</label>
                <select>
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select>
                    <option value="16"> 2016</option>
                    <option value="17"> 2017</option>
                    <option value="18"> 2018</option>
                    <option value="19"> 2019</option>
                    <option value="20"> 2020</option>
                    <option value="21"> 2021</option>
                </select>
            </div>
                <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm</button>
            </div>
        </form>
    </div>
</div>
                  <input type="submit" value="Submit"class="btn btn-primary btn-lg"></input> 
        </form> 
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>  
     </div> 
  </div> 
</div> 

   </body>
   </html>