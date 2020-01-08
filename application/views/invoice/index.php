<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
  			<h2>Invoices</h2>
  			
		  	<table class="table">
			    <thead>
			      <tr>
			        <th>Dealer Name</th>
			        <th>Bill Date</th>
			        <th>Invoice Number</th>
			        <th>Amount</th>
			        <th>Due Date</th>
			        <th>Credit Period</th>
			        <th>Dealer Email</th>
			      </tr>
			    </thead>
			    <tbody id="tbody">
			    	<tr>
			    		<td>
			    		No Data Is Avilable..
			    		</td>
			    	</tr>
				</tbody>
			</table>
			<button onclick="location.href='http://localhost/codeig/invoice/uploadExcel'">Upload Excel</button>
		</div>
	</body>
	<script type="text/javascript">
		$.ajax({
			url: './api/example/invoice',
			type: "GET",
			success: function(result){
				// var returnedData = JSON.parse(result);
				// console.log(result[0]);
				var trHTML = '';
				for (var i = 0; i <= result.length-1; i++) {
					// console.log(result[i].dealer_name);
					trHTML += '<tr>';
						trHTML += '<td>'+result[i].dealer_name+'</td>';
						trHTML += '<td>'+result[i].bill_date+'</td>';
						trHTML += '<td>'+result[i].invoice_number+'</td>';
						trHTML += '<td>'+result[i].amount+'</td>';
						trHTML += '<td>'+result[i].due_date+'</td>';
						trHTML += '<td>'+result[i].credit_period+'</td>';
						trHTML += '<td>'+result[i].dealer_email+'</td>';
					trHTML += '</tr>';
				}
				$('#tbody').html(trHTML);
    		}
  		});
	</script>
</html>
