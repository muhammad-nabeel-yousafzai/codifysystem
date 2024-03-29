<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title>Invoice</title>
	<style type="text/css">
		*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	}
/*------------Row-1-----------------*/
.head{
	background-color: gold;
	padding: 12px;
}
.float-right img{
	width: 150px;
}
/*------------Row-2-----------------*/
.date{
	width: 150px;
	padding: 8px 0;
	border-bottom: 2px solid gray;
	text-align: center;
}
/*------------Row-3-----------------*/
/*------------Row-4-----------------*/
.text-primary{
	width: 100%;
	padding: 8px 0;
	border-bottom: 2px solid gray;
}
/*------------Row-5-----------------*/
thead{
	background-color: gold;
}
/*------------Row-6-----------------*/
.result-text section {
    margin: 3px 28px;
}
.result section{
	width: 245px;
	border-bottom: 2px solid gray;
	text-align: right;
}
.total,.shipping{
	border-bottom: 2px solid;
	width: 250px; 
}
.balance{
	text-align: right;
	margin-top: 20px;
	margin-bottom: 40px;
}
.doller{
	border-bottom: 2px solid;
	width: 100%;
	margin-right: 10px;
	margin-left: 10px;
}
.sign{
	margin-left: 200px;
	margin-right: 35px;
}
/*------------Media-Query-----------------*/

@media(max-width: 425px){
	.row1 .float-left{
		margin-left: 100px;
	}
	.float-right{
		margin-right: 90px;
	}
	.float-right section{
		margin-right: 90px;
	}
	.float-left .remark{
		display: none;
	}
	.result-text{
		margin-left: 200px;
	}
	.balance{
		margin-right: 120px;
	}
	


	
}

	</style>
</head>
<body>
	<div class="head"></div>

	<div class="container-fluid px-5 py-5">
	  <div class="row row1">

	    <div class="col-sm">
	    <div class="float-left">
	      <h2 class="text-danger mt-5 font-weight-bold">INVOICE</h2>
	    </div>
	    </div>

	    <div class="col-sm">
	    <div class="float-right bg-dark mt-5 mx-auto">
	      <img class="img-fluid" src="{{asset('public/app-assets/images/logo/logo.jpg')}}">
	    </div>
	    </div>

	    </div>
    </div>


    <!-- row 2 -->
    <div class="container-fluid px-5 font-weight-bold">
		  <div class="row">

		    	<div class="col">
				    <div class="float-left">
				      
				        <section style="color: black;">Codify (Pvt) Limited</section>
				        <section style="color: black;">Codify, Strt #7A, Hostel City, Chak Shahzad</section>
				        <section style="color: black;">Islamabad,Pakistan,44000</section>
				        <section style="color: black;">+92 334 8989029</section>
				        <section style="color: black;">info@codify.pk</section>
				    </div>
		    	</div>

		    <div class="col">
		    <div class="float-right">
		    	@foreach($client['client_info'] as $inv_date)
		      <section style="color: black;" class="date">DATE {{date('Y-m-d',strtotime($inv_date->created_at))}}</section>
		      @endforeach
		      <section style="color: black;" class="date">INVOICE NO : INV{{$client['show_Invoice'][0]->invoices_id}}</section>
		    </div>
		    </div>

		    </div>
    </div>
    <!-- row 2 ended -->
    <div class="container-fluid px-5 py-2">
	  <div class="row">

		    <div class="col">
		      <h5 class="text-primary">BILL TO</h5>
			    <div class="font-weight-bold">
			          
			        <section style="color: black;">{{$client['client_info'][0]->user_name}}</section>
			        <section style="color: black;">{{$client['client_info'][0]->p_title}}</section>
			        <section style="color: black;">Address</section>
			        <section style="color: black;">{{$client['client_info'][0]->phone}}</section>
			        <section style="color: black;">{{$client['client_info'][0]->email}}</section>
			        
			        
			    </div>
		    </div>
	    </div>
    </div>
    <!-- row 3 ended here -->
    <div class="container-fluid px-5 pt-4">
  <div class="row">

    <div class="col">
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th scope="col">Item</th>
            <th scope="col">QTY</th>
            <th scope="col">UNIT PRICE</th>
            <th scope="col">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          
          <?php
                $total = 0;
                $subtotal=0;
                $final=0;

          ?>
          
          @foreach($client['show_Invoice'] as $inv) 
             <tr>
              <td>{{$inv->item}}</td>
              <td>{{$inv->quantity}}</td>
              <td>{{$inv->price}}</td>
              <td>{{$total=$inv->quantity * $inv->price}}</td>
              <?php  
                $subtotal +=$total=$inv->quantity * $inv->price;
                //$subtotal =$subtotal+$total=$inv->quantity * $inv->price;
               $per=$inv->discount/100*$subtotal;
               
               $final=$subtotal-$per;
              ?>

            </tr>
            @endforeach

            
            
             
        </tbody>
      </table>
    </div>

    </div>
    </div>
    <!-- row 4 ended here -->
    <div class="container-fluid px-5">
  <div class="row row6">
    <div class="col-10">
    <div class="float-right text">
      <div class="font-weight-bold mr-5 mb-3 text-right result-text">
          <section style="color: black;">SUBTOTAL</section> 
         <section style="color: black;">DISCOUNT</section>
         <section style="color: black;">SUBTOTAL LESS DISCOUNT</section>
   
    </div>
    </div>
    </div>
    <div class="col-2">
    <div class="float-right Number">
      <div class="font-weight-bold mr-2 result">
         <section style="color: black;">{{$subtotal}}</section>
         <section style="color: black;">{{$inv->discount}}%</section>
         <section style="color: black;">{{$final}}</section>

    </div>
    </div>
    </div>

    </div>

	</div>
    <div class="head mt-5"></div>








</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>