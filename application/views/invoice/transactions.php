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
  			<h2>Transactions</h2>
  			
		  	<table class="table">
			    <thead>
			      <tr>
			        <th>Cheque Number</th>
			        <th>Cheque Date</th>
			        <th>Bank Name</th>
			        <th>Paid Amount</th>
			        <th>Due Amount</th>
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
		</div>
	</body>
	<script type="text/javascript">
		$.ajax({
			url: 'http://localhost/codeig/api/transaction/transactions',
			type: "GET",
			success: function(result){
				// var returnedData = JSON.parse(result);
				// console.log(result[0]);
				var trHTML = '';
				for (var i = 0; i <= result.length-1; i++) {
					// console.log(result[i].dealer_name);
					trHTML += '<tr>';
						trHTML += '<td>'+result[i].cheque_no+'</td>';
						trHTML += '<td>'+result[i].cheque_date+'</td>';
						trHTML += '<td>'+result[i].bank_name+'</td>';
						trHTML += '<td>'+result[i].cheque_amount+'</td>';
						trHTML += '<td>'+(parseInt(result[i].invoice_amount)-parseInt(result[i].cheque_amount))+'</td>';
					trHTML += '</tr>';
				}
				$('#tbody').html(trHTML);
    		}
  		});
	</script>
</html>
