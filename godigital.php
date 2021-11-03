<?php
/* 
Plugin Name: GoDIGITAL Media Group finance plugin
Plugin URI: https://github.com/eodstrcil/wordpressplugin
Description: Show fiancial information in a wordpress
Version: 1.0 
Author: Emanuel Odstrcil
Author URI: https://www.linkedin.com/in/emanuelodstrcil/
Lice
*/

function agregar_ga() {
    echo '
    <script>
        jQuery(document).ready(function(){
            jQuery("#fromTd").html(\'From<br><select name="currencyFrom" id="currencyFrom"><option select value="USD">USD</option><option value="EUR">EUR</option><option value="ARS">ARS</option><option value="RUB">RUB</option><option value="CAD">CAD</option></select>\');
            jQuery("#toTd").html(\'To<br><select name="currencyTo" id="currencyTo"><option value="USD">USD</option><option value="EUR">EUR</option><option selected value="ARS">ARS</option><option value="RUB">RUB</option><option value="CAD">CAD</option></select>\');
            jQuery("#btConvert").html(\'<input type="button" id="btConvert" value="Convert" onclick="reload();">\');
            reload();
        });

        function reload(){
        	var cn = jQuery("#currencyFrom").val();
            var ccn = jQuery("#currencyTo").val();
            var d = new Date();
            var strDate = d.getFullYear() + "-" + String(d.getMonth()+1).padStart(2,\'0\') + "-" + String(d.getDate()).padStart(2,\'0\'); 
        
			jQuery.getJSON(\'https://freecurrencyapi.net/api/v2/historical?apikey=f5c17420-3b48-11ec-b083-2f40eb15b026&base_currency=\' + cn + \'&date_from=\'+strDate,function(data){
	
				console.log(data);
				jQuery("#currencyName").text(data.query.base_currency);
				jQuery("#crossCName").text(ccn);
				jQuery("#exchangeRate").text(data.data[strDate][ccn]);
				let unix_timestamp = data.query.timestamp;
				var date = new Date(unix_timestamp * 1000);
				var hours = date.getHours();
				var minutes = "0" + date.getMinutes();
				var seconds = "0" + date.getSeconds();
				var formattedTime = hours + \':\' + minutes.substr(-2) + \':\' + seconds.substr(-2);
				jQuery("#timeStamp").text(formattedTime);
			});
		}

    </script>';
 };
 // Add script into the head
 add_action( 'wp_head', 'agregar_ga' );


function cn_add_financial_table ( $the_content ) {
    $financialHTML = $the_content; 
    if (is_page('financial-page')){
		$financialHTML .= '<div class="ads">
							<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="4">Financial information - GoDIGITAL Media Group</th>
								</tr>
								<tr>
									<th id="fromTd"></th>
									<th id="toTd"></th>
									<th id="btConvert"></th>
									<th></th>
								</tr>
								<tr>
									<th scope="col">Currency Name</th>
									<th scope="col">Cross currency name</th>
									<th scope="col">Exchange rate</th>
									<th scope="col">Time Stamp</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td id="currencyName">-</td>
								<td id="crossCName">-</td>
								<td id="exchangeRate">-</td>
								<td id="timeStamp">-</td>
								</tr>
							</tbody>
							</table>
						</div>';
    }
    return $financialHTML;
}
//Create a div with the financial information.
add_filter( 'the_content', 'cn_add_financial_table' );
?>