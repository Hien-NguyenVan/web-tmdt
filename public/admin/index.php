<?php
include "../bootstrap.php";
use CT275\Labs\Contact;

$contact = new Contact($PDO);
$contacts = $contact->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Contacts</title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?= BASE_URL_PATH . "css/sticky-footer.css" ?>" rel=" stylesheet">
	<link href="<?= BASE_URL_PATH . "css/font-awesome.min.css" ?>" rel=" stylesheet">
	<link href="<?= BASE_URL_PATH . "css/animate.css" ?>" rel=" stylesheet">
</head>

<body>
	<!-- Main Page Content -->
	<div class="container">
		<section id="inner" class="inner-section section">
			<!-- SECTION HEADING -->
			<h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">ADMIN</h2>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<p class="wow fadeIn" data-wow-duration="2s"></p>
				</div>
			</div>

			<div class="inner-wrapper row">
				<div class="col-md-12">

					<h4 style="text-align:center" >PRODUCTS TABLE</h4>
					<!-- Table Starts Here -->
					<table id="contacts" class="table table-bordered table-responsive table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<!-- <th>Phone</th> -->
								<th>Date Created</th>
								<!-- <th>Notes</th> -->
								<th>price</th>
								<th>type</th>
								<th>image</th>
								
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($contacts as $contact): ?>
								<tr>
									<td><?=htmlspecialchars($contact->name)?></td>
									<td><?=date("d-m-Y", strtotime($contact->created_at))?></td>
									<td><?=htmlspecialchars($contact->price)?></td>
									<td><?=htmlspecialchars($contact->Type)?></td>
									<td><img src="<?=substr($contact->target_file, 6)?>" style="width:50px;height:50px"> </td>
									
									
									<td>
										<a href="<?='edit.php?id=' . $contact->getId()?>"
										class="btn btn-xs btn-warning">
										<i alt="Edit" class="fa fa-pencil"> Edit</i></a>
										<form class="delete" action="delete.php"
											method="POST" style="display: inline;">
											<input type="hidden" name="id"
											value="<?=$contact->getId()?>">
											<button type="submit" class="btn btn-xs btn-danger"
											name="delete-contact">
											<i alt="Delete" class="fa fa-trash"> Delete</i></button>
										</form>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<!-- Table Ends Here -->
					<a href="add.php" class="btn btn-primary" style="margin-bottom: 10px; position:relative; left:90%">
						<i class="fa fa-plus"></i> New Products</a>
				</div>
				
			</div>

			
		</section>
	</div>
		<div id="delete-confirm" class="modal fade" role="dialog">"
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close"
	data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Confirmation</h4>
	</div>
	<div class="modal-body">Do you want to delete this contact?</div>
	<div class="modal-footer">
	<button type="button" data-dismiss="modal"
	class="btn btn-danger" id="delete">Delete</button>
	<button type="button" data-dismiss="modal"
	class="btn btn-default">Cancel</button>
	</div>
	</div>
	</div>
</div>

	

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= BASE_URL_PATH . "js/wow.min.js" ?>"></script>
	<script>
		$(document).ready(function() {
			new WOW().init();
			$('#contacts').DataTable();

			$('button[name="delete-contact"]').on('click', function(e){
e.preventDefault();
const form = $(this).closest('form');
const nameTd = $(this).closest('tr').find('td:first');
if (nameTd.length > 0) {
$('.modal-body').html(
`Do you want to delete "${nameTd.text()}"?`
);
}
$('#delete-confirm').modal({
backdrop: 'static', keyboard: false
})
.one('click', '#delete', function() {
form.trigger('submit');
});
});
		});
	</script>
</body>

</html>