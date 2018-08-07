 <?php

 use App\Common;

 ?>
 @extends('admin-layout')

 @section('content')
 <!-- Bootstrap Boilerplate... -->
 <div class="spacer"></div>
 <div class="card">
 	<div class="card-header bg-primary text-white">
 		Order List
 	</div>
 	<div class="card-body">

 		@if (count($orders) > 0)
 		<table id="table" class="table table-striped table-bordered table-responsive">

 			<!-- Table Headings -->
 			<thead>
 				<tr>
 					<th>No.</th>
 					<th>Order No</th>
 					<th>Billing Name</th>
 					<th>Billing Email</th>
 					<th>Billing Address</th>
 					<th>Billing City</th>
 					<th>Billing State</th>
 					<th>Billing Postcode</th>
 					<th>Billing Phone</th>
 					<th>Billing Name on Card</th>
 					<th>Billing Discount</th>
 					<th>Billing Discount Code</th>
 					<th>Billing Subtotal</th>
 					<th>Billing Tax</th>
 					<th>Billing Total</th>
 					<th>Created At</th>
 					<th>Actions</th>
 				</tr>
 			</thead>

 			<!-- Table Body -->
 			<tbody>
 				@foreach ($orders as $i => $order)
 				<tr>
 					<td class="table-text">
 						<div>{{ $i + 1 }}</div>
 					</td>	
 					<td class="table-text">
 						<div>
 							{!! link_to_route(
 								'order.show',
 								$title = $order->order_no,
 								$parameters = [
 								'id' => $order->id,
 								]
 								) !!}
 							</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_name }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_email }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_address }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_city }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_state }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_postcode }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_phone }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_name_on_card }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ presentPrice($order->billing_discount) }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->billing_discount_code }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ presentPrice($order->billing_subtotal) }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ presentPrice($order->billing_tax) }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ presentPrice($order->billing_total) }}</div>
 						</td>
 						<td class="table-text">
 							<div>{{ $order->created_at }}</div>
 						</td>
 						<td class="table-text">
 							<div>
 								{!! link_to_route(
 									'order.edit',
 									$title = 'Edit',
 									$parameters = [
 									'id' => $order->id,
 									]
 									) !!}
 								</div>
 							</td>
 						</tr>
 						@endforeach
 					</tbody>
 				</table>
 				@else
 				<div>
 					No records found
 				</div>
 				@endif
 			</div>
 		</div>
 		<div class="spacer"></div>
 		<script type="text/javascript">
 			$(document).ready(function() {
 				$('#table').DataTable();
 			} );
 		</script>
 		@endsection


