<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
		<style type="text/css">
			.bs-example{
     		   margin: 20px;        
    		}
		</style>
	</head>
	<body>
		<div class="container">
  			<h2>Transactions</h2>
  			
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

		</div>
		<div class="bs-example">
    <form class="form-horizontal" id="submit">
        <div class="form-group">
            <label for="inputEmail">Cheque No</label>
            <input type="text" name="cheque_no" class="form-control" id="cheque_no" placeholder="cheque no" required>
        </div>
        <div class="form-group">
            <label for="inputPassword">Cheque Date</label>
            <input type="text" name="cheque_date" class="form-control datepicker" id="cheque date" placeholder="cheque_date" required>
        </div>
        <div class="form-group">
            <label for="BankName">Bank Name</label>
            <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="bank name" required>
        </div>
        <div class="form-group">
            <label for="BankName">Cheque Amount</label>
            <input type="text" name="cheque_amount" class="form-control" id="cheque_amount" placeholder="cheque amount" required>
        </div>
        <div class="form-group">
        	<label>Invoice</label>
        	<select class="selectpicker" name="invoice_id">
  				<option>Select Invoice</option>
			</select>

        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
	</body>
	<script type="text/javascript">
		$('.datepicker').datepicker();

		$.ajax({
			url: 'http://localhost/codeig/api/example/invoices/mahesh',
			type: "GET",
			success: function(result){
				// var returnedData = JSON.parse(result);
				// console.log(result[0]);
				var trHTML = '';
				var select = '<option>Select Invoice</option>';
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
					select += '<option value="'+result[i].invoice_id+'">'+result[i].invoice_number+'</option>';
				}
				$('#tbody').html(trHTML);
				$('.selectpicker').html(select);
    		}
  		});
		$('#submit').submit(function(e){
            e.preventDefault();
			$.ajax({
				url: '../api/transaction/transaction',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                   alert("Transaction Inserted Successful.");
					
                }
             });
		});
	</script>
</html>
